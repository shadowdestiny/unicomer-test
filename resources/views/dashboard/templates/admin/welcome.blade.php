@extends('dashboard.layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @include('dashboard.includes.sidebar.admin')

    <div class="main-panel">

        @include('dashboard.includes.navbar.admin')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                      <div class="card card-stats">
                        <div class="card-header">
                          <h2 class="card-title" style="text-align: center">
                            Dashboard Administrativo
                          </h2>
                        </div>
                        <div class="card-body">
                              <div class="stats count-customer">
                                  <h2>{{ $count_customers }}</h2><h3>Customers</h3>
                              </div>
                        </div>
                        <div class="card-footer">
                          <div class="stats">

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection