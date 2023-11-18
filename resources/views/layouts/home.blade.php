<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Lbtech - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="template/Landing/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/Landing/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="template/Landing/css/style.css" rel="stylesheet">
    @yield('style')
</head>



<body>

    <header>
        <section class="hero">

            <nav class="navbar navbar-expand-lg navbar-custom navbar-dark navbar-custom">
                <div class="container">
                    <a class="navbar-brand logo" href="{{ route('index') }}">
                        <img src="{{ asset('favicon.jpg') }}" alt="logo" height="30">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample07">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#how">How it works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#features">Features</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <div class="container">

                <div class="row hero-content text-center">
                    <div class="col-12">
                        <h1 class="">Adminox - Responsive Admin & Frontend</h1>
                        <div class="m-t-20">
                            <a href="" class="btn btn-custom w-lg">Free Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
 

    @yield('content') 

    <footer class="footer   ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a class="navbar-brand-footer" href="#"><img src="{{ asset('favicon.jpg') }}" alt="logo" height="28"></a>
                    <span class="text-muted ml-3"> © 2017 - 2019.</span>
                </div>
                <div class="col-md-6">
                    <ul class="social-icons text-md-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </footer>
    <!-- End Footer -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="template/Landing/js/jquery.min.js"></script>
    <script src="template/Landing/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery easing -->
    <script type="text/javascript" src="template/Landing/js/jquery.easing.min.js"></script>
    <!-- SmoothScroll -->
    <script src="template/Landing/js/SmoothScroll.js"></script>
    <!-- custom js -->
    <script src="template/Landing/js/app.js"></script>
    @stack('scripts')
</body>

</html>