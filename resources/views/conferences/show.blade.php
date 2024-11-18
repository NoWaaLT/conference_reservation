@extends('layouts.app')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p><strong>Date:</strong> {{ $conference->date }}</p>
    <p><strong>Location:</strong> {{ $conference->location }}</p>

    <!-- If the user is logged in, allow them to register -->
    @auth
        <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
            @csrf
            <button type="submit">Register</button>
        </form>
    @endauth
@endsection
