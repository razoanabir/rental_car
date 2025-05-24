<section id="testimonial">
        <div class="container-fluid testimonial pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Our Clients<span class="text-primary"> Riviews</span></h1>
                    <p class="mb-0">Hear from our satisfied customers! We consistently deliver exceptional service and reliable vehicles. Our clients appreciate our competitive pricing, transparent policies, and commitment to customer satisfaction.
                    </p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($testimonial as $data)    
                        <div class="testimonial-item">
                            <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="testimonial-inner p-4">
                                <img src="{{$data->image}}" class="img-fluid" alt="">
                                <div class="ms-4">
                                    <h4>{{$data->name}}</h4>
                                    <p>{{$data->name}}</p>
                                    <p>
                                        {{$data->star}}/5<i class="fas fa-star text-danger"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="border-top rounded-bottom p-4">
                                <p class="mb-0">{{$data->review}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>