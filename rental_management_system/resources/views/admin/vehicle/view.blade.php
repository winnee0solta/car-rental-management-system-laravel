@extends('admin.layout.base')

@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/vehicle">Vehicles</a></li>
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
                    <td>{{$vehicle['status']}}</td>
                </tr>
            </table>

        </div>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="d-flex">
                <h3 class="mr-4">Drivers</h3>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                    Add Driver
                </button>
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
                        <th>Action</th>
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
                                style="height: 125px">
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
                            {{$item->status}}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/vehicle/{{$vehicle['id']}}/remove-driver/{{$item->id}}"
                                    class="btn btn-danger btn-sm ml-3">Remove</a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>

<div>
    <a href="/admin/vehicle/delete/{{$vehicle['id']}}" class="btn btn-danger mt-5"> Delete Vehicle</a>
</div>

@endsection

@section('modal')

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class=" table-responsive">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($alldrivers))
                            @foreach ($alldrivers as $item)
                            <tr>
                                <td>
                                    {{$loop->index + 1}}
                                </td>
                                <td>
                                    <img src="{{asset('/images/drivers/'.$item['image'])}}" class="img-fluid">
                                </td>
                                <td>
                                    {{$item['name']}}
                                </td>
                                <td>
                                    {{$item['address']}}
                                </td>
                                <td>
                                    {{$item['citizenship_no']}}
                                </td>
                                <td>
                                    {{$item['experience']}}
                                </td>
                                <td>
                                    <img src="{{asset('/images/drivers/'.$item['license'])}}" class="img-fluid">
                                </td>
                                <td>
                                    {{$item['status']}}
                                </td>
                                <td>
                                    <a href="/admin/vehicle/{{$vehicle['id']}}/add-driver/{{$item['id']}}"
                                        class="btn btn-danger btn-sm ml-3">Add Driver</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection