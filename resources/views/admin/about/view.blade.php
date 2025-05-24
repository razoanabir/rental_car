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

    <!--the form  is for store the information for about page -->
    <form action="{{route('store.about')}}" method="post" enctype="multipart/form-data" class="card card-body mt-4 ">
        @csrf
        <h4 class="mb-0">Update About Page Information</h4>

        <hr class="horizontal dark my-3">
        <div class="row">
            <div class="col-md-6">
                <label for="image_1">Update 1st Image In About Page</label>
                <img height="250px" width="100%" src="{{asset($data->image_1)}}" alt="image_1">
                <input class="form-control form-control-lg" name="image_1" id="image_1" type="file"><br>
            </div>

            <div class="col-md-6">
                <label for="image_2">Update 2nd Image In About Page</label>
                <img height="250px" width="100%" src="{{asset($data->image_2)}}" alt="image_2">
                <input class="form-control form-control-lg" name="image_2" id="image_2" type="file"><br>
            </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="row ">
            <div class="form-group">
                <label for="title">Update About Page Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$data->title}}"><br>

                <label for="details_about_us">Updata Details For About Us</label>
                <textarea class="form-control" name="details_about_us" id="details_about_us"
                    rows="3">{{$data->details_about_us}}</textarea><br>

                <label for="details_about_support">Updata Details About Our Support</label>
                <textarea class="form-control" name="details_about_support" id="details_about_support"
                    rows="3">{{$data->details_about_support}}</textarea>

            </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="row">
            <div class="col-md-6">
                <label for="vission_image">Update Iamge Vission</label><br>
                <img height="250px" width="100%" src="{{asset($data->vission_image)}}" alt="vission_image"><br><br>
                <input class="form-control form-control-lg" name="vission_image" id="vission_image" type="file"><br>

                <label for="vission_title">Update Title For Vission</label>
                <input type="text" name="vission_title" id="vission_title" class="form-control"
                    value="{{$data->vission_title}}"><br>

                <label for="vission_details">Updata Details Vission</label>
                <textarea class="form-control" name="vission_details" id="vission_details"
                    rows="3">{{$data->vission_details}}</textarea>
            </div>

            <div class="col-md-6">
                <label for="mission_image">Update Iamge Mission</label>
                <img height="250px" width="100%" src="{{asset($data->mission_image)}}" alt="mission_image"><br><br>
                <input class="form-control form-control-lg" name="mission_image" id="mission_image" type="file"><br>

                <label for="mission_title">Update Title For Mission</label>
                <input type="text" name="mission_title" id="mission_title" class="form-control"
                    value="{{$data->mission_title}}"><br>

                <label for="mission_details">Updata Details Mission</label>
                <textarea class="form-control" name="mission_details" id="mission_details"
                    rows="3">{{$data->mission_details}}</textarea>
            </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="row">
            <div class="col-md-6">
                <label for="experience">Our Total Experience (years)</label>
                <input type="number" name="experience" id="experience" class="form-control"
                    value="{{$data->experience}}"><br>

                <label for="support_1">Update Title For Support No 1</label>
                <input type="text" name="support_1" id="support_1" class="form-control"
                    value="{{$data->support_1}}"><br>

                <label for="support_2">Update Title For Support No 2</label>
                <input type="text" name="support_2" id="support_2" class="form-control"
                    value="{{$data->support_2}}"><br>

                <label for="support_3">Update Title For Support No 3</label>
                <input type="text" name="support_3" id="support_4" class="form-control"
                    value="{{$data->support_4}}"><br>

                <label for="support_4">Update Title For Support No 4</label>
                <input type="text" name="support_4" id="support_4" class="form-control"
                    value="{{$data->support_4}}"><br>
            </div>

            <div class="col-md-6 text-center">
                <label style="float: left" for="owner_image">Update Iamge of The Owner</label>
                <img class="mb-4 mt-4" height="174px" width="auto" style="border-radius: 50%; float: left"
                    src="{{asset($data->owner_image)}}" alt="owner_image">
                <input class="form-control form-control-lg" name="owner_image" id="owner_image" type="file"><br>

                <label style="float: left" for="owner_name">Update Name of The Owner</label>
                <input type="text" name="owner_name" id="owner_name" class="form-control"
                    value="{{$data->owner_name}}"><br>

                <label style="float: left" for="owner_designation">Updata The Role of The Owner</label>
                <input type="text" name="owner_designation" id="owner_designation" class="form-control"
                    value="{{$data->owner_designation}}"><br>
            </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="row p-2">
            <div class="col-md-3 text-center p-1">
                <label for="car_centers">Car Centers</label><br>
                <img height="70px" src="https://img.icons8.com/?size=100&id=8076&format=png&color=000000"
                    alt="car_centers">

                <div class="row p-2">
                    <button type="button" id="minus1" class="btn bg-gradient-danger"
                        style="height: 40px; width:20%">-</button>
                    <input type="number" name="car_centers" id="car_centers" class="form-control text-center"
                        style="height: 40px; width:50%" value="{{$data->car_centers}}">
                    <button type="button" id="pluss1" class="btn bg-gradient-primary"
                        style="height: 40px; width:20%">+</button>
                </div>
            </div>

            <div class="col-md-3 text-center p-1">
                <label for="total_cars">Total Cars</label><br>
                <img height="70px" src="https://img.icons8.com/?size=100&id=12684&format=png&color=000000"
                    alt="total_cars">

                <div class="row p-2">
                    <button type="button" id="minus2" class="btn bg-gradient-danger"
                        style="height: 40px; width:20%">-</button>
                    <input type="number" name="total_cars" id="total_cars" class="form-control text-center"
                        style="height: 40px; width:50%" value="{{$data->total_cars}}">
                    <button type="button" id="pluss2" class="btn bg-gradient-primary"
                        style="height: 40px; width:20%">+</button>
                </div>
            </div>

            <div class="col-md-3 text-center p-1">
                <label for="happy_clients">Happy Clients</label><br>
                <img height="70px" src="https://img.icons8.com/?size=100&id=6590&format=png&color=000000"
                    alt="happy_clients">

                <div class="row p-2">
                    <button type="button" id="minus3" class="btn bg-gradient-danger"
                        style="height: 40px; width:20%">-</button>
                    <input type="number" name="happy_clients" id="happy_clients" class="form-control text-center"
                        style="height: 40px; width:50%" value="{{$data->happy_clients}}">
                    <button type="button" id="pluss3" class="btn bg-gradient-primary"
                        style="height: 40px; width:20%">+</button>
                </div>
            </div>
            <div class="col-md-3 text-center p-1">
                <label for="total_kilometers">Total Kilometers</label><br>
                <img height="70px" src="https://img.icons8.com/?size=100&id=uhX1VI4OLRLx&format=png&color=000000"
                    alt="total_kilometers">

                <div class="row p-2">
                    <button type="button" id="minus4" class="btn bg-gradient-danger"
                        style="height: 40px; width:20%">-</button>
                    <input type="number" name="total_kilometers" id="total_kilometers" class="form-control text-center"
                        style="height: 40px; width:50%" value="{{$data->total_kilometers}}">
                    <button type="button" id="pluss4" class="btn bg-gradient-primary"
                        style="height: 40px; width:20%">+</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn bg-gradient-info m-0 ms-2">Update</button>
