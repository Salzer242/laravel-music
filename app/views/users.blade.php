@extends("layouts.main")
@section("title")
Log In
@endsection

@section("content")
	@foreach($users as $user)
	{{$user}} <br/>
	@endforeach
@stop