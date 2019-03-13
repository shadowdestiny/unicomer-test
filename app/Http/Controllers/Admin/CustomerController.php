<?php

namespace App\Http\Controllers\Admin;

use File;
use PHPUnit\Runner\Exception;
use Session;
use Carbon\Carbon;
use League\Csv\Reader;
use App\Jobs\ImportCSV;
use App\Models\Customer;
use App\Models\Transaction;
use App\Http\Requests\CustomerUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $customers = Customer::paginate(30);
        $customers_all = Customer::all();
        
        return view('dashboard.templates.admin.customers.index', [
            'customers'     => $customers,
            'customers_all' => $customers_all,
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('dashboard.templates.admin.customers.edit', ['customer' => $customer]);
    }

    public function update(Customer $customer, CustomerUpdate $request)
    {
        $customer->update($request->only('password'));

        Session::flash('message', 'The client password successfully edited!');

        return view('dashboard.templates.admin.customers.edit', ['customer' => $customer]);
    }

    public function import(Request $request)
    {
        return view('dashboard.templates.admin.customers.imports',['routing'=>'loadings']);
    }

    public function loadingStore(Request $request)
    {
        $file = $request->file('file');

        if( $file ){

            $name = $request->file('file')->getClientOriginalName();

            $path = $file->storeAs('public', $name);

            Session::put('path_file_imports', $path);

            if( $path ) {

                Session::flash('message', 'The import clients in progress: '.Carbon::now());

            }

        }else{

            Session::flash('message', 'The customers could not be imported: '.Carbon::now());

        }

        return view('dashboard.templates.admin.customers.imports',
            ['loading'=>true,'routing'=>'imports']);
    }

    public function importsStore(Request $request)
    {

        $path = Session::get('path_file_imports');

        if ($path) {
            try {

                dispatch((new ImportCSV($path))->delay(10));

                Session::flash('message', 'The customers have been imported: ' . Carbon::now());

            } catch (Exception $exception){
                Session::flash('message', 'File structure error, check the file: ' . Carbon::now());
            }
        }

        return view('dashboard.templates.admin.customers.imports',['routing'=>'loadings']);
    }

    public function search(Request $request)
    {
        
        $customers = Customer::search($request['search'])->paginate(20);

        return view('dashboard.templates.admin.customers.index', ['customers' => $customers]);
    }
    
}
