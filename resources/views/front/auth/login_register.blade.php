@extends('front.master')
@section('front')

 <!-- Login Start -->
 <div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">    
                <div class="register-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Full Name</label>
                            <input class="form-control" type="text" name="name" :value="old('name')" placeholder=" Name">
                            @error('name')
                            <div class="text-danger"><small>{{$message}}</small></div>
                        @enderror
                        </div>
                       
                        <div class="col-md-12">
                            <label>E-mail</label>
                            <input class="form-control" type="email" placeholder="E-mail"  name="email" :value="old('email')" required>
                            @error('email')
                            <div class="text-danger"><small>{{$message}}</small></div>
                        @enderror
                        </div>
                      
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control"    type="password"
                            name="password"
                            required autocomplete="new-password">
                            @error('password')
                            <div class="text-danger"><small>{{$message}}</small></div>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Retype Password</label>
                            <input class="form-control"  type="password"
                            name="password_confirmation" required>
                            @error('password_confirmation')
                            <div class="text-danger"><small>{{$message}}</small></div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="login-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                            @error('email')
                                <div class="text-danger"> <small>{{$message}}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control"  type="password"
                            name="password"
                            required autocomplete="current-password">
                            @error('password')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@endsection