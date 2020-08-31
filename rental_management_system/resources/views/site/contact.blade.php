@extends('site.layout.base')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact US</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">location_on</i>
                </h4>
                <p class="card-text text-center h5">
                    Kamal Marga, Kathmandu <br>
                    Nepal, 44600
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">call</i>
                </h4>
                <p class="card-text text-center h5">
                    (+977) 441-2929, 980-1022446<br>
                    Sun-Fri 8:00am-4:00pm
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center font-weight-bold mb-1">
                    <i class="material-icons mr-3">email</i>
                </h4>
                <p class="card-text text-center h5">
                    info@dairental.com<br>
                    24x7 support
                </p>
            </div>
        </div>
    </div>
</div>

<div class="h2 mt-4">
    Get In Touch
</div>
<div>
    <p>
        We are here to help and answer any questions you might have. We look forward to hearing from you.
    </p>
</div>

<div class="card card-body">
    <form>
        <div class="form-group">
            <label >Name</label>
            <input name="name" type="text" class="form-control"   
                placeholder="Enter Name"> 
        </div>
        <div class="form-group">
            <label >Number</label>
            <input name="number" type="text" class="form-control"   
                placeholder="Enter Number"> 
        </div>
        <div class="form-group">
            <label >Email</label>
            <input name="email" type="email" class="form-control"   
                placeholder="Enter Email"> 
        </div>
        <div class="form-group">
            <label >Subject</label>
            <input name="subject" type="text" class="form-control"   
                placeholder="Enter Subject"> 
        </div> 
        <div class="form-group">
            <label >Message</label>
            <textarea name="message" class="form-control"  ></textarea>
        </div> 
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>


@endsection