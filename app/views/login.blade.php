@extends("layouts.modal")
@section("title")
    Login:
@endsection



@section("content")
<form method="POST" action="http://localhost:8080/Music/public/login" novalidate>
        <!-- if there are login errors, show them here -->
        @if (Session::get('loginError'))
        <div class="alert alert-danger">{{ Session::get('loginError') }}</div>
        @endif
            
    <div class="form-group @if ($errors->has('email')) has-error @endif">
        <label for="email">Email</label>
        <input type="text" id="email" class="form-control" name="email" placeholder="music@mail.com">
        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
    </div>

    <div class="form-group @if ($errors->has('password')) has-error @endif">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password">
        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="http://localhost:8080/Music/public/register" data-toggle="modal" data-dismiss="modal" data-target="#signUpModal" class="btn btn-default" role="button"><span class="glyphicon glyphicon-pencil"></span> 
            Sign Up</a>
        <button type="submit" class="btn btn-success">Log In!</button>
    </div>
</form>
@stop

    



