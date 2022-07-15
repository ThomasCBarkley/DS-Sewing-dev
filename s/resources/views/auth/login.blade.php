@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Login</h1>

                {!! Form::open(['route' => '/s/admin/login', 'role' => 'form', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', null, old('remember')) !!} Remember me
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                    {{ link_to('s/admin/password/reset', 'Reset password', ['class' => 'btn btn-link'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
