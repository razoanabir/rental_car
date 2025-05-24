<section id="service">
<div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Cental <span class="text-primary">Services</span></h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
                    </p>
                </div>
                <div class="row g-4">
                    @foreach ($service as $data)
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item p-4">
                                <div class="service-icon mb-4">
                                    <img height="50px" src="{{$data->image}}" alt="">
                                </div>
                                <h5 class="mb-3">{{$data->title}}</h5>
                                <p class="mb-0">{{$data->details}}.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>