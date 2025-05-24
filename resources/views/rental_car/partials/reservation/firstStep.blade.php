<style>
/* to easily */
.row, .col-12, .input-group{
    position: relative;
    z-index: 1;
}
</style>
<!-- first part of form for car reservation -->
<div class="row g-5">
    <div class="col-lg-12 fadeInLeft animated " style="background-color: #1f2e4e;" data-animation="fadeInLeft"
        data-delay="1s" style="animation-delay: 1s;">
        <div class="bg-secondary rounded p-5" style="background-color: #1f2e4e; margin-bottom: 80px;">
            <h4 class="text-light mb-4">EDIT THE CAR RESERVATION ITINERARY, IF NECESSARY.</h4>
            <div class="row g-3">
                <div class="col-12">
                    <div class="input-group">
                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                            <span class="fas fa-map-marker-alt"></span> <span class="ms-1">Pick Up</span>
                        </div>
                        <input class="form-control" name="pick_up_location" id="pick_up_location" type="text"
                            placeholder="Enter a City or Airport" value="{{ $itinerary['pick_up_location'] }}"
                            aria-label="Enter a City or Airport">
                    </div>
                </div>
                <div class="col-12">
                    <a href="#" class="text-start text-white d-block mb-2">Need a
                        different drop-off location?</a>
                    <div class="input-group">
                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                            <span class="fas fa-map-marker-alt"></span><span class="ms-1">Drop off</span>
                        </div>
                        <input class="form-control" name="drop_off_location" id="drop_off_location" type="text"
                            placeholder="Enter a City or Airport" value="{{ $itinerary['drop_off_location'] }}"
                            aria-label="Enter a City or Airport">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                            <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                        </div>
                        <input class="form-control" type="date" name="pick_up_date"  value="{{ $itinerary['pick_up_date'] }}" id="pick_up_date">
                        <select class="form-select ms-3" name="pick_up_time" id="pick_up_time"
                            aria-label="Default select example">
                            <option selected  value="{{ $itinerary['pick_up_time'] }}">{{ $itinerary['pick_up_time'] }}</option>
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
                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                            <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                        </div>
                        <input class="form-control" type="date" name="drop_off_date"  value="{{ $itinerary['drop_off_date'] }}" id="drop_off_date">
                        <select class="form-select ms-3" name="drop_off_time" id="drop_off_time"
                            aria-label="Default select example">
                            <option selected  value="{{ $itinerary['drop_off_time'] }}">{{ $itinerary['drop_off_time'] }}</option>
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
                <div class="col-md-12">
                    <a class="btn btn-light w-100 py-2" id="firstStepBtn"><span class="res-btn">CONTINUE</span></a>
                </div>
            </div>
        </div>
    </div>
</div>