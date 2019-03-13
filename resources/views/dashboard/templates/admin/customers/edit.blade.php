@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.admin')

    <div class="main-panel">

        @include('dashboard.includes.navbar.admin')

        @alert

        @alertMessage

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">
                                    Update Customer Password:
                                </h4>
                                <p class="card-category"> 
                                	Validates the strong of password to several rules: <br/>
                                	Examples password: myPass145 Good, myPass145$ Strong
                                </p>
                            </div>
							<div class="card-body">
							  <form action="{{ route('dashboard.admin.customer.update', $customer->id) }}" method="POST">

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
									<div class="col-md-12">
										<div class="form-group">
								          <label class="bmd-label-floating">Customer Name</label>
								          <input type="text" class="form-control" value="{{ $customer->name }}" disabled>
										</div>
									</div>
								</div>

							  	<div class="row">
									<div class="col-md-12">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('validation.attributes.password')
								          </label>
								          <input id="password" name="password" type="password" class="form-control"  required>
										</div>
									</div>
								</div>

							  	<div class="row">
									<div class="col-md-12">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('validation.attributes.password_confirmation')
								          </label>
								          <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
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
									Validates the strong of password to several rules:
								</h6>
								<h4 class="card-title"></h4>
								<p class="card-description">
									<ul class="text-left">
										<li>Size (8)</li>
										<li>Numbers</li>
										<li>Special Characters</li>
										<li>Uppercase and Lowercase letters</li>
										<li>Sequences (abc, 123)</li>
										<li>Repetitions (aaa)</li>
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