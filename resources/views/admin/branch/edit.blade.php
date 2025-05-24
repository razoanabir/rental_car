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

        <!--the form  is for store the information for branch page -->
        <form action="{{route('update.branch',$data->id)}}" method="post" enctype="multipart/form-data" class="card card-body mt-4">
          @csrf
            <h4 class="mb-0">Update Branch's Information</h4>

            <hr class="horizontal dark my-3">
            
            <label for="location" class="form-label">Update Branch's Location</label>
            <input type="text" class="form-control" name="location" id="location" value="{{$data->location}}"><br>
            
            <label for="contact_number" class="form-label">Update Contact Number For This Branch</label>
            <input type="number" class="form-control" name="contact_number" id="contact_number" value="{{$data->contact_number}}">

            
            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('view.branch')}}"  class="btn bg-gradient-primary m-0">Cancel</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update</button>
            </div>

          </form>
        </div>
    </div>
@endsection