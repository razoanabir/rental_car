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
    <form action="{{route('store.personal.information')}}" method="post" enctype="multipart/form-data"
        class="card card-body p-3 mb-5">
        @csrf
        <h4 class="mb-0">Update Personal Informations</h4>
        <hr class="horizontal dark my-3">

        <label for="main_address">Update Main Address</label>
        <input type="text" name="main_address" id="main_address" class="form-control form-control-lg mb-3"
            value="{{$data->main_address}}">

        <label for="mail_id">Update Mail Id</label>
        <input type="email" name="mail_id" id="mail_id" class="form-control form-control-lg mb-3"
            value="{{$data->mail_id}}">

        <label for="contact_number">Update Contact Number</label>
        <input type="number" name="contact_number" id="contact_number" class="form-control form-control-lg mb-3"
            value="{{$data->contact_number}}">

        <label for="website_link">Update Website Link</label>
        <input type="text" name="website_link" id="website_link" class="form-control form-control-lg mb-3"
            value="{{$data->website_link}}">

        <label for="facebook_link">Update Facebook Link</label>
        <input type="text" name="facebook_link" id="facebook_link" class="form-control form-control-lg mb-3"
            value="{{$data->facebook_link}}">

        <label for="twitter_link">Update Twitter Link</label>
        <input type="text" name="twitter_link" id="twitter_link" class="form-control form-control-lg mb-3"
            value="{{$data->twitter_link}}">

        <label for="instagram_link">Update Instagram link</label>
        <input type="text" name="instagram_link" id="instagram_link" class="form-control form-control-lg mb-3"
            value="{{$data->instagram_link}}">

        <label for="linked_in_link">Update Linked-in Link</label>
        <input type="text" name="linked_in_link" id="linked_in_link" class="form-control form-control-lg mb-3"
            value="{{$data->linked_in_link}}">

        <label for="google_map">Update Location For Google Map <br>
            (<i>select the location, go to share option and copy the 'src' link from 'Embed a map'</i>)
        </label>
        <input type="text" name="google_map" id="google_map" class="form-control form-control-lg mb-3"
            value="{{$data->google_map}}">
        <div>
            <button type="submit" class="btn bg-gradient-info">Update</button>
        </div>
    </form>

</div>
@endsection