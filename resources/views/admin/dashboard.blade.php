@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Earning</p>
                                            <h5 class="font-weight-bolder">
                                            ${{ number_format($totalCost, 2) }}
                                            </h5>
                                            <p class="mb-0">
                                            Total Revenue to Date                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Cars</p>
                                            <h5 class="font-weight-bolder">
                                                {{$totalCars}}
                                            </h5>
                                            <p class="mb-0">
                                                In Current Stock
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <img class="mt-2" height="30px" src="https://img.icons8.com/?size=100&id=12684&format=png&color=FFFFFF" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Requests</p>
                                            <h5 class="font-weight-bolder">
                                            {{$totalReservation}}
                                            </h5>
                                            <p class="mb-0">
                                            Reservation Request Count
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-danger shadow-success text-center rounded-circle">
                                            <img class="mt-2" height="26px" src="https://img.icons8.com/?size=100&id=7777&format=png&color=FFFFFF" alt="">
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Confirmed</p>
                                            <h5 class="font-weight-bolder">
                                                {{$successfulReservations}}
                                            </h5>
                                            <p class="mb-0">
                                            Successful Reservations </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                            <img class="mt-2" height="30px" src="https://img.icons8.com/?size=100&id=MB5tQ2rt7IPy&format=png&color=FFFFFF" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <lex class="row">
            <div class="col-12 col-md-12 mb-4 mb-md-0">
                <!-- success message -->
                @if (session('msg'))
                <div class="alert bg-gradient-success alert-dismissible fade show text-white" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Clients</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Requested Car & Facility</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Reservation Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pick Up Date & Place</th>
                                    <th 
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $data = $reservation->reverse() ?>
                                @foreach ($data as $_data)                                
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="p-2">
                                                {{$loop->iteration}}
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">{{$_data->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$_data->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{$_data->cars->vehicle_model_name}}</p>
                                        <p class="text-xs text-secondary mb-0">{{ $_data->extraFacility->title ?? "Don't Need Any Facilities" }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <!-- changing the background color of reservation status -->
                                        <?php 
                                            $bg_status = '';
                                            if($_data->reservation_status == 'confirmed'){
                                                $bg_status = 'success';
                                            }
                                            if($_data->reservation_status == 'pending'){
                                                $bg_status = 'primary';
                                            }
                                            if($_data->reservation_status == 'rejected'){
                                                $bg_status = 'danger';
                                            }
                                        
                                        ?>
                                        <span class="badge badge-sm badge-{{$bg_status}}">{{$_data->reservation_status}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$_data->pick_up_date}}</span><br>
                                        <span class="text-secondary text-xs font-weight-bold">{{$_data->pick_up_location}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('reservation.details',$_data->id)}}" class="text-primary font-weight-bold text-xs">
                                            <img height="25px" src="https://img.icons8.com/?size=100&id=GVNodnA05zIG&format=png&color=7950F2" alt="">
                                        </a>|
                                        <a href="{{route('delete.reservation',$_data->id)}}" onclick="return confirm('This data will be deleted permanently')" class="text-danger font-weight-bold text-xs">
                                            <img height="25px" src="https://img.icons8.com/?size=100&id=gjhtZ8keOudc&format=png&color=FA5252" alt="">
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection