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
    <form action="{{route('update.blog.post',$data->id)}}" method="post" enctype="multipart/form-data"
        class="card card-body mt-4">
        @csrf
        <h4 class="mb-0">Edit Blog Post</h4>

        <hr class="horizontal dark my-3">

        <label for="image" class="form-label">Update Image of The Blog</label>
        <img height="250px" width="300px" src="{{asset($data->image)}}" alt="image"><br>
        <input class="form-control form-control-lg" name="image" id="image" type="file">
        <br>
        <label for="title" class="form-label">Update Blog's Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}"><br>

        <label for="author" class="form-label">Update Blog's Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{$data->author}}"><br>

        <label for="category_id" class="form-label">Update Blog's Category </label>
        <select class="form-select" name="category_id" id="category_id">
            <option selected value="{{$data->id}}">{{$data->category->category_name}}</option>
            @foreach ($category as $_data)
              <option value="{{$_data->id}}">{{$_data->category_name}} </option>
            @endforeach
        </select><br>

        <div class="form-group">
            <label for="details">Update Blog's Details </label>
            <textarea class="form-control" name="details" id="details" rows="3">{{$data->details}}</textarea>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{route('admin.dashboard')}}" class="btn bg-gradient-primary m-0">Cancel</a>
            <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update Blog Post</button>
        </div>

    </form>
</div>
</div>
@endsection