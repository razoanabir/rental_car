@extends('layouts.admin')
@section('content')
<div class="container mb-5">
    <div class="row rounded" style="height: 56px; color: #344767; background: white;">

        <!--heading for the page-->
        <div class="col-md-12 mt-2">
            <span class="fs-4">Reservation Details</span>
            <a href="{{ route('admin.dashboard') }}" style="float: right;" type="button"
                class="btn bg-gradient-secondary">Dashboard</a>
        </div>

        <div class="col-md-12 mt-2">
            <!-- success message -->
            @if (session('msg'))
            <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <!--reservation details's-->
    <div class="row mt-5">
        <!--$data is called from the Reservation model-->
        <div class="col-md-12 mt-5">
            <div class="card" style="width: auto;">
                <div class="card-body">
                    <div class="row border-bottom p-4">
                        <div class="col-md-4 border-end">
                            <h4 class="mb-4">Cars details</h4>
                            <div class="row text-center">
                                <h5 class="card-title text-center">{{$data->cars->vehicle_model_name}}</h5>
                                <img height="150px" width="200px" src="{{asset($data->cars->image)}}"
                                    alt="">
                                <h6>Daily rental price : {{$data->cars->price}}$</h6>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-center"><img height="20px"
                                        src="https://img.icons8.com/?size=100&id=11220&format=png&color=000000"
                                        alt=""><br>{{$data->cars->seating_capacity}}</div>
                                <div class="col-md-4 text-center"><img height="20px"
                                        src="https://img.icons8.com/?size=100&id=12684&format=png&color=000000"
                                        alt=""><br>{{$data->cars->transmission}}</div>
                                <div class="col-md-4 text-center"><img height="15px"
                                        src="https://img.icons8.com/?size=100&id=qFQh5IEZJJaU&format=png&color=000000"
                                        alt=""><br>{{$data->cars->fuel_type}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-center"><img height="20px"
                                        src="https://img.icons8.com/?size=100&id=1072&format=png&color=000000"
                                        alt=""><br>{{$data->cars->year_of_release}}</div>
                                <div class="col-md-4 text-center"><img height="20px"
                                        src="https://img.icons8.com/?size=100&id=112255&format=png&color=000000"
                                        alt=""><br>{{$data->cars->gearbox}}</div>
                                <div class="col-md-4 text-center"><img height="20px"
                                        src="https://img.icons8.com/?size=100&id=tH43p04emYWx&format=png&color=000000"
                                        alt=""><br>{{$data->cars->mileage}}k</div>
                            </div>
                        </div>
                        <div class="col-md-5 border-end">
                            <h5 class="mb-4">Reservation Information</h5>
                            <h5 class="card-title text-center mb-4">Itinerary</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Pick-Up Location:</strong>
                                    <p>{{$data->pick_up_location}}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Drop-Off Location:</strong>
                                    <p>{{$data->drop_off_location}}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Pick-Up Time:</strong>
                                    <p>{{$data->pick_up_time}}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Drop-Off Time:</strong>
                                    <p>{{$data->drop_off_time}}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Pick-Up Date:</strong>
                                    <p>{{$data->pick_up_date}}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Drop-Off Date:</strong>
                                    <p>{{$data->drop_off_date}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5 class="mb-4">Extra facility</h5>
                            <h5 class="card-title text-center mb-4">Facility's Details</h5>
                            <img height="100px" width="auto" src="{{asset($data->extraFacility->image ?? '')}}"
                                alt="No Extra Facility Required">
                            <h5>{{$data->extraFacility->title ?? 'No Extra Facility Required'}}</h5>
                            <h5 class="card-title">Cost:
                                {{$data->extraFacility->cost  ?? 'No Extra Facility Required'}}$</h5>
                            <p class="card-text">{{$data->extraFacility->details  ?? 'No Extra Facility Required'}}</p>
                        </div>
                    </div>
                    <div class="row p-4">
                        <div class="col-md-6">
                            <h5 class="mb-4">Personal Details</h5>
                            <h5 class="card-title text-center mb-4">User Information</h5>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Name:</strong>
                                    <p>{{$data->name}}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Age:</strong>
                                    <p>{{$data->age}}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Phone Number:</strong>
                                    <p>{{$data->phone_number}}</p>
                                </div>
                                <div class="col-6">
                                    <strong>Email:</strong>
                                    <p>{{$data->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-4">Reservation Status</h5>
                            <form action="{{route('reservation.status',$data->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="reservation_status" class="form-label">Update Reservation Status For This Unit</label>
                                <select class="form-select" name="reservation_status" id="reservation_status">
                                    <option selected value="{{$data->reservation_status}}">Select Option</option>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="rejected">Rejected</option>
                                </select><br>
                                <button type="submit" class="btn bg-gradient-primary mt-5" style="float: right;">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection