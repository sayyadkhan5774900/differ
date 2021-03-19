<header id="header" class="fixed-top d-flex align-items-center  header-transparent {{ Route::current()->getName() != 'landing' ? 'header-scrolled' : '' }}">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <!--<h1 class="text-light"><a href="{{ route('landing') }}">IPS</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('landing') }}"><img src="assets/img/logo.png" alt="IPS" class="img-fluid"></a>

      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('landing') }}">Home</a></li>
          <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#about">About</a></li>
          <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#services">Services</a></li>
          <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#noticeboard">Noticeboard</a></li>
          {{-- <li><a href="#portfolio">Portfolio</a></li> --}}
          {{-- <li><a href="#pricing">Pricing</a></li> --}}
          <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#team">Team</a></li>
          <li class="drop-down"><a href="">Others</a>
            <ul>
              <li><a href="{{ route('events') }}">Events</a></li>
              <li><a href="{{ route('blog') }}">Blog</a></li>
              <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#testimonials">Testimonials</a></li>
              <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#faqs">Faqs</a></li>
              <li><a href="{{ route('materials') }}">Study Materials</a></li>
              {{-- <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}
            </ul>
          </li>
          <li><a href="{{ Route::current()->getName() != 'landing' ? route('landing') : '' }}#contact">Contact</a></li>
          
          @if (Route::has('login'))
            @auth
              <li class="drop-down"><a href="#">{{ Auth::user()->name }}
              </a>
                <ul>
                  @if (Auth::user()->is_admin)
                  <li><a href="/admin" class="text-sm text-gray-700 underline">Admin Panel</a></li>
                  @else
                  @can('student_access')
                  <li><a href="{{ route('student.profile') }}" class="text-sm text-gray-700 underline">Profile</a></li>
                  @endcan
                  @endif
                 <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </ul>
              </li>
            @else
            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>
            @endif
          @endif

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>
  