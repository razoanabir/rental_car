<section id="contact">
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Contact Us</h1>
                <p class="mb-0">Get in touch with us easily through our online contact form, by phone, email, or face to
                    face at our location.</p>
            </div>
            <div class="row g-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-0">{{$personalInformation->main_address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0">{{$personalInformation->mail_id}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-0">{{$personalInformation->contact_number}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="contact-add-item p-4">
                                <div class="contact-icon mb-4">
                                    <i class="fab fa-firefox-browser fa-2x"></i>
                                </div>
                                <div>
                                    <h4>Website</h4>
                                    <p class="mb-0">{{$personalInformation->website_link}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Send Your Message</h4>
                        <form action="{{route('send.mail')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-validation" name="name" id="name"
                                            placeholder="Your Name" required>
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control form-validation" name="email" id="email"
                                            placeholder="Your Email" required="required" autofocus="autofocus" autocomplete="username">
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                            Please use a proper email address and include "@" on it.
                                        </div>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control " name="subject" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control form-validation" placeholder="Leave a message here"
                                            name="message" id="message" style="height: 160px" required></textarea>
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                            Please enter your message.
                                        </div>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <!-- success message -->
                                <div class="success-mail">
                                    <!-- The message will come from ajax, after the submition -->
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-light w-100 py-3 form-submit"><span class="res-btn">Send
                                            Message</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex flex-xl-column align-items-center justify-content-center">
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0"
                            href="{{$personalInformation->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0"
                            href="{{$personalInformation->twitter_link}}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0"
                            href="{{$personalInformation->instagram_link}}"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-0 me-0 me-xl-0"
                            href="{{$personalInformation->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 bg-light rounded">
                        <div class="row">
                            @foreach ($branch as $data)
                            <div class="col-md-6">
                                <div class="bg-white rounded p-4 mb-4">
                                    <h4 class="mb-3">Our Branch {{$loop->iteration}}</h4>
                                    <div class="d-flex align-items-center flex-shrink-0 mb-3">
                                        <p class="mb-0 text-dark me-2">Address:</p><i
                                            class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <p class="mb-0">{{$data->location}}</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 text-dark me-2">Telephone:</p><i
                                            class="fa fa-phone-alt text-primary me-2"></i>
                                        <p class="mb-0">{{$data->contact_number}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded w-100" style="height: 400px;" src="{{$personalInformation->google_map}}"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>


</script>