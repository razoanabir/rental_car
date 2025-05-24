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

        <!--the form  is for update the information for extra facility page -->
        <form action="{{route('update.extra.facility',$data->id)}}" method="post" enctype="multipart/form-data" class="card card-body mt-4">
          @csrf
            <h4 class="mb-0">Edit Facility's Information</h4>
            <hr class="horizontal dark my-3">

            <img height="150px" width="200px" src="{{ asset($data->image) }}" alt="">
            <label for="image" class="form-label">Update The Image of Facility</label>
            <input class="form-control form-control-lg" name="image" id="image" type="file">


            <label for="title" class="form-label">Update The Title of Facility</label>
            <input type="text" class="form-control" name="title" id="title"  value="{{$data->title}}">
            
            <label for="cost" class="form-label">Update Cost of The Facility</label>
            <input type="number" class="form-control" name="cost" id="cost" value="{{$data->cost}}">


            <div class="form-group">
              <label for="details">Update The Details of Facility</label>
              <textarea class="form-control" name="details" id="details" rows="3">{{$data->details}}</textarea>
            </div>
            
            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('view.extra.facility')}}"  class="btn bg-gradient-primary m-0">Return</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update</button>
            </div>

          </form>
        </div>
    </div>
@endsection