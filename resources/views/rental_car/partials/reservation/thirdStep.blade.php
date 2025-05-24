<!-- second part of form for car reservation -->
<div class="row g-5">
    <div class="col-lg-12 fadeInLeft animated" style="background-color: #1f2e4e;" data-animation="fadeInLeft"
        data-delay="1s" style="animation-delay: 1s;">
        <div class="bg-secondary rounded p-5" style="background-color: #1f2e4e; margin-bottom: 80px;">
            <div class="col-md-12">
            <a style="float: right" class="btn btn-primary rounded-pill py-2 px-4 thirdStepBtn">Skip</a>
            <h4 class="text-white mb-4">SELECT AN EXTRA FACILITY IF YOU NEED</h4>
            </div>
            <div class="row">
                @foreach ($facility as $data)
                <div class="col-md-4 mt-4">
                    <div class="form-check form-check-inline thirdStepBtn">
                        <input class="form-check-input" type="radio" name="extra_facility_id" id="inlineRadioForFacility{{$loop->iteration}}" value="{{$data->id}}">
                        <div class="categories-item-inner text-center" for=" form-check-inline{{$loop->iteration}}" >
                            <label class="form-check-label" for="inlineRadioForFacility{{$loop->iteration}}">
                            <div class="categories-img rounded-top">
                                <img src="{{$data->image}}" class="img-fluid w-100 rounded-top" alt="" style="cursor: pointer">
                            </div>
                            <h5 class="text-light" style="cursor: pointer;">{{$data->title}}</h5>
                            <div class="categories-content rounded-bottom p-4" style="cursor: pointer">
                                <div class="row gy-2 gx-0 text-center mb-4">
                                    <div class="col-12">
                                        <span class="text-body ms-1">
                                            {{$data->details}}
                                        </span>
                                    </div>
                                    <div class="mt-4">
                                        <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">${{$data->cost}}/Day</h4>
                                    </div>
                                </div>
                            </div>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>