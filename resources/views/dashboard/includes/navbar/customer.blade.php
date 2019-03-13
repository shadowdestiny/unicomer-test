<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
  <div class="container-fluid">

    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('dashboard.customer.welcome') }}">
        Dashboard / Customer
      </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end">

      <a href="{{ route('dashboard.customer.welcome') }}">

        {!! Html::image('dashboard/assets/img/Logotipos.png','',['width'=>'400']) !!}

      </a>

    </div>
    
  </div>
</nav>