<?php

namespace App\Http\Controllers\Customer;

use Auth;
use Session;
use App\Models\Credit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {

        $user = Auth::user();

        $credits = Credit::withTrashed()->where('credits.customer_id','=',$user->id)
            ->orderBy('credits.created_at', 'desc')->get();

        return view('dashboard.templates.customer.welcome', ['credits' => $credits]);
    }

    public function edit()
    {
        $customer = Auth::user();

        return view('dashboard.templates.customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {
        $customer = Auth::user();

        $customer->update($request->only(['name','last_name','email','state']));

        Session::flash('message', 'The account information successfully edited!');

        return view('dashboard.templates.customer.edit', ['customer' => $customer]);
    }

    public function passwordEdit(Request $customer)
    {
        return view('dashboard.templates.customer.password', ['customer' => $customer]);
    }

    public function passwordUpdate(Request $request)
    {
        $customer = Auth::user();

        $customer->update($request->only('password'));

        Session::flash('message', 'The password successfully edited!');

        return view('dashboard.templates.customer.password', ['customer' => $customer]);
    }
    
}
