<div class="sidebar" data-color="azure" data-background-color="white">
  <div class="logo">
    <a href="{{ route('dashboard.admin.welcome') }}" class="simple-text logo-normal">
        Unicomer Online <br/> Statement
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    <li class="nav-item {{ (Request::route()->getName() == 'dashboard.admin.welcome') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin.welcome') }}">
          <i class="material-icons">dashboard</i>
          <p>@lang('includes.admin.sidebar.dashboard')</p>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() == 'dashboard.admin.customers') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin.customers') }}">
          <i class="material-icons">person</i>
          <p>@lang('includes.admin.sidebar.customers')</p>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() == 'dashboard.admin.customer.imports') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin.customer.imports') }}">
          <i class="material-icons">person_add</i>
          <p>@lang('includes.admin.sidebar.imports')</p>
        </a>
    </li>
    <li class="nav-item {{ (Request::route()->getName() == 'logout') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin.logout') }}">
          <i class="material-icons">exit_to_app</i>
          <p>@lang('includes.admin.sidebar.logout')</p>
        </a>
    </li>
    </ul>
  </div>
</div>

