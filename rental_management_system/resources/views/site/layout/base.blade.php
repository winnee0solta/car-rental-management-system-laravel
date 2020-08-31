<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dai Call Rental Service</title>

    <!-- CSS -->
    <!-- Add Material font (Roboto) and Material icon as needed -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</head>

<body>

    {{-- modal  --}}
    @yield('modal')
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input name="email" type="email" class="form-control" aria-describedby="emailHelp"
                                placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" required type="text" required class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" required type="text" required class="form-control"
                                placeholder="Enter Phone">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input name="email" required type="email" required class="form-control"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" required type="password" required class="form-control"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--!ENDS modal  --}}


    <header class="navbar navbar-dark navbar-full bg-success doc-navbar-persistent">
        <button aria-controls="navdrawerDefault" aria-expanded="false" aria-label="Toggle Navdrawer"
            class="navbar-toggler " data-target="#navdrawerDefault" data-toggle="navdrawer">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mr-auto">Dai Call Rental Service</span>
        @if (auth()->check())
        @php
        //get client data
        $clientinfo = \App\Clientinfo::where('user_id',Auth::user()->id)->first();
        @endphp
        <div class=" btn text-white h5 mr-2">
            {{$clientinfo->name}}
        </div>

        @else
        <div>
            <button class="btn btn-dark  btn-sm  my-1" data-toggle="modal" data-target="#loginModal">Login</button>
            <button class="btn btn-info  btn-sm  my-1 ml-2" data-toggle="modal"
                data-target="#registerModal">Register</button>
        </div>
        @endif

    </header>

    <div aria-hidden="true" class="navdrawer " id="navdrawerDefault" tabindex="-1">
        <div class="navdrawer-content">
            <nav class="navdrawer-nav">
                <a class="nav-item nav-link" href="/">
                    <i class="material-icons mr-3">home</i>
                    Home
                </a>
                <a class="nav-item nav-link" href="/vehicle">
                    <i class="material-icons mr-3">directions_car</i>
                    Vehicles
                </a>
                @if (Auth::check())
                <a class="nav-item nav-link" href="/booking">
                    <i class="material-icons mr-3">class</i>
                    Bookings
                </a>
                @endif
                <a class="nav-item nav-link" href="/feedbacks">
                    <i class="material-icons mr-3">feedback</i>
                    Feedbacks
                </a>
                <a class="nav-item nav-link" href="/faq">
                    <i class="material-icons mr-3">help_outline</i>
                    Faq
                </a>
                <a class="nav-item nav-link" href="/about">
                    <i class="material-icons mr-3">groups</i>
                    About Us
                </a>
                <a class="nav-item nav-link" href="/contact">
                    <i class="material-icons mr-3">call</i>
                    Contact Us
                </a>
                @if (Auth::check())
                <a class="nav-item nav-link" href="/logout">
                    <i class="material-icons mr-3">logout</i>
                    Logout
                </a>
                @endif
            </nav>
        </div>
    </div>


    {{-- <main class="layout-content"> --}}
    <main class="container-fluid mt-3">

        @yield('content')
    </main>
    {{-- </main> --}}


    <div class="my-5">

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>