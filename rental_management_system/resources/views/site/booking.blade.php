@extends('site.layout.base')

@section('content')

<a href="/booking/new" type="button" class="btn btn-dark">
    New Booking
</a>

<h4 class="h4 mt-5">My Bookings</h4>

{{-- bookings --}}
<div class="row">
    @if (!empty($bookings))
    @foreach ($bookings as $booking)
    <div class="col-12 col-md-4 mt-2">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Booking For</td>
                        <td>{{$booking['name']}}</td>
                    </tr>
                    <tr>
                        <td>Contact No</td>
                        <td>{{$booking['phone']}}</td>
                    </tr>
                    <tr>
                        <td>Travel Date (from)</td>
                        <td>{{$booking['travel_date_from']}}</td>
                    </tr>
                    <tr>
                        <td>Travel Date (to)</td>
                        <td>{{$booking['travel_date_to']}}</td>
                    </tr>
                    <tr>
                        <td>Vehicle</td>
                        <td>
                            <a href="/vehicle/{{$booking['vehicle_id']}}" target="_blank" class="text-info">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Driver Name</td>
                        <td>{{$booking['driver_data']['name']}}</td>
                    </tr>
                    <tr>
                        <td>Driver Phone</td>
                        <td>{{$booking['driver_data']['phone']}}</td>
                    </tr> 
                    <tr>
                        <td>Payment Status</td>
                        <td>
                            @if ($booking['payement_completed'])
                            <span class="badge badge-pill badge-success py-1 px-3">Payment Completed</span>
                           
                            @else 
                            <span class="badge badge-pill badge-danger py-1 px-3">Payment Remaning</span>
                            
                            @endif
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