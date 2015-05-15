@extends("layouts.main")
@section("title")
{{$user->username}}
@endsection

@section("content")
	{{var_dump($user)}}
@stop