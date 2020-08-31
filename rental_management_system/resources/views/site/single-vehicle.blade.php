@extends('site.layout.base')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/vehicle">Vehicles</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$vehicle['name']}}</li>
    </ol>
</nav>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card card-body">

            <img src="{{asset('/images/vehicles/'.$vehicle['image'])}}" class="img-fluid d-block m-auto"
                style="height: 225px">

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
                    <td>No Plate</td>
                    <td>{{$vehicle['no_plate']}}</td>
                </tr>
                <tr>
                    <td>No Of Seats</td>
                    <td>{{$vehicle['no_of_seats']}}</td>
                </tr>
                <tr>
                    <td>Condition</td>
                    <td>{{$vehicle['condition']}}</td>
                </tr>
                <tr>
                    <td>Ac Status</td>
                    <td>{{$vehicle['ac_status']}}</td>
                </tr>
                <tr>
                    <td>Owner Name</td>
                    <td>{{$vehicle['owner_name']}}</td>
                </tr>
                <tr>
                    <td>Hiring Cost</td>
                    <td>Rs {{$vehicle['hiring_cost']}}</td>
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
            </table>

        </div>
    </div>
</div>

<div class="row justify-content-center mt-3 px-0">
    <div class="col-12 px-0">
        <div class="card card-body">
            <div class="d-flex">
                <h3 class="mr-4">Drivers</h3> 
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>address</th>
                        <th>Citizenship No</th>
                        <th>Experience</th>
                        <th>License</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($drivers))
                    @foreach ($drivers as $item)
                    <tr>
                        <td>
                            {{$loop->index + 1}}
                        </td>
                        <td>
                            <img src="{{asset('/images/drivers/'.$item->image)}}" class="img-fluid"
                                style="height: 100px">
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->address}}
                        </td>
                        <td>
                            {{$item->citizenship_no}}
                        </td>
                        <td>
                            {{$item->experience}}
                        </td>
                        <td>
                            <img src="{{asset('/images/drivers/'.$item->license)}}" class="img-fluid"
                                style="height: 125px">
                        </td>
                        <td>
                            @if ($item->status == 'Available' )
                                <span class="badge badge-pill badge-success py-1 px-3">Available</span> 
                            @endif
                            @if ($item->status == 'Unavailable' )
                                <span class="badge badge-pill badge-danger py-1 px-3">Unavailable</span> 
                            @endif 
                        </td> 
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection