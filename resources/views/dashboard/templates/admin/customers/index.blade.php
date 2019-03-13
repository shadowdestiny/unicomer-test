@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.admin')

    <div class="main-panel">

        @include('dashboard.includes.navbar.admin')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">@lang('pages.admin.customers.table.title')</h4>
                                <p class="card-category">
                                    @if($customers->isNotEmpty()) 
                                        {{ $customers->count() }} / {{ $customers_all->count() }} -
                                    @endif
                                    @lang('pages.admin.customers.table.subtitle') 
                                </p>
                            </div>
                            <div class="card-body">

                                <form class="navbar-form" role="form" method="POST" action="{{ route('dashboard.admin.customer.search') }}">
                                    
                                    @csrf

                                    <div class="input-group no-border">
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Search...">
                                        <button type="submit" class="btn btn-info btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-info">
                                            <th> @lang('pages.admin.customers.table.client_code') </th>
                                            <th> @lang('pages.admin.customers.table.name') </th>
                                            <th> @lang('pages.admin.customers.table.state') </th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @if($customers->isNotEmpty())   
                                                @foreach ( $customers as $customer )
                                                    <tr> 
                                                        <th scope="row">{{ $customer->acct_num }}</th>
                                                        <td>{{ $customer->name }}</td>
                                                        <td>{{ $customer->state }}</td>
                                                        <td>
                                                            <a href="{{ route('dashboard.admin.customer.edit', $customer->id) }}">
                                                                <button class="btn btn-info pull-right">
                                                                    @lang('pages.admin.customers.table.action')
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr> 
                                                    <th></th>
                                                    <td></td>
                                                    <td>
                                                        @lang('pages.admin.customers.table.empty')
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    @if($customers->isNotEmpty())

                                        {{ $customers->render() }}

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.includes.footer.pages')

    </div>

@endsection

