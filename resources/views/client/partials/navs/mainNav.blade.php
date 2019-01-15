<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">company name</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
        </li>
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">login</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('orders.create') }}">
              Add Printing Orders
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bell"></i>
              <span class="badge badge-pill badge-danger">5</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
              @if(Auth::user()->image)
                <img src="{{ Storage::url(Auth::user()->image) }}" alt="" width="30" height="30" class="rounded-circle">
              @else
                <img src="{{ asset('img/user.jpg') }}" alt="" width="30" height="30" class="rounded-circle">
              @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

              <a class="dropdown-item" href="{{ route('orders.index') }}">My Orders</a>

              <a class="dropdown-item" href="{{ route('profile.show',   Auth::user()->id) }}">My Profile</a>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
{{-- /. Main Nav --}