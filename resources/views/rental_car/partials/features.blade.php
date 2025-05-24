<section id="features">
        <div class="container-fluid feature py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">{{$home->site_title}} <span class="text-primary">Features</span></h1>
                    <p class="mb-0">
                    Experience seamless car rentals with our user-friendly platform. Browse our diverse fleet, from economy to luxury, and easily book online. We prioritize customer satisfaction with competitive pricing, transparent fees, and flexible options. Enjoy customizable insurance packages and convenient add-ons like GPS. Our dedicated support team is available 24/7 to ensure a smooth and enjoyable rental journey.
                    </p>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4">
                        <div class="row gy-4 gx-0">
                            @foreach ($features as $data)
                                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                        <img height="50px" src="{{$data->image}}" alt="">
                                        </div>
                                        <div class="ms-4">
                                            <h5 class="mb-3">{{$data->title}}</h5>
                                            <p class="mb-0">{{$data->details}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>