</div>
</form>
</div>
</div>
<!-- plus minus button control -->
<script>
    //1
    document.getElementById("pluss1").addEventListener("click", function () {
        var inputValue = document.getElementById("car_centers");
        inputValue.value = parseInt(inputValue.value) + 1;
    });
    document.getElementById("minus1").addEventListener("click", function () {
        var inputValue = document.getElementById("car_centers");
        inputValue.value = parseInt(inputValue.value) - 1;
    });
    //2
    document.getElementById("pluss2").addEventListener("click", function () {
        var inputValue = document.getElementById("total_cars");
        inputValue.value = parseInt(inputValue.value) + 1;
    });
    document.getElementById("minus2").addEventListener("click", function () {
        var inputValue = document.getElementById("total_cars");
        inputValue.value = parseInt(inputValue.value) - 1;
    });
    //3
    document.getElementById("pluss3").addEventListener("click", function () {
        var inputValue = document.getElementById("happy_clients");
        inputValue.value = parseInt(inputValue.value) + 1;
    });
    document.getElementById("minus3").addEventListener("click", function () {
        var inputValue = document.getElementById("happy_clients");
        inputValue.value = parseInt(inputValue.value) - 1;
    });
    //4
    document.getElementById("pluss4").addEventListener("click", function () {
        var inputValue = document.getElementById("total_kilometers");
        inputValue.value = parseInt(inputValue.value) + 1;
    });
    document.getElementById("minus4").addEventListener("click", function () {
        var inputValue = document.getElementById("total_kilometers");
        inputValue.value = parseInt(inputValue.value) - 1;
    });

</script>
@endsection
