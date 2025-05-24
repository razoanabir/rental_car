@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">All Service Items</span>
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

        <!--all service's information-->
        <div class="row mt-5">
            <!--$data is called from the Testimonial model-->
            @foreach ($data as $_data)
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <img style="height:130px; width:130px; border-radius: 50%; margin-bottom: 10px;" src="{{asset($_data->image)}}" alt="">
                            <p class="card-title"><span>Name : {{$_data->name}}</span> </p>
                            <p> <span>Profession : {{$_data->profession}}</span></p>
                            <p class="p-2">Ratting : {{ $_data->star}}/5 <i class="fa-solid fa-star"></i></p>
                            <p>{{$_data->review}}</p>
                            <a href="{{route('edit.testimonial',$_data->id)}}" class="btn bg-gradient-info">Edit</a>
                            <a href="{{route('delete.testimonial', $_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted permanently')">Delete</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection