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

        <!--the form  is for store the information for service page -->
        <form action="{{route('store.service')}}" method="post" enctype="multipart/form-data" class="card card-body mt-4">
          @csrf
            <h4 class="mb-0">Add New Service</h4>

            <hr class="horizontal dark my-3">
            
            <label for="title" class="form-label">Title of The Service</label>
            <input type="text" class="form-control" name="title" id="title">
            
            <div class="form-group">
              <label for="details">Details of The Service</label>
              <textarea class="form-control" name="details" id="details" rows="3"></textarea>
            </div>

            <label for="image" class="form-label">Add Image of The Service</label>
            <input class="form-control form-control-lg" name="image" id="image" type="file">
            
            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('admin.dashboard')}}"  class="btn bg-gradient-primary m-0">Cancel</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Add New Service</button>
            </div>

          </form>
        </div>
    </div>
@endsection