<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
        $count_customers = count(Customer::all());
        return view('dashboard.templates.admin.welcome',
            ['count_customers'=>$count_customers]);
    }
    
}
