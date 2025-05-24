@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">All Blog Posts</span>
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

        <!--all freature's information-->
        <div class="row mt-5">
            <!--$data is called from the Feature model-->
            @foreach ($data as $_data)
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img height="200px" width="auto" src="{{asset($_data->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <p>{{$_data->category->category_name}}</p>
                            </div>
                            <h4 class="card-title">{{$_data->author}}</h4>
                            <h5 class="card-title">{{$_data->title}}</h5>
                            <h6 class="card-text">{{$_data->details}}</h6>
                            <a href="{{route('edit.blog.post',$_data->id)}}" class="btn bg-gradient-info">Edit</a>
                            <a href="{{route('delete.blog.post', $_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted permanently')">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection