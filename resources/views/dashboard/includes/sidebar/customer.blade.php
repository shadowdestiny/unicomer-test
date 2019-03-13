<div class="sidebar" data-color="azure" data-background-color="white">
  <div class="logo">
    <a href="{{ route('dashboard.customer.welcome') }}" class="simple-text logo-normal">
        Unicomer Online <br/> Statement
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    <li class="nav-item {{(Request::route()->getName() == 'dashboard.customer.welcome') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.customer.welcome') }}">
          <i class="material-icons">dashboard</i>
          <p>@lang('includes.customer.sidebar.dashboard')</p>
        </a>
    </li>
    <li class="nav-item {{(Request::route()->getName() == 'dashboard.customer.edit') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.customer.edit') }}">
          <i class="material-icons">person</i>
          <p>@lang('includes.customer.sidebar.profile')</p>
        </a>
    </li>
    <li class="nav-item {{(Request::route()->getName() == 'dashboard.customer.password') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.customer.password') }}">
          <i class="material-icons">settings</i>
          <p>@lang('includes.customer.sidebar.password')</p>
        </a>
    </li>
    <li class="nav-item {{(Request::route()->getName() == 'dashboard.customer.logout') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard.customer.logout') }}">
          <i class="material-icons">exit_to_app</i>
          <p>@lang('includes.customer.sidebar.logout')</p>
        </a>
    </li>
    </ul>
  </div>
</div>

