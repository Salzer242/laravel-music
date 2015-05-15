@extends("layouts.modal")
@section("title")
Register!
@endsection


@section("content")
	

	<form method="POST" action="http://localhost:8080/Music/public/register" novalidate>
		    

    <div class="form-group @if ($errors->has('email')) has-error @endif">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="music@mail.com">
        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
    </div>

    <div class="form-group @if ($errors->has('email_confirmation')) has-error @endif">
        <label for="email">Confirm Email</label>
        <input type="email" id="email_confirmation" class="form-control" name="email_confirmation">
        @if ($errors->has('email_confirmation')) <p class="help-block">{{ $errors->first('email_confirmation') }}</p> @endif
    </div>

    <div class="form-group @if ($errors->has('username')) has-error @endif">
        <label for="username">Name</label>
        <input type="text" id="username" class="form-control" name="username" placeholder="Somebody Awesome">
        @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
    </div>

    <div class="form-group @if ($errors->has('password')) has-error @endif">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password">
        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
    </div>

    <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" id="password_confirm" class="form-control" name="password_confirmation">
        @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Register!</button>
    </div>
    </form>

    
@endsection