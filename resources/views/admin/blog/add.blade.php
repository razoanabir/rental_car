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

    <!--the form  is for store the information for our car page -->
    <form action="{{route('store.blog.post')}}" method="post" enctype="multipart/form-data"
        class="card card-body mt-4 mb-5">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-0">Add New Blog Post</h4>
            </div>
            <div class="col-md-6">
                <!--To manage the category items-->
                <a href="{{ route('view.category') }}" style="float: right;" type="button"
                    class="btn bg-gradient-danger">Manage Categories</a>
            </div>
        </div>

        <hr class="horizontal dark my-3">

        <input type="hidden" name="author" value="{{Auth::guard('admin')->user()->name}}">

        <label for="title" class="form-label">Add Blog's Title</label>
        <input type="text" class="form-control" name="title" id="title"><br>

        <label for="category_id" class="form-label">Add Blog's Category </label>
        <select class="form-select" name="category_id" id="category_id">
            <option selected disabled>Select Option</option>
            @foreach ($category as $_data)
              <option value="{{$_data->id}}">{{$_data->category_name}} </option>
            @endforeach
        </select><br>

        <div class="form-group">
            <label for="details">Add Blog's Details </label>
            <textarea class="form-control" name="details" id="details" rows="3"></textarea>
        </div>

        <label for="image" class="form-label">Add Image of The Blog</label>
        <input class="form-control form-control-lg" name="image" id="image" type="file">

        <div class="d-flex justify-content-end mt-4">
            <a href="{{route('admin.dashboard')}}" class="btn bg-gradient-primary m-0">Cancel</a>
            <button type="submit" class="btn bg-gradient-info m-0 ms-2">Add New Blog</button>
        </div>

    </form>
</div>
</div>
@endsection