<section id="categories">
        <div class="container-fluid categories pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Vehicle <span class="text-primary">Categories</span></h1>
                    <p class="mb-0">Explore our extensive vehicle categories. Find the ideal car for your trip, whether it's a compact car for easy parking, a spacious minivan for group travel, or a powerful truck for hauling cargo.
                    </p>
                </div>
                <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($cars as $data)
                        <div class="categories-item p-4">
                            <div class="categories-item-inner">
                                <div class="categories-img rounded-top">
                                    <img src="{{$data->image}}" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="categories-content rounded-bottom p-4">
                                    <h4>{{$data->vehicle_model_name}}</h4>

                                    <div class="mb-4">
                                        <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">${{$data->price}}/Day</h4>
                                    </div>
                                    <div class="row gy-2 gx-0 text-center mb-4">
                                        <div class="col-4 border-end border-white">
                                            <i class="fa fa-users text-dark"></i> <span class="text-body ms-1">{{$data->seating_capacity}} Seat</span>
                                        </div>
                                        <div class="col-4 border-end border-white">
                                            <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">{{$data->transmission}}</span>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-gas-pump text-dark"></i> <span class="text-body ms-1">{{$data->fuel_type}}</span>
                                        </div>
                                        <div class="col-4 border-end border-white">
                                            <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">{{$data->year_of_release}}</span>
                                        </div>
                                        <div class="col-4 border-end border-white">
                                            <i class="fa fa-cogs text-dark"></i> <span class="text-body ms-1">{{$data->gearbox}}</span>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-road text-dark"></i> <span class="text-body ms-1">{{$data->mileage}}K</span>
                                        </div>
                                    </div>
                                    <a href="#navbar" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>