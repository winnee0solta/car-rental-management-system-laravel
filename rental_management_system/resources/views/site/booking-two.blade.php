@extends('site.layout.base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/booking">Booking Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$vehicle->name}}</li>
        <li class="breadcrumb-item active" aria-current="page">Select Driver</li>
    </ol>
</nav>


{{-- driver --}}
<div class="row">
    @if (!empty($drivers))
    @foreach ($drivers as $driver)
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('/images/drivers/'.$driver->image)}}" class="img-fluid d-block m-auto"
                    style="height: 200px">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{$driver['name']}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$driver['address']}}</td>
                    </tr>
                    <tr>
                        <td>Citizenship No</td>
                        <td>{{$driver['citizenship_no']}}</td>
                    </tr>
                    <tr>
                        <td>Experience No</td>
                        <td>{{$driver['experience']}}</td>
                    </tr>
                    <tr>
                        <td>Driving License</td>
                        <td><img src="{{asset('/images/drivers/'.$driver->license)}}" class="img-fluid"
                                style="height: 125px"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($driver->status == 'Available' )
                            <span class="badge badge-pill badge-success py-1 px-3">Available</span>
                            @endif
                            @if ($driver->status == 'Unavailable' )
                            <span class="badge badge-pill badge-danger py-1 px-3">Unavailable</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"> 
                            <a href="/booking/new/vehicle/{{$vehicle['id']}}/driver/{{$driver->id}}" class="btn btn-dark">Select Driver </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>


@endsection