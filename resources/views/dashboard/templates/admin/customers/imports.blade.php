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
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">
                                    Import Clients
                                </h4>
                                <p class="card-category"> 
                                    Before import clients, remember to add a CSV file with the correct fields, and formats. Once your upload the file, the importation will be made and you have to wait several minutes to view the changes. When your importation is ready, you will see a notification with the information of the last importation.
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form 
                                        action="{{ route('dashboard.admin.customer.'.$routing) }}"
                                        method="POST" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" />
                                        <button class="btn btn-info" {{ isset($loading) ? "listenerClick":"" }}>Import File</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

