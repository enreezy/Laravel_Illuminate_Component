@extends('layout')


@section('content')

	<h1>{{ $title }}</h1>
    <p>{{ $text }}</p>

    @foreach($users as $user)
    	<p>{{ $user->name }}</p>
    @endforeach

@endsection