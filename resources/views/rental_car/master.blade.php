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
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('dist/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
        
        <!-- Template Stylesheet -->
        <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        @include('rental_car.partials.navbar')
        <!-- Navbar & Hero End -->

        <!-- Carousel Start -->
        @include('rental_car.partials.carousel')
        <!-- Carousel End -->

        <!-- About Start -->
        @include('rental_car.partials.about')
        <!-- About End -->

        <!-- Services Start -->
        @include('rental_car.partials.service')
        <!-- Services End -->

        <!-- Blog Start -->
        @include('rental_car.partials.blog')
        <!-- Blog End -->

        <!-- Features Start -->
        @include('rental_car.partials.features')
        <!-- Features End -->

        <!-- Car categories Start -->
        @include('rental_car.partials.categories')
        <!-- Car categories End -->

        <!-- Car Steps Start -->
        @include('rental_car.partials.carSteps')
        <!-- Car Steps End -->

        <!-- Banner Start -->
        @include('rental_car.partials.banner')
        <!-- Banner End -->

        <!-- Team Start -->
        @include('rental_car.partials.team')
        <!-- Team End -->

        <!-- Testimonial Start -->
        @include('rental_car.partials.testimonial')
        <!-- Testimonial End -->

        <!-- Contact Start -->
        @include('rental_car.partials.contact')
        <!-- Contact End -->

        <!-- Footer Start -->
        @include('rental_car.partials.footer')
        <!-- Footer End -->
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="https://tarunsoft.com/" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Tarun Soft</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Developed By <a class="border-bottom text-white" href="https://tarunsoft.com">Tarun Soft</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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