@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.customer')

    <div class="main-panel">

        @include('dashboard.includes.navbar.customer')

        @alert

        @alertMessage

        <div class="content">

			<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
			<form accept-charset="UTF-8" action="{{ route('dashboard.customer.transaction.payment', $transaction->id) }}" class="require-validation"
				  data-cc-on-file="false"
				  data-stripe-publishable-key="pk_test_7beWSykJO8TH2UVqupaAfQJZ"
				  id="payment" method="POST">

				@csrf

				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header card-header-info">
									<h4 class="card-title">
										Payment :
									</h4>
									<p class="card-category">
										To Pay Off Balance Amount Contact Us / Para información del monto para cancelar su balance total contáctenos: 713-592-6181 Opc 4.
									</p>
								</div>
								<div class="card-body">


									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Card Number</label>
											  <input id="card_number" name="card_number" type="text" class="form-control" required>
											</div>
										</div>

									</div>

									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Card Expiration </label>
											  <input id="card_expiration" name="card_expiration" type="text" class="form-control" required>
											</div>
										</div>

									</div>

									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Avs Street</label>
											  <input id="avs_street" name="avs_street" type="text" class="form-control" required>
											</div>
										</div>

									</div>

									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Avs Zip</label>
											  <input id="avs_zip" name="avs_zip" type="text" class="form-control" required>
											</div>
										</div>

									</div>

									<div class="row">

										<div class="col-md-12">
											<div class="form-group">
											  <label class="bmd-label-floating">Card Code</label>
											  <input id="card_code" name="card_code" type="text" class="form-control" required>
											</div>
										</div>

									</div>

									<div class="clearfix"></div>

									<button id="action" class="btn btn-info pull-right">

										Transaction Payment

									</button>

								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="card">

								<div class="card-header card-header-info text-left">
									<h4 class="card-title">
										Statement
									</h4>
									<p class="card-category">
										Information Customer
									</p>
								</div>

								<div class="card-body">

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Customer Name</label>
												<input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Customer Last Name</label>
												<input type="text" class="form-control" value="{{ Auth::user()->last_name }}" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Customer Home Address</label>
												<input type="text" class="form-control" value="{{ Auth::user()->home_address }}" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Amount payable in $</label>
												<input type="text" name="amount_from_card" class="form-control" value="{{ $transaction->installment }}" required>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>

    </div>

@endsection
