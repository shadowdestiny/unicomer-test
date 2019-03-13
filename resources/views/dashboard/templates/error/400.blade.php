@extends('dashboard.layouts.error')

@section('title') Error 400 @endsection

@section('content')

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->

    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>400</h1>
                <h3 class="text-uppercase">400 PÁGINA NO ENCONTRADA !</h3>
                <p class="text-muted m-t-30 m-b-30">USTED PARECE ESTAR TRATANDO DE ENCONTRAR SU MANERA DE REGRESAR !</p>
                <a href="{{ URL::previous() }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">REGRESAR A LA PAGINA ANTERIOR</a> 
            </div>
        </div>
    </section>
  
    <!-- End Page -->

@endsection