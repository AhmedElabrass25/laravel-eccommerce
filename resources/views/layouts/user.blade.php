<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>@yield('title')</title>

  <!-- CSS -->
  <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('user/assets/css/templatemo-sixteen.css') }}">
  <link rel="stylesheet" href="{{ asset('user/assets/css/owl.css') }}">
</head>

<body>
  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="w-100 px-5 d-flex justify-content-center">
        <div class="row w-100" style="justify-content: space-between;align-items: center;">
          <a class="navbar-brand" style="width:200px;padding-bottom: 0px;padding-top: 0.95rem;" href="{{ url('/') }}">
            <h2>Sixteen <em>Clothing</em></h2>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">{{__("messages.Home")}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.products') }}">@lang('messages.Products')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.about') }}">{{__("messages.AboutUs")}}</a>
              </li>
              {{-- @auth --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.showCart') }}">{{__("messages.Cart")}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.showWishlist') }}">{{__("messages.Wishlist")}}</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">{{__("messages.Orders")}}</a>
              </li>
              {{-- @endauth --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.contact')  }}">{{__("messages.ContactUs")}}</a>
              </li>
              <li class="nav-item d-flex" style="gap: 10px;">
                <a href="{{ url('change/en') }}" class="text-white me-1 p-1 border">English</a>
                 <a href="{{ url('change/ar') }}"  class="text-white me-1 p-1 border">عربي</a>
              </li>
              {{-- 👇 هنا نضيف الـ Auth / Guest --}}
              @guest
              <div class="d-flex align-items-center ">
                <li class=" mr-2">
                  <a class="btn btn-primary" href="{{ route('login') }}">{{__("messages.Login")}}</a>
                </li>
                <li class="">
                  <a class="btn btn-primary" href="{{ route('register') }}">{{__("messages.Register")}}</a>
                </li>
              </div>
              @endguest

              @auth
              <div class="d-flex align-items-center">
                <li class="nav-item mr-2">
                  <a class="nav-link">Hi,
                    {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="cursor:pointer;">
                      Logout
                    </button>
                  </form>
                </li>
              </div>
              @endauth

            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  {{-- Page Content --}}
  @yield('content')

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
              - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JS -->
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('user/assets/js/custom.js') }}"></script>
  <script src="{{ asset('user/assets/js/owl.js') }}"></script>
  <script src="{{ asset('user/assets/js/slick.js') }}"></script>
  <script src="{{ asset('user/assets/js/isotope.js') }}"></script>
  <script src="{{ asset('user/assets/js/accordions.js') }}"></script>
</body>

</html>