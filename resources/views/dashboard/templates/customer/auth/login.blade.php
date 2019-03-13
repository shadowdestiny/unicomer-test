@extends('dashboard.layouts.auth')

@section('title') @lang('auth.form.login.title') @endsection

@section('content')

	@alert

	<div class="page-header header-filter" style="background-image: url({{ URL::asset('landing/img/background-customer-login.jpg') }}); background-size: cover; background-position: top center;">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-4 col-md-6">
	        <div class="card card-login">
	          <form class="form-horizontal form-material" method="POST" action="{{ route('dashboard.customer.login') }}">

	            @csrf

	            <div class="card-body">
	            	<div class="input-group text-center text-uppercase">
		            	<h4 class="col-12 card-title">@lang('auth.form.login.title') Customer</h4>
		        	</div>
              		<div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text">
	                    <i class="material-icons">mail</i>
	                  </span>
	                </div>
	                <input id="acct_num" name="acct_num" type="text" class="form-control" placeholder="@lang('validation.attributes.username')">
	              </div>
	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text">
	                    <i class="material-icons">lock_outline</i>
	                  </span>
	                </div>
	                <input id="password" name="password" type="password" class="form-control" placeholder="@lang('validation.attributes.password')">
	              </div>
	            </div>
              		<div class="footer text-center">
	  	            	<button class="col-10 btn btn-info my-4">
							@lang('auth.form.login.action')
						</button>
					</div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
    
@endsection


