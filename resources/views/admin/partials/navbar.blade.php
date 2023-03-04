<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo" style="height:40px" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">{{Auth::user()->name}} <span class="font-weight-bold text-primary">({{Auth::user()->role}})</span></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

          <a class="dropdown-item" href="{{route('user.show', Auth::user()->id)}}">
            <i class="mdi mdi-account me-2 text-primary"></i> 
            Profile 
          </a>

          <a class="dropdown-item" href="{{route('logout')}}">
            <i class="mdi mdi-logout me-2 text-primary"></i> 
            Signout 
          </a>
        </div>
      </li>
  </div>
</nav>