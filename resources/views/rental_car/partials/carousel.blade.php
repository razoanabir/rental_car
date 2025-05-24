<section id="#navbar">
    <div class="header-carousel mt-2">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{$home->image}}" class="img-fluid w-100" alt="First slide" />
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5">
                                <div class="col-lg-6 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s"
                                    style="animation-delay: 1s;">
                                    <div class="bg-secondary rounded p-5">
                                        <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4>

                                        <form action="{{route('reservation')}}" method="get" id="itineraryForm"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div
                                                            class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-map-marker-alt"></span> <span
                                                                class="ms-1">Pick Up</span>
                                                        </div>
                                                        <input required class="form-control reservation-validation" name="pick_up_location"
                                                            id="pick_up_location" type="text"
                                                            placeholder="Enter a City or Airport"
                                                            aria-label="Enter a City or Airport">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="#" class="text-start text-white d-block mb-2">Need a
                                                        different drop-off location?</a>
                                                    <div class="input-group">
                                                        <div
                                                            class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-map-marker-alt"></span><span
                                                                class="ms-1">Drop off</span>
                                                        </div>
                                                        <input required class="form-control reservation-validation" name="drop_off_location"
                                                            id="drop_off_location" type="text"
                                                            placeholder="Enter a City or Airport"
                                                            aria-label="Enter a City or Airport">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div
                                                            class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-calendar-alt"></span><span
                                                                class="ms-1">Pick Up</span>
                                                        </div>
                                                        <input required class="form-control reservation-validation" type="date" name="pick_up_date"
                                                            id="pick_up_date">
                                                        <select required class="form-select ms-3 reservation-validation " name="pick_up_time"
                                                            id="pick_up_time" aria-label="Default select example">
                                                            <option value="" selected disabled>00:00PM</option>
                                                            <option value="1:00AM">1:00AM</option>
                                                            <option value="2:00AM">2:00AM</option>
                                                            <option value="3:00AM">3:00AM</option>
                                                            <option value="4:00AM">4:00AM</option>
                                                            <option value="5:00AM">5:00AM</option>
                                                            <option value="6:00AM">6:00AM</option>
                                                            <option value="7:00AM">7:00AM</option>
                                                            <option value="8:00AM">8:00AM</option>
                                                            <option value="9:00AM">9:00AM</option>
                                                            <option value="10:00AM">10:00AM</option>
                                                            <option value="11:00AM">11:00AM</option>
                                                            <option value="12:00AM">12:00AM</option>
                                                            <option value="1:00PM">1:00PM</option>
                                                            <option value="2:00PM">2:00PM</option>
                                                            <option value="3:00PM">3:00PM</option>
                                                            <option value="4:00PM">4:00PM</option>
                                                            <option value="5:00PM">5:00PM</option>
                                                            <option value="6:00PM">6:00PM</option>
                                                            <option value="7:00PM">7:00PM</option>
                                                            <option value="8:00PM">8:00PM</option>
                                                            <option value="9:00PM">9:00PM</option>
                                                            <option value="10:00PM">10:00PM</option>
                                                            <option value="11:00PM">11:00PM</option>
                                                            <option value="12:00PM">12:00PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div
                                                            class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-calendar-alt"></span><span
                                                                class="ms-1">Drop off</span>
                                                        </div>
                                                        <input required class="form-control reservation-validation" type="date" name="drop_off_date"
                                                            id="drop_off_date">
                                                        <select required class="form-select ms-3 reservation-validation " name="drop_off_time"
                                                            id="drop_off_time" aria-label="Default select example">
                                                            <option value="" selected disabled>00:00PM</option>
                                                            <option value="1:00AM">1:00AM</option>
                                                            <option value="2:00AM">2:00AM</option>
                                                            <option value="3:00AM">3:00AM</option>
                                                            <option value="4:00AM">4:00AM</option>
                                                            <option value="5:00AM">5:00AM</option>
                                                            <option value="6:00AM">6:00AM</option>
                                                            <option value="7:00AM">7:00AM</option>
                                                            <option value="8:00AM">8:00AM</option>
                                                            <option value="9:00AM">9:00AM</option>
                                                            <option value="10:00AM">10:00AM</option>
                                                            <option value="11:00AM">11:00AM</option>
                                                            <option value="12:00AM">12:00AM</option>
                                                            <option value="1:00PM">1:00PM</option>
                                                            <option value="2:00PM">2:00PM</option>
                                                            <option value="3:00PM">3:00PM</option>
                                                            <option value="4:00PM">4:00PM</option>
                                                            <option value="5:00PM">5:00PM</option>
                                                            <option value="6:00PM">6:00PM</option>
                                                            <option value="7:00PM">7:00PM</option>
                                                            <option value="8:00PM">8:00PM</option>
                                                            <option value="9:00PM">9:00PM</option>
                                                            <option value="10:00PM">10:00PM</option>
                                                            <option value="11:00PM">11:00PM</option>
                                                            <option value="12:00PM">12:00PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-light w-100 py-2 reservation"><span
                                                            class="res-btn">Book Now</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-flex fadeInRight animated "
                                    data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start display-hide">
                                        <h1 class="display-5 text-white">{{$home->title}}</h1>
                                        <p>{{$home->details}}</p>
                                        <div class="success">
                                            <!-- success message -->
                                            @if (session('msg'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Congratulations! </strong>{{ session('msg') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>