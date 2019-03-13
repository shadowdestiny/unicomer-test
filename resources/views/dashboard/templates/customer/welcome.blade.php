@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.customer')

    <div class="main-panel">

        @include('dashboard.includes.navbar.customer')

        <div class="content">

            <div class="container-fluid">
            
                <div class="row">
            
                    <div class="col-md-12">
            
                        <div class="card">
            
                            <div class="card-header card-header-info">
            
                                <h4 class="card-title">
                                
                                    @lang('pages.customer.transactions.table.title')
                                
                                </h4>
                                
                                <p class="card-category"> 
                                
                                    @lang('pages.customer.transactions.table.subtitle') 
                                
                                </p>

                            </div>

                            <div class="card-body">

                                <br/>

                                <div class="table-responsive">

                                    <table class="table">
                                        
                                        <thead class="text-info">
                                            
                                        <th> @lang('pages.customer.transactions.table.contract') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.purchase_date') </th>

                                        <th> @lang('pages.customer.transactions.table.total_sale') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.present_bal') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.paid_off_balance') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.term') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.installment') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.date_of_last_payment') </th>
                                        
                                        <th> @lang('pages.customer.transactions.table.total_last_payment') </th>
                                        </thead>

                                        <tbody>
                                        
                                            @forelse($credits as $credit)
                                               
                                                <tr> 
                                                    
                                                    <th scope="row">{{ $credit->contract }}</th>

                                                    <td>{{ $credit->transactions->last()->purchase_date }}</td>

                                                    <td>$&nbsp;{{ AmountFormat::normalFormat($credit->transactions->last()->total_sale) }}</td>
                                                    
                                                    <td>$ {{ AmountFormat::normalFormat($credit->transactions->last()->present_bal) }}</td>
                                                    
                                                    <td>$ {{ AmountFormat::normalFormat($credit->transactions->last()->paid_off_balance) }}</td>
                                                    
                                                    <td>{{ ($credit->transactions)->last()->terms }}</td>
                                                    
                                                    <td>$ {{ AmountFormat::normalFormat($credit->transactions->last()->installment) }}</td>
                                                    
                                                    <td>{{ $credit->transactions->last()->date_of_last_payment }}</td>
                                                    
                                                    <td>$ {{ AmountFormat::normalFormat($credit->transactions->last()->total_last_payment) }}</td>
                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="9" align="right">
                                                        <a href="{{ route('dashboard.customer.transaction.show', $credit->id) }}">

                                                            <button class="btn btn-info pull-right">

                                                                Contract Details

                                                            </button>

                                                        </a>

                                                        <a href="{{ route('dashboard.customer.transaction.export', $credit->id) }}">

                                                            <button class="btn btn-info pull-right">

                                                                Transaction PDF

                                                            </button>

                                                        </a>

                                                        <a href="{{ route('dashboard.customer.transaction.payment', $credit->id) }}">

                                                            <button class="btn btn-info pull-right">

                                                                Pay now

                                                            </button>

                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>

                                                    <td colspan="5"> @lang('pages.customer.transactions.table.empty') </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection