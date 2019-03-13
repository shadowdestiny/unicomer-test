<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('dashboard.customer.welcome');
        $this->middleware('guest:customer')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function username()
    {
        return 'acct_num';
    }
    
    public function showLoginForm()
    {
        return view('dashboard.templates.customer.auth.login');
    }

}
