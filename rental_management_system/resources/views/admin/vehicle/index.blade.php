@extends('admin.layout.base')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Vehicle
</button>


<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Hiring Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($vehicle))
                    @foreach ($vehicle as $item)
                    <tr>
                        <td>
                            {{$loop->index + 1}}
                        </td>
                        <td>
                            <img src="{{asset('/images/vehicles/'.$item['image'])}}" class="img-fluid"
                                style="height: 125px">
                        </td>
                        <td>
                            {{$item['name']}}
                        </td>
                        <td>
                            {{$item['type']}}
                        </td>
                        <td>
                            {{$item['hiring_cost']}}
                        </td>
                        <td>
                            {{$item['status']}}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/vehicle/view/{{$item['id']}}" class="btn btn-success btn-sm">View</a>
                                <button type="button" class="btn btn-dark btn-sm ml-3" data-toggle="modal"
                                    data-target="#editModal-{{$item['id']}}">
                                    Edit
                                </button>
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



@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/vehicle/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" required type="file" class="form-control" placeholder="Vehicle Picture">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" requiredtype="text" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input name="type" required type="text" class="form-control" placeholder="Enter type">
                    </div>
                    <div class="form-group">
                        <label>Vehicle No</label>
                        <input name="no_plate" required type="text" class="form-control" placeholder="Enter Vehicle No">
                    </div>
                    <div class="form-group">
                        <label>No of seats</label>
                        <input name="no_of_seats" required type="number" class="form-control"
                            placeholder="Enter No of seats">
                    </div>
                    <div class="form-group">
                        <label>Condition</label>
                        <input name="condition" required type="text" class="form-control"
                            placeholder="Enter Vehicle Condition">
                    </div>
                    <div class="form-group">
                        <label>AC Condition</label>
                        <input name="ac_status" required type="text" class="form-control"
                            placeholder="Enter Vehicle AC Condition">
                    </div>
                    <div class="form-group">
                        <label>OWner Name</label>
                        <input name="owner_name" required type="text" class="form-control"
                            placeholder="Enter OWner Name">
                    </div>
                    <div class="form-group">
                        <label>Hiring Cost (RS)</label>
                        <input name="hiring_cost" required type="number" class="form-control"
                            placeholder="Enter Hiring Cost">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" required class="form-control">
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-success">ADD</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@if (!empty($vehicle))
@foreach ($vehicle as $item)
<div class="modal fade" id="editModal-{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/vehicle/edit/{{$item['id']}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control" placeholder="Vehicle Picture">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" requiredtype="text" class="form-control" placeholder="Enter Name"
                            value="{{$item['name']}}">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input name="type" required type="text" class="form-control" placeholder="Enter type"
                            value="{{$item['type']}}">
                    </div>
                    <div class="form-group">
                        <label>Vehicle No</label>
                        <input name="no_plate" required type="text" class="form-control" placeholder="Enter Vehicle No"
                            value="{{$item['no_plate']}}">
                    </div>
                    <div class="form-group">
                        <label>No of seats</label>
                        <input name="no_of_seats" required type="number" class="form-control"
                            placeholder="Enter No of seats" value="{{$item['no_of_seats']}}">
                    </div>
                    <div class="form-group">
                        <label>Condition</label>
                        <input name="condition" required type="text" class="form-control"
                            placeholder="Enter Vehicle Condition" value="{{$item['condition']}}">
                    </div>
                    <div class="form-group">
                        <label>AC Condition</label>
                        <input name="ac_status" required type="text" class="form-control"
                            placeholder="Enter Vehicle AC Condition" value="{{$item['ac_status']}}">
                    </div>
                    <div class="form-group">
                        <label>OWner Name</label>
                        <input name="owner_name" required type="text" class="form-control"
                            placeholder="Enter OWner Name" value="{{$item['owner_name']}}">
                    </div>
                    <div class="form-group">
                        <label>Hiring Cost (RS)</label>
                        <input name="hiring_cost" required type="number" class="form-control"
                            placeholder="Enter Hiring Cost" value="{{$item['hiring_cost']}}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" required class="form-control">
                            @if ($item['status'] == 'Available')
                            <option value="Available" selected>Available</option>
                            @else
                            <option value="Available">Available</option>

                            @endif
                            @if ($item['status'] == 'Unavailable')
                            <option value="Unavailable" selected>Unavailable</option>
                            @else
                            <option value="Unavailable">Unavailable</option>

                            @endif
                        </select>

                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@endsection