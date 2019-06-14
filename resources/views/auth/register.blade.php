@extends('layout.master')
@section('title','Register')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4 mx-auto">
            <h3 class="text-center"><br><br><br>Registration Form</h3>
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-8 col-md-offset-4 mx-auto">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>
                                {{ $errors->first('name') }}</strong>
                                    </span>
                             @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-8 col-md-offset-4 mx-auto">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-8 col-md-offset-4 mx-auto">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-8 col-md-offset-4 mx-auto">
                            <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-4 mx-auto">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="role">Roles</label>
                                </div>
                                <select class="custom-select" name="role">
                                    <option value="1">Admin</option> 
                                    <option value="2">User</option> 
                                    <option value="3">Editor</option>    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-4 mx-auto">
                            <button type="submit" class="btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
