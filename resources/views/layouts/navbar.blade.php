<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar container">
  <ul class="navbar-nav navbar-right ml-auto">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user mr-auto">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/user/profile" class="dropdown-item has-icon">
          Profile
        </a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button  class="dropdown-item has-icon text-danger">Logout</button>
        </form>
      </div>
    </li>
  </ul>
</nav>
  {{-- <!-- Bottom Navbar -->
@if (auth()->user()->level != 'staf')
@include('layouts._navigasi_admin')
@else
@include('layouts._navigasi_user')
@endif --}}