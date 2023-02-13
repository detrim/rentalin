@extends('mainlogin')
@section('mainlogin')
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('login') }}" class="h1"><b>Sign In</b></a>
        </div>
        <div class="card-body">

            <form action="{{ url('proses-login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text"name="username" class="form-control " required placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password"
                        id="password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" onclick="myFunction()">
                            <label for="remember">
                                Show Passwrord
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
