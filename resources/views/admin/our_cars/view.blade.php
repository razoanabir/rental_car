@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">All Car's Information</span>
                <a href="{{ route('admin.dashboard') }}" style="float: right;" type="button" class="btn bg-gradient-secondary">Dashboard</a>
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

        <!--all cars's information-->
        <div class="row mt-5">
            <!--$data is called from the Cars model-->
            @foreach ($data as $_data)
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <div class="row text-center">
                                <h5>{{$_data->vehicle_model_name}}</h5>
                                <img height="150px" width="200px" src="{{asset($_data->image)}}" class="mt-2 mb-3" alt="">
                                <h5>Daily rental price : {{$_data->price}}$</h5>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-center"><img height="20px" src="https://img.icons8.com/?size=100&id=11220&format=png&color=000000" alt=""> {{$_data->seating_capacity}}</div>
                                <div class="col-md-4 text-center"><img height="20px" src="https://img.icons8.com/?size=100&id=12684&format=png&color=000000" alt=""> {{$_data->transmission}}</div>
                                <div class="col-md-4 text-center"><img height="15px" src="https://img.icons8.com/?size=100&id=qFQh5IEZJJaU&format=png&color=000000" alt=""> {{$_data->fuel_type}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 text-center"><img height="20px" src="https://img.icons8.com/?size=100&id=1072&format=png&color=000000" alt=""> {{$_data->year_of_release}}</div>
                                <div class="col-md-4 text-center"><img height="20px" src="https://img.icons8.com/?size=100&id=112255&format=png&color=000000" alt=""> {{$_data->gearbox}}</div>
                                <div class="col-md-4 text-center"><img height="20px" src="https://img.icons8.com/?size=100&id=tH43p04emYWx&format=png&color=000000" alt=""> {{$_data->mileage}}k</div>
                            </div>
                            <a href="{{route('edit.cars',$_data->id)}}" class="btn bg-gradient-info">Edit</a>
                            <a href="{{route('delete.cars', $_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted permanently')">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


                    



                  
