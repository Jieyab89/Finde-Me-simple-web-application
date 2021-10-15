<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Boostrap & font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
    .card img
    {
      height: 260px;
      width: 100%;
      object-fit: cover;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <h1>{{ config('app.name', 'Laravel') }}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style="padding-left:80px;">
                      <li class="nav-item active">
                         <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                       </li>
                      <li class="nav-item active">
                         <a class="nav-link" href="{{ route('index') }}">Feed</a>
                       </li>
                       <li class="nav-item active">
                          <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Vip</a>
                         </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item active">
                               <a class="nav-link" href="#">Contact Us</a>
                             </li>
                             @guest
                                 <li class="nav-item" style="padding-left:30px;">
                                     <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                 </li>
                                 @if (Route::has('register'))
                                     <li class="nav-item">
                                         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                     </li>
                                 @endif
                                 @else
                                 <li class="nav-item dropdown" style="padding-left:280px;">
                                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       @if(Auth::user()->photo == "")
                                       <img class="img-fluid rounded-circle shadow" style="width: 38px;height: 38px; object-fit:cover;" src="/images/default/user.png" alt="{{ config('app.name', 'Laravel') }}" />
                                       @else
                                       <img class="img-fluid rounded-circle shadow" style="width: 38px;height: 38px; object-fit:cover;" src="/images/user/{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}" onerror="this.src='/images/default/user.png'" />
                                       @endif
                                       {{ Str::limit(Auth::user()->name, 15) }}
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="{{ route('home') }}">
                                             {{ __('Dashboard') }}
                                         </a>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                             @csrf
                                         </form>
                                     </div>
                                 </li>
                             @endguest
                      </ul>
                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class='fa fa-google'></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fa fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5" style="color:black;">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Find Me Corp
          </h6>
          <p>
            Description
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fa fa-home"></i> New York, NY 10012, US</p>
          <p>
            <i class="fa fa-envelope"></i>
            info@example.com
          </p>
          <p><i class="fa fa-phone"></i> + 01 234 567 88</p>
          <p><i class="fa fa-print"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="color:white;background-color:black;">
    © {{ date('Y') }} Copyright
    <a class="text-reset fw-bold" href="https://github.com/Jieyab89">Mbaung Developer</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>
