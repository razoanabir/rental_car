@extends('layouts.admin')
@section('content')
    <div class="container">

      <!-- success message -->
        @if (session('msg'))
          <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                {{ session('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif

      <!-- Error message -->
        @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert bg-gradient-warning alert-dismissible fade show text-white" role="alert">
                {{ $error }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endforeach
        @endif

        <!--the form  is for store the information for home page -->
        <form action="{{route('store.home')}}" method="post" enctype="multipart/form-data" class="card card-body mt-4 ">
          @csrf
            <h4 class="mb-0">Update About Page Information</h4>

            <hr class="horizontal dark my-3">
                              
              <div class="row p-2">
                <div class="col-md-6">
                  <label for="image">Update Background Image In Home Page</label>
                  <img class="m-3" height="250px" width="300px" src="{{asset($data->image)}}" alt="image">
                  <input class="form-control form-control-lg" name="image" id="image" type="file"><br>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                        <label for="site_icon">Update Website's Title Icon </label>
                        <img class="m-3" height="155px" width="160px" src="{{asset($data->site_icon)}}" alt="site_icon">
                        <input class="form-control form-control-lg" name="site_icon" id="site_icon" type="file"><br>
                    </div>
                    <div class="col-md-6">
                        <label for="logo">Update Website's Logo</label>
                        <img class="m-3" height="155px" width="160px" src="{{asset($data->logo)}}" alt="logo">
                        <input class="form-control form-control-lg" name="logo" id="logo" type="file"><br>
                    </div>
                    <label for="site_title">Update Website's Title</label>
                    <input type="text" class="form-control" name="site_title" id="site_title" value="{{$data->site_title}}">
                  </div>
                </div>
              </div>
              
              <label for="title">Update Home Page Heading</label>
              <input type="text" name="title" id="title" class="form-control" value="{{$data->title}}"><br>

              <label for="details">Updata Details For Home page</label>
              <textarea class="form-control" name="details" id="details" rows="3">{{$data->details}}</textarea><br>
              
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update</button>
            </div>
          </form>
        </div>
    </div>
@endsection