@extends('admin.layout.base')

@section('content')



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

                    <tr>
                        <td colspan="2" class="text-center">
                            @if ($booking['payement_completed'])
                            <a href="/admin/booking/payment/uncomplete/{{$booking['booking_id']}}" class="btn btn-dark">Mark as Payment
                                Remaning</a>

                            @else
                            <a href="/admin/booking/payment/completed/{{$booking['booking_id']}}" class="btn btn-dark">Mark as Payment
                                Completed</a>

                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="/admin/booking/cancel/{{$booking['booking_id']}}" class="btn btn-danger">Cancel
                                Booking</a>
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