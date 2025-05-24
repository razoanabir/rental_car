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
        <form action="{{route('store.cars')}}" method="post" enctype="multipart/form-data" class="card card-body mt-4">
          @csrf
            <h4 class="mb-0">Add New Car</h4>

            <hr class="horizontal dark my-3">
            
            <label for="vehicle_model_name" class="form-label">Add Vehicle's Model Name</label>
            <input type="text" class="form-control" name="vehicle_model_name" id="vehicle_model_name"><br>
            

            <label for="image" class="form-label">Add Image of Vehicle</label>
            <input class="form-control form-control-lg" name="image" id="image" type="file"><br>
            
            <label for="price" class="form-label">Add Vehicle's Daily Rental Price(Dollar)</label>
            <input type="number" class="form-control" name="price" id="price"><br>

            <label for="seating_capacity" class="form-label">Add Vehicle's Seating Capacity</label>
            <select class="form-select" name="seating_capacity" id="seating_capacity">
                <option selected disabled>Select Option</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select><br>

            <label for="transmission" class="form-label">Add Vehicle's Transmission Type</label>
            <select class="form-select" name="transmission" id="transmission">
                <option selected disabled>Select Option</option>
                <option value="Auto">Auto</option>
                <option value="Manuall">Manuall</option>
              </select><br>

            <label for="fuel_type" class="form-label">Add Vehicle's Fuel type</label>
            <select class="form-select" name="fuel_type" id="fuel_type">
                <option selected disabled>Select Option</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="CNG">Compressed Natural Gas (CNG)</option>
                <option value="LPG">Liquefied Petroleum Gas (LPG)</option>
                <option value="BEVs">Battery Electric Vehicles (BEVs)</option>
              </select><br>

            <label for="year_of_release" class="form-label">Add Vehicle's Release Year</label>
            <input type="number" class="form-control" name="year_of_release" id="year_of_release"><br>

            <label for="gearbox" class="form-label">Add Vehicle's Gearbox Type</label>
            <select class="form-select" name="gearbox" id="gearbox">
                <option selected disabled>Select Option</option>
                <option value="Auto">Auto</option>
                <option value="Manuall">Manuall</option>
              </select><br>

            <label for="mileage" class="form-label">Add Vehicle's Mileage(kilometers)</label>
            <input type="number" class="form-control" name="mileage" id="mileage"><br>


            <div class="d-flex justify-content-end mt-4">
              <a href="{{route('admin.dashboard')}}"  class="btn bg-gradient-primary m-0">Cancel</a>
              <button type="submit" class="btn bg-gradient-info m-0 ms-2">Add New Car</button>
            </div>

          </form>
        </div>
    </div>
@endsection