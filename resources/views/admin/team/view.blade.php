@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">Team Members</span>
                <a href="{{ route('admin.dashboard') }}" style="float: right;" type="button" class="btn bg-gradient-secondary">Dashboard</a>
            </div>
            
            <div class="col-md-12 mt-2 mb-3">
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
            <!--$data is called from the Team model-->
            @foreach ($data as $_data)
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <img style="height:130px; width:130px; border-radius: 50%; margin-bottom: 10px;" src="{{asset($_data->image)}}" alt="">
                            <p class="card-title"><span>{{$_data->name}}</span> | <span>{{$_data->designation}}</span></p><br>
                            <p class="card-text">
                                <a class="btn btn-square bg-gradient-secondary rounded-circle " href="{{$_data->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square bg-gradient-secondary rounded-circle " href="{{$_data->twitter_link}}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square bg-gradient-secondary rounded-circle " href="{{$_data->instagram_link}}"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square bg-gradient-secondary rounded-circle " href="{{$_data->linked_in_link}}"><i class="fab fa-linkedin-in"></i></a>
                            </p>
                            <a href="{{route('edit.team',$_data->id)}}" class="btn bg-gradient-info">Edit</a>
                            <a href="{{route('delete.team', $_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted permanently')">Delete</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection