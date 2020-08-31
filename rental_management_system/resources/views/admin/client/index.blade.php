@extends('admin.layout.base')

@section('content')



{{-- bookings --}}
<div class="row justify-content-center">

    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Registeted at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                        @foreach ($users as $item)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td> 
                            <td>{{$item->email}}</td>   
                            <td>
                                @if ($item->email_verified)
                                    Email Verified
                                @else 
                                Email Not Verified
                                @endif
                                </td> 
                                <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>


                    {{-- <tr>
                        <td colspan="2" class="text-center">
                            <a href="/admin/booking/cancel/{{$booking['booking_id']}}" class="btn btn-danger">Cancel
                    Booking</a>
                    </td>
                    </tr> --}}
                </table>
            </div>
        </div>
    </div>


</div>



@endsection