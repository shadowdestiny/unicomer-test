<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationDate;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardNumber;
use PDF;
use Auth;
use Session;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function show($id)
    {
        $user = Auth::user();

        $transactions = Transaction::join('credits','credits.id','=','transactions.credit_id')
            ->where('credits.customer_id','=',$user->id)
            ->where('credits.id','=',$id)
            ->whereNull('transactions.deleted_at')
            ->orderBy('credits.created_at', 'desc')
            ->orderBy('transactions.date_of_last_payment', 'desc')
            ->select('transactions.*')
            ->get();

        if(! $transactions)
        {

            return redirect()->route('dashboard.customer.welcome');
        
        }

        return view('dashboard.templates.customer.transactions.show', ['transactions' => $transactions]);
    }
    
    public function export($id)
    {

        $user = Auth::user();

        $transaction = Transaction::join('credits','credits.id','=','transactions.credit_id')
            ->where('credits.customer_id','=',$user->id)
            ->where('credits.id','=',$id)
            ->orderBy('transactions.date_of_last_payment', 'desc')
            ->select('transactions.*')
            ->first();

        if(! $transaction)
        {

            return redirect()->route('dashboard.customer.welcome');
        
        }

        $name = 'Unicomer Online Statement - Transaction - '.$transaction->contract.'.pdf';

        $date = Carbon::now();
        $now = $date->format('F d, Y');
        $format = 'Y/m/d';

        $date = Carbon::parse($transaction->purchase_date);
        $purchase_date = $date->format('d');
        $purchase_date = ((int)$purchase_date)." of each month";

        $date = Carbon::parse($transaction->created_at);
        $created_at = $date->format($format);

        $date = Carbon::parse($transaction->date_of_last_payment);
        $date_of_last_payment = $date->format($format);

        $file = PDF::loadview('dashboard.templates.customer.transactions.export',
            [
                'transaction' => $transaction,
                'now'=>$now,
                'purchase_date'=>$purchase_date,
                'created_at'=>$created_at,
                'date_of_last_payment'=>$date_of_last_payment
            ]);

        return $file->download($name);

    }

    public function payment($id)
    {
        $user = Auth::user();

        $transaction = Transaction::join('credits','credits.id','=','transactions.credit_id')
            ->where('credits.customer_id','=',$user->id)
            ->where('credits.id','=',$id)
            ->select('transactions.*')
            ->first();

        if(! $transaction)
        {

            return redirect()->route('dashboard.customer.welcome');
        
        }

        return view('dashboard.templates.customer.transactions.payment', ['transaction' => $transaction]);
    }

    public function paymentProcess(Request $request,$id)
    {
        $request->validate([
            'card_number'       => ['required',new CardNumber],
            'card_expiration'   => ['required',new CardExpirationDate('my')],
            'card_code'         => ['required',new CardCvc($request['card_number'])],
            'amount_from_card'  => ['required','amount_from_card']
        ]);

        $transaction = Transaction::find($id);

        $user = Auth::user();

        try {

            $usaepay = new \PhpUsaepay\Client(env('USAEPAY_TOKEN'),env('USAEPAY_PIN'),env('USAEPAY_SANDBOX_MODE'));

            $request = [
                'Command' => 'sale',
                'AccountHolder' => $user->name.' '.$user->last_name,
                'Details' => [
                  'Description' => 'Payment Transaction',
                  'Amount'      => $transaction->installment,       //1.0
                  'Invoice'     => $transaction->contract,
                ],
                'CreditCardData'   => [
                  'CardNumber'     => $request['card_number'],      //'4000100011112224'
                  'CardExpiration' => $request['card_expiration'],  //'0919'
                  'AvsStreet'      => $request['avs_street'],
                  'AvsZip'         => $request['avs_zip'],
                  'CardCode'       => $request['card_code']         //'123'
                ]
            ];

            $usaepay->runTransaction($request);

            Session::flash ( 'message', 'Payment done successfully. The payment will be reflected in the next 24 Hours!' );
            return view('dashboard.templates.customer.transactions.payment', ['transaction' => $transaction]);

        } catch ( \Exception $e ) {

            //dd($e);

            Session::flash ( 'message', "Error! Please Try again." );
            return view('dashboard.templates.customer.transactions.payment', ['transaction' => $transaction]);
        }

    }

}