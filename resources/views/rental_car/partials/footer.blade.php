<section id="footer">
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-8 col-lg-8 col-xl-8">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">About Us</h4>
                                <p class="mb-3">{{$about->details_about_us}}</p>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="footer-item d-flex flex-column">
                        <h4 class="text-white">Contact Info</h4>
                            <a class="ml-2" href="#contact"><i
                                class="fa fa-map-marker-alt me-2"></i>{{$personalInformation->main_address}}</a>
                            <a class="ml-2"  href="mailto:{{$personalInformation->mail_id}}"><i class="fas fa-envelope me-2"></i>
                                {{$personalInformation->mail_id}}</a><br>
                            <div class="d-flex">
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3"
                                    href="{{$personalInformation->facebook_link}}"><i
                                        class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3"
                                    href="{{$personalInformation->twitter_link}}"><i
                                        class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3"
                                    href="{{$personalInformation->instagram_link}}"><i
                                        class="fab fa-instagram text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3"
                                    href="{{$personalInformation->linked_in_link}}"><i
                                        class="fab fa-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white">Quick Links</h4>
                        <a href="#about"><i class="fas fa-angle-right me-2"></i> About</a>
                        <a href="#categories"><i class="fas fa-angle-right me-2"></i> Cars</a>
                        <a href="#team"><i class="fas fa-angle-right me-2"></i> Team</a>
                        <a href="#contact"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                        <a href="#blog"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    </div><br>
                    <div class="col-md-12">
                    <div class="footer-item d-flex flex-column">
                        <h3 class="text-white mb-4">Business Hours</h3>
                        <div class="mb-4">
                            <h5 class="text-muted mb-0">24/7 at your service</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>