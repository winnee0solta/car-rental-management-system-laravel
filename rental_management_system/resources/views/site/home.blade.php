@extends('site.layout.base')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">directions_car</i>
                </h4>
                <p class="card-text text-center h5">
                    Total Vehicles <br>
                    {{$counter1}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">groups</i>
                </h4>
                <p class="card-text text-center h5">
                    Registered Users<br>
                    {{$counter2}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">class</i>
                </h4>
                <p class="card-text text-center h5">
                    Total Booking<br>
                    {{$counter3}}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="h3 mt-4">
    Recently Added
</div>


{{-- vehicles --}}
<div class="row">
    @if (!empty($vehicles))
    @foreach ($vehicles as $vehicle)
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('/images/vehicles/'.$vehicle['image'])}}" class="img-fluid d-block m-auto" style="height: 200px">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{$vehicle['name']}}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{$vehicle['type']}}</td>
                    </tr> 
                    <tr>
                        <td>No Of Seats</td>
                        <td>{{$vehicle['no_of_seats']}}</td>
                    </tr> 
                    <tr>
                        <td>Status</td>
                      <td>
                            @if ($vehicle->status == 'Available' )
                            <span class="badge badge-pill badge-success py-1 px-3">Available</span>
                            @endif
                            @if ($vehicle->status == 'Unavailable' )
                            <span class="badge badge-pill badge-danger py-1 px-3">Unavailable</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="/vehicle/{{$vehicle['id']}}" class="btn btn-info">More Information</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    @endif

</div>


{{-- home footer  --}}
{{-- 
<div class="row mt-5">
    <div class="col-md-3">
        <div class="font-weight-bold h4">How it works</div>
        <ul>
            <li>Search for vehicle</li>
            <li>Choose the vehicle you like</li>
            <li>Book your vehicle & driver</li>
            <li>Get approved/confirmation</li> 
        </ul>
    </div>
    <div class="col-md-6">
        <div>
            <div class="font-weight-bold h4">About Us</div>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, maxime? Est, illo. Sequi doloribus harum autem rem iste nobis ratione quisquam exercitationem quia praesentium molestias amet nam minima voluptate, consectetur accusantium soluta nesciunt laudantium officia impedit! Amet minus, harum, nobis ipsum laborum similique quae soluta accusamus dolores est, cumque sapiente.
            </p>
        </div>
    </div>
</div> --}}

@endsection