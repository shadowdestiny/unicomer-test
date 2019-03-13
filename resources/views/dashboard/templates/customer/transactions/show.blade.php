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
                                    Transactions :
                                </h4>
                                <p class="card-category">
                                	To Pay Off Balance Amount Contact Us / Para información del monto para cancelar su balance total contáctenos: 713-592-6181 Opc 4.
                                </p>
                            </div>
							<div class="card-body">
							  <form action="{{ route('dashboard.customer.update') }}" method="POST">

							  	@csrf

							  	@method('PUT')

							  	<div class="row">

									<div class="col-md-6">
										<div class="form-group">
										  <label class="bmd-label-floating">Date</label>
										  <input type="text" class="form-control" value="{{ $transactions->first()->purchase_date }}" disabled>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
										  <label class="bmd-label-floating">
										  	@lang('pages.customer.transactions.table.contract')
										  </label>
										  <input type="text" class="form-control" value="# {{ $transactions->first()->contract }}" disabled>
										</div>
									</div>

								</div>

							  	<div class="row">

									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('pages.customer.transactions.table.present_bal')
								          </label>
								          <input  type="text" class="form-control" value="$ {{ AmountFormat::normalFormat($transactions->first()->present_bal) }}" disabled>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('pages.customer.transactions.table.installment')
								          </label>
								          <input type="text" class="form-control" value="$ {{ AmountFormat::normalFormat($transactions->first()->installment) }}" disabled>
										</div>
									</div>

								</div>

							  	<div class="row">
									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('pages.customer.transactions.table.total_last_payment')
								          </label>
								          <input id="name" name="name" type="text" class="form-control" value="$ {{ AmountFormat::normalFormat($transactions->first()->total_last_payment) }}" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
								          <label class="bmd-label-floating">
								          	@lang('pages.customer.transactions.table.minimun_payment')
								          </label>
								          <input id="name" name="name" type="text" class="form-control" value="$ {{ AmountFormat::normalFormat($transactions->first()->minimun_payment) }}" disabled>
										</div>
									</div>
								</div>

								<br/>

                                <div class="table-responsive">

									<table class="table">

										<thead class="text-info">

										<th> @lang('pages.customer.transactions.table.purchase_date') </th>

										<th> @lang('pages.customer.transactions.table.total_sale') </th>

										<th> @lang('pages.customer.transactions.table.present_bal') </th>

										<th> @lang('pages.customer.transactions.table.paid_off_balance') </th>

										<th> @lang('pages.customer.transactions.table.installment') </th>

										<th> @lang('pages.customer.transactions.table.date_of_last_payment') </th>

										<th> @lang('pages.customer.transactions.table.total_last_payment') </th>
										</thead>

										<tbody>

										@forelse($transactions as $transaction)

											<tr>

												<td>{{ $transaction->purchase_date }}</td>

												<td>$&nbsp;{{ AmountFormat::normalFormat($transaction->total_sale) }}</td>

												<td>$ {{ AmountFormat::normalFormat($transaction->present_bal) }}</td>

												<td>$ {{ AmountFormat::normalFormat($transaction->paid_off_balance) }}</td>

												<td>$ {{ AmountFormat::normalFormat($transaction->installment) }}</td>

												<td>{{ $transaction->date_of_last_payment }}</td>

												<td>$ {{ AmountFormat::normalFormat($transaction->total_last_payment) }}</td>

											</tr>
										@empty
											<tr>

												<td colspan="5"> @lang('pages.customer.transactions.table.empty') </td>

											</tr>
										@endforelse

										</tbody>

									</table>

                                </div>

							    <div class="clearfix"></div>

							  </form>
							</div>
                        </div>
                    </div>

					<div class="col-md-4">
						<div class="card card-profile">

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

							</div>
						</div>
					</div>
        		</div>
            </div>
        </div>

    </div>

@endsection