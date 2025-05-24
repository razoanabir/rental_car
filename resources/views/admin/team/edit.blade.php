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

        <!--the form  is for update the information for team page -->
        <form action="{{route('update.team',$data->id)}}" method="post" enctype="multipart/form-data" class="card card-body mt-4 mb-5">
          @csrf
            <h4 class="mb-0">Update Team Member's Information</h4>

            <hr class="horizontal dark my-3">

            <img height="200px" width="200px" src="{{asset($data->image)}}" alt=""><br>

            <label for="image" class="form-label">Update Member's Picture</label>
            <input class="form-control form-control-lg" name="image" id="image" type="file"><br>

            
            <label for="name" class="form-label">Update Member's Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}"><br>

            <label for="designation" class="form-label">Update Member's Designation</label>
            <input type="text" class="form-control" name="designation" id="designation" value="{{$data->designation}}"><br>
            
            <label for="facebook_link" class="form-label">Update Member's Facebook Account Link</label>
            <input type="text" class="form-control form-control-lg" name="facebook_link" id="facebook_link" value="{{$data->facebook_link}}"><br>

            <label for="twitter_link" class="form-label">Update Member's Twitter Account Link</label>
            <input type="text" class="form-control form-control-lg" name="twitter_link" id="twitter_link" value="{{$data->twitter_link}}"><br>

            <label for="instagram_link" class="form-label">Update Member's Instagram Account Link</label>
            <input type="text" class="form-control form-control-lg" name="instagram_link" id="instagram_link" value="{{$data->instagram_link}}"><br>

            <label for="linked_in_link" class="form-label">Update Member's Linked In Account Link</label>
            <input type="text" class="form-control form-control-lg" name="linked_in_link" id="linked_in_link"value="{{$data->linked_in_link}}"><br>


            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('view.team')}}"  class="btn bg-gradient-primary m-0">Return</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update</button>
            </div>

          </form>
        </div>
    </div>
@endsection