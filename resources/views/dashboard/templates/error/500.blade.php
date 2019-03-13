@extends('dashboard.layouts.error')

@section('title') Error 500 @endsection

@section('content')

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Page -->
    <div class="page vertical-align text-center" 
        data-animsition-in="fade-in" 
        data-animsition-out="fade-out">
      
      <div class="page-content vertical-align-middle">
        
        <header>
          <h1 class="animation-slide-top">500</h1>
          <p>USTED PARECE ESTAR TRATANDO DE ENCONTRAR SU MANERA DE REGRESAR !</p>
        </header>

        <a class="btn btn-primary btn-round" href="{{ URL::previous() }}">
            REGRESAR A LA PAGINA ANTERIOR
        </a>

        <footer class="page-copyright">
          <p>Copyright &copy; La Shoteria. Todos los derechos reservados.</p>
          <div class="social">
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-twitter" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-facebook" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-instagram" aria-hidden="true"></i>
        </a>
          </div>
        </footer>
        
      </div>
    </div>
    <!-- End Page -->

@endsection