@extends('admin.layout.base')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
    Add Driver
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
                        <th>address</th>
                        <th>Citizenship No</th>
                        <th>Experience</th>
                        <th>License</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($driver))
                    @foreach ($driver as $item)
                    <tr>
                        <td>
                            {{$loop->index + 1}}
                        </td>
                        <td>
                            <img src="{{asset('/images/drivers/'.$item['image'])}}" class="img-fluid"
                                style="height: 125px">
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
                            <img src="{{asset('/images/drivers/'.$item['license'])}}" class="img-fluid"
                                style="height: 125px">
                        </td>
                        <td>
                            {{$item['status']}}
                        </td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#editModal-{{$item['id']}}">
                                    Edit
                                </button>

                                <a href="/admin/driver/delete/{{$item['id']}}"
                                    class="btn btn-danger btn-sm ml-3">Delete</a>

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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/driver/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Driver Picture</label>
                        <input name="image" required type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" required type="text" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" required type="text" class="form-control" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" required type="text" class="form-control" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label>Citizenship No</label>
                        <input name="citizenship_no" required type="text" class="form-control"
                            placeholder="Enter Citizenship No">
                    </div>
                    <div class="form-group">
                        <label>Experiences</label>
                        <input name="experience" required type="text" class="form-control"
                            placeholder="Enter Experience">
                    </div>
                    <div class="form-group">
                        <label>License Picture</label>
                        <input name="license" required type="file" class="form-control">
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


@if (!empty($driver))
@foreach ($driver as $item)
<div class="modal fade" id="editModal-{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Driver Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/driver/edit/{{$item['id']}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Driver Picture</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" required type="text" class="form-control" placeholder="Enter Name"
                            value="{{$item['name']}}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" required type="text" class="form-control" placeholder="Enter Phone" value="{{$item['phone']}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" required type="text" class="form-control" placeholder="Enter address"
                            value="{{$item['address']}}">
                    </div>
                    <div class="form-group">
                        <label>Citizenship No</label>
                        <input name="citizenship_no" required type="text" class="form-control"
                            placeholder="Enter Citizenship No" value="{{$item['citizenship_no']}}">
                    </div>
                    <div class="form-group">
                        <label>Experiences</label>
                        <input name="experience" required type="text" class="form-control"
                            placeholder="Enter Experience" value="{{$item['experience']}}">
                    </div>

                    <div class="form-group">
                        <label>License Picture</label>
                        <input name="license" type="file" class="form-control">
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