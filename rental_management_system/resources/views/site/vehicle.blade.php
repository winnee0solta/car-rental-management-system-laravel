@extends('site.layout.base')

@section('content')
 {{-- vehicles --}}
<div class="row">
    @if (!empty($vehicles))
    @foreach ($vehicles as $vehicle)
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('/images/vehicles/'.$vehicle['image'])}}" class="img-fluid d-block m-auto"
                    style="height: 200px">
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
 
@endsection