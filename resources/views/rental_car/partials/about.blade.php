<section id="about">
    <div class="container-fluid overflow-hidden about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item">
                        <div class="pb-5">
                            <h1 class="display-5 text-capitalize"><span class="text-primary">{{$about->title}}</span>
                            </h1>
                            <p class="mb-0">{{$about->details_about_us}}</p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="{{$about->vission_image}}" class="img-fluid w-50 h-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">{{$about->vission_title}}</h5>
                                    <p class="mb-0">{{$about->vission_details}}.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="{{$about->mission_image}}" class="img-fluid h-50 w-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">{{$about->mission_title}}</h5>
                                    <p class="mb-0">{{$about->mission_details}}.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-item my-4">{{$about->details_about_support}}p>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="text-center rounded bg-secondary p-4">
                                        <h1 class="display-6 text-white">{{$about->experience}}</h1>
                                        <h5 class="text-light mb-0">Years Of Experience</h5>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rounded">
                                        <p class="mb-2"><i
                                                class="fa fa-check-circle text-primary me-1"></i>{{$about->support_1}}
                                        </p>
                                        <p class="mb-2"><i
                                                class="fa fa-check-circle text-primary me-1"></i>{{$about->support_2}}
                                        </p>
                                        <p class="mb-2"><i
                                                class="fa fa-check-circle text-primary me-1"></i>{{$about->support_3}}
                                        </p>
                                        <p class="mb-0"><i
                                                class="fa fa-check-circle text-primary me-1"></i>{{$about->support_4}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5 d-flex align-items-center">
                                    <a href="#contact" class="btn btn-primary rounded py-3 px-5">More About Us</a>
                                </div>
                                <div class="col-lg-7">
                                    <div class="d-flex align-items-center">
                                        <img src="{{$about->owner_image}}"
                                            class="img-fluid rounded-circle border border-4 border-secondary"
                                            style="width: 100px; height: 100px;" alt="Image">
                                        <div class="ms-4">
                                            <h4>{{$about->owner_name}}</h4>
                                            <p class="mb-0">{{$about->owner_designation}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-img">
                        <div class="img-1">
                            <img src="{{asset('dist/img/about-img.jpg')}}" class="img-fluid rounded h-100 w-100" alt="">
                        </div>
                        <div class="img-2">
                            <img src="{{asset('dist/img/about-img-1.jpg')}}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid counter bg-secondary py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-thumbs-up fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold"
                                data-toggle="counter-up">{{$about->happy_clients}}</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Happy Clients</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-car-alt fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">{{$about->total_cars}}</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Number of Cars</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold"
                                data-toggle="counter-up">{{$about->car_centers}}</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Car Center</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold"
                                data-toggle="counter-up">{{$about->total_kilometers}}</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Total kilometers</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
