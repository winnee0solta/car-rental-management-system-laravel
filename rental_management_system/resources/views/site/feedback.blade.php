@extends('site.layout.base')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
    </ol>
</nav>

@if (Auth::check())
   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    Write Feedback
</button> 
@endif

<div class="row">
    @if (!empty($feedbacks))
    @foreach ($feedbacks as $feedback)
    <div class="col-12 col-md-4 mt-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="h4">
                    {{$feedback->subject}}
                </div>
             
                <div>
                    {{$feedback->message}}
                </div>
                <div class="mt-3">
                    {{$feedback->name}}
                </div>
                <div>
                    {{$feedback->email}}
                </div>

              
            </div>
        </div>
    </div>
    @endforeach
    @endif

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
                <form action="/feedback/add" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" required type="text" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" required type="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input name="subject" required type="text" class="form-control" placeholder="Enter subject">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" required type="text" class="form-control" ></textarea>
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


 
@endsection