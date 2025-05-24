@extends('layouts.admin')
@section('content')

    <div class="container">
      <!-- success message -->
        @if (session('msg'))
          <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                {{ session('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <label aria-hidden="true">&times;</label>
              </button>
          </div>
        @endif
      <!-- Error message -->
        @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert bg-gradient-warning alert-dismissible fade show text-white" role="alert">
                {{ $error }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <label aria-hidden="true">&times;</label>
              </button>
          </div>
          @endforeach
        @endif
        <form action="{{route('store.testimonial')}}" method="post" enctype="multipart/form-data" class="card card-body mt-4">
          @csrf
            <h4 class="mb-0">Add New Review</h4>

            <hr class="horizontal dark my-3">
            
            <label for="name" class="form-label">Client's Name</label>
            <input type="text" class="form-control" name="name" id="name"><br>

            <label for="profession" class="form-label">Client's Designation</label>
            <input type="text" class="form-control" name="profession" id="profession"><br>
            
            <label for="star">Select Star Out of 5</label>
              <select class="form-select" name="star" id="star">
                <option selected>Select Option</option>
                <option value="0.5">0.5</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>                
                <option value="3.5">3.5</option>
                <option value="4">4</option>
                <option value="4.5">4.5</option>
                <option value="5">5</option>
              </select><br>

            <div class="form-group">
              <label for="review">Client's Review</label>
              <textarea class="form-control" name="review" id="review" rows="3"></textarea>
            </div>

            <label for="image" class="form-label">Client's Image</label>
            <input class="form-control form-control-lg" name="image" id="image" type="file">

            
            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('admin.dashboard')}}"  class="btn bg-gradient-primary m-0">Cancel</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Add New Review</button>
            </div>

          </form>
        </div>
    </div>
@endsection