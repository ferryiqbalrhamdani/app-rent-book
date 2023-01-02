@extends('layouts.default_admin')
@section('content')

<div class="col-lg-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                        @endif
                        <form class="user" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" required placeholder="Enter Username...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                            </div>
                            

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                            <hr>

                        </form>
                        <div class="text-center">
                            <a class="small" href="register">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop