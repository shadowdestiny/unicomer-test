@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.customer')

    <div class="main-panel">

        @include('dashboard.includes.navbar.customer')

        @alert

        @alertMessage

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">
                                    Update My Information :
                                </h4>
                                <p class="card-category">
                                	Update your account information.
                                </p>
                            </div>
							<div class="card-body">
							  <form action="{{ route('dashboard.customer.update') }}" method="POST">

							  	@csrf

							  	@method('PUT')

							  	<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label class="bmd-label-floating">ID Customer</label>
										  <input type="text" class="form-control" value="{{ $customer->acct_num }}" disabled>
										</div>
									</div>
								</div>

							  	<div class="row">
									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">Name</label>
								          <input id="name" name="name" type="text" class="form-control" value="{{ $customer->name }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">Last Name</label>
								          <input id="last_name" name="last_name" type="text" class="form-control" value="{{ $customer->last_name }}">
										</div>
									</div>
								</div>

							  	<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label class="bmd-label-floating">Email</label>
										  <input id="email" name="email" type="email" class="form-control" value="{{ $customer->email }}">
										</div>
									</div>
								</div>

							  	<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label class="bmd-label-floating">State</label>
										  <input id="state" name="state" type="text" class="form-control" value="{{ $customer->state }}">
										</div>
									</div>
								</div>

							    <button type="submit" class="btn btn-info pull-right">
							    	@lang('auth.form.update.action')
							    </button>

							    <div class="clearfix"></div>

							  </form>
							</div>
                        </div>
                    </div>
                    
					<div class="col-md-4">
						<div class="card card-profile">
							<div class="card-body">
								<h6 class="card-category text-gray">
									<!--<li></li>-->
								</h6>
								<h4 class="card-title"></h4>
								<p class="card-description">
									<ul class="text-left">
										<!--<li></li>-->
									</ul>
								</p>
							</div>
						</div>
					</div>

        		</div>
            </div>
        </div>

    </div>

@endsection