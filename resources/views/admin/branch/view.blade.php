@extends('layouts.admin')
@section('content')
    <div class="container mb-5">
        <div class="row rounded" style="height: 56px; color: #344767; background: white;">
            
            <!--heading for the page-->
            <div class="col-md-12 mt-2">
                <span class="fs-4">All Branches</span>
                <a href="{{ route('admin.dashboard') }}" style="float: right;" type="button" class="btn bg-gradient-secondary">Dashboard</a>
            </div>

            <div class="col-md-12 mt-2">
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
        </div>

        <!--all freature's information-->
        <div class="row mt-5">
            <table class="table bg-white table-hover rounded mt-5">
                <tr class="text-center">
                    <th>Serial No.</th>
                    <th>Location</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $_data)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$_data->location}}</td>
                    <td>{{$_data->contact_number}}</td>
                    <td>
                        <a href="{{route('edit.branch',$_data->id)}}" class="btn bg-gradient-secondary">Edit</a>
                        <a href="{{route('delete.branch',$_data->id)}}" class="btn bg-gradient-danger" onclick="return confirm('This data will be deleted parmanently!')">Delete</a>
                    
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection