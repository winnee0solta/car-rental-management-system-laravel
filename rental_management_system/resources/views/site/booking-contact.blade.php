@extends('site.layout.base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/booking">Booking Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$vehicle->name}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{$driver->name}}</li>
        <li class="breadcrumb-item active" aria-current="page">Contact Detail</li>
    </ol>
</nav>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card card-body">

            <form action="/booking/add" method="POST" >
                @csrf
                <input name="vehicle_id" type="hidden" style="display: none" required value="{{$vehicle->id}}">
                <input name="driver_id"  type="hidden"style="display: none" required value="{{$driver->id}}">

                <div class="form-group">
                    <label>Booking For</label>
                    <input name="name" required type="text" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Contact No</label>
                    <input name="phone" required type="text" required class="form-control"
                        placeholder="Enter Contact no">
                </div>
                <div class="form-group">
                    <label>Selected Vehicle</label>
                    <input value="{{$vehicle->name}}" type="text" disabled class="form-control">
                </div>
                <div class="form-group">
                    <label>Selected Driver</label>
                    <input value="{{$driver->name}}" type="text" disabled class="form-control">
                </div>
                <div class="form-group">
                    <label>Travel Date (from)</label>
                    <input name="travel_date_from" required type="date" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Travel Date (to)</label>
                    <input name="travel_date_to" required type="date" required class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>


@endsection