<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$home->site_title}}</title>
    <link href="{{$home->site_icon}}" rel="icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('dist/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
</head>

<body style="background-color: #1f2e4e;">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <secton id="navbar" style="background-color: ghostwhite;">
        <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="{{route('rental_car')}}#navbar" class="navbar-brand p-0">
                        <img src="{{$home->logo}}" alt="logo">
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto py-0">
                            <a href="{{route('rental_car')}}/#navbar" class="nav-item nav-link ">Home</a>
                            <a href="{{route('rental_car')}}/#about" class="nav-item nav-link">About</a>
                            <a href="{{route('rental_car')}}/#service" class="nav-item nav-link">Service</a>
                            <a href="{{route('rental_car')}}/#blog" class="nav-item nav-link">Blog</a>
                            <a href="{{route('rental_car')}}/#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <a href="{{route('rental_car')}}/#navbar" class="btn btn-primary rounded-pill py-2 px-4">Get
                            Started</a>
                    </div>
                </nav>
            </div>
        </div>
    </secton>
    <!-- Navbar & Hero End -->

    <!-- main content start -->
    <div class="container-fluid py-4">
        <div class="row mb-5">
            <div class="col-12">
                <div class="multisteps-form mb-5">
                    <!--progress bar-->
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto my-4">
                            <div class="card" style="border: none; background-color: #1f2e4e;">
                                <div class="card-body">
                                    <div class="multisteps-form__progress">
                                        <button id="firstStepEdit" class="multisteps-form__progress-btn js-active" type="button" 
                                            title="Itinerary Info">Itinerary Info</button>
                                        <button id="secondStepEdit" class="multisteps-form__progress-btn" type="button" disabled
                                            title="Select Car">Select Car</button>
                                        <button id="thirdStepEdit" class="multisteps-form__progress-btn" type="button" disabled
                                            title="Extra Fecility">Extra Fecility</button>
                                        <button id="fourthStepEdit" class="multisteps-form__progress-btn" type="button" disabled
                                            title="Personal Info">Personal Info</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row mb-8">
                        <div class="col-12 col-lg-8 m-auto"  style="width: 960px;">
                            <form action="{{route('store.reservation')}}" method="POST" enctype="multipart/form-data"  class="multisteps-form__form mb-8"> 
                            @csrf
                                <!--single form panel-->
                                <div id="firstStepForm" class="card multisteps-form__panel border-radius-xl js-active"
                                    data-animation="FadeIn" style="border:none; background-color:#1f2e4e;">
                                    <div class="multisteps-form__content">
                                        @include('rental_car.partials.reservation.firstStep')
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div id="secondStepForm" class="card multisteps-form__panel border-radius-xl "
                                    data-animation="FadeIn" style="border:none; background-color:#1f2e4e;">
                                    <div class="multisteps-form__content">
                                        @include('rental_car.partials.reservation.secondStep')
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div id="thirdStepForm" class="card multisteps-form__panel border-radius-xl "
                                    data-animation="FadeIn" style="border:none; background-color:#1f2e4e;">
                                    <div class="multisteps-form__content">
                                        @include('rental_car.partials.reservation.thirdStep')
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div id="fourthStepForm" class="card multisteps-form__panel border-radius-xl "
                                    data-animation="FadeIn" style="border:none; background-color:#1f2e4e;">
                                    <div class="multisteps-form__content">
                                        @include('rental_car.partials.reservation.fourthStep')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content end -->


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dist/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('dist/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dist/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('dist/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('dist/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- ajax and jquery -->
    @include('rental_car.partials.script')

    <!-- Template Javascript -->
    <script src="{{asset('dist/js/main.js')}}"></script>
    <script src="{{asset('dist/js/script.js')}}"></script>


</body>

</html>