@extends('dashboard.layouts.auth')

@section('title') @lang('auth.form.register.title') @endsection

@section('content')

    @include('dashboard.components.loader')

    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(dashboard/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" method="POST" action="{{ route('register') }}">

                	@csrf

                    @include('dashboard.components.errors')

                    <a href="{{ route('register') }}" class="text-center db">
                        {{ Html::image('dashboard/images/logo.svg', 'Logo - La Shoteria', array('class' => 'logo', 'width' => '70%')) }}
                    </a>

                    <h3 class="box-title m-t-40 m-b-0">@lang('auth.form.register.title')</h3>
                    <small>@lang('auth.form.register.subtitle')</small>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input id="name" name="name" type="text" class="form-control" required="" placeholder="@lang('validation.attributes.name')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" name="email" type="email" class="form-control" required="" placeholder="@lang('validation.attributes.email')">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="password" name="password" type="password" class="form-control"  required="" placeholder="@lang('validation.attributes.password')">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"  required="" placeholder="@lang('validation.attributes.password_confirmation')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkTerms">
                                <label class="custom-control-label" for="checkTerms">
                                    @lang('auth.form.register.terms.text') 
                                    <a href="javascript:void(0)">
                                        @lang('auth.form.register.terms.link')
                                    </a>
                                </label> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">@lang('auth.form.register.action')</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>
                                @lang('auth.form.register.question.text')
                                <a href="pages-login-2.html" class="text-info m-l-5">
                                    <b>@lang('auth.form.register.question.link')</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    {!! Html::script("dashboard/node_modules/jquery/jquery-3.2.1.min.js") !!}
    <!-- Bootstrap tether Core JavaScript -->
    {!! Html::script("dashboard/node_modules/popper/popper.min.js") !!}
    {!! Html::script("dashboard/node_modules/bootstrap/dist/js/bootstrap.min.js") !!}
    
    <script type="text/javascript">
        $(function() { $(".preloader").fadeOut(); });
        $(function() { ('[data-toggle="tooltip"]').tooltip() });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

@endsection