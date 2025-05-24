@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">
                <a  href="{{ route('admin.dashboard') }}" style="float: left;" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add New Catagory</a>
                </span>
                <a href="{{ route('admin.dashboard') }}" style="float: right;" type="button" class="btn bg-gradient-secondary">Dashboard</a>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <!-- success message -->
            @if (session('msg'))
                <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            </div>  
        <!--all freature's information-->
        <div class="card mt-3">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $_data)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$_data->category_name}}</td>
                            <td>
                            <a href="{{route('edit.category',$_data->id)}}" class="btn bg-gradient-info">Edit</a>
                            <a href="{{route('delete.category', $_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted permanently')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal For Add Category -->
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-2">
                <!-- Error message -->
                    <div class="success-msg"></div>
                <!-- Error message -->
                    <div class="errors-msg"></div>
                    
                    <!-- This form will save new catagory -->
                    <form action="{{route('store.category')}}" method="post" enctype="multipart/form-data" class="p-3">
                        @csrf
                            <h4 class="mb-0">Add New Catagory</h4>
                            <hr class="horizontal dark my-3">
                            
                            <label for="category_name" class="form-label">Add Cetegory's Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"><br>
                            
                            <div class="modal-footer">
                                <span class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</span>
                                <button class="btn bg-gradient-primary save-category">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection