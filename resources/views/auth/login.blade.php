@extends('layout.master')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4 mx-auto">
            <h3 class="text-center"><br><br><br>Login</h3>
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 col-md-offset-4 mx-auto">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6 col-md-offset-4 mx-auto">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class=" form-group col-md-6 col-md-offset-4 mx-auto">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        <div class="col-md-6 col-md-offset-4 mx-auto">
                            <button type="submit" class="btn">Login</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
