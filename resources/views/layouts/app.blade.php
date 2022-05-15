<!doctype html>
<html lang="en">

<head>
    <title>Lucky</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{ url('/home') }}">Home</span></a>
                    </li>
                    <li>
                        @if(Auth::check())
                            <a href="{{ url('/guess') }}">Guess <span
                                class="badge badge-danger">{{ Auth::user()->bid_count }}</span></a>
                        @else
                            <a href="{{ url('/guess') }}">Guess </a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ url('/charge') }}">Charge</a>
                    </li>
                    <li>
                        <a href="{{ url('/history') }}">History</a>
                    </li>
                    <li>
                        {{-- <a href="#">Today lucky</a> --}}
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="#">Profile</a> --}}
                            </li>
                            <li class="nav-item">
                                @if (Auth::check())
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}" >{{ __('Login') }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                @if (session()->get('result'))
                    <div class="alert alert-{{ session()->get('error') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {!! session()->get('result') !!}
                    </div>
                @endif

                @yield('content')

            </div>

        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="{{ asset('/') }}js/popper.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
</body>

</html>
