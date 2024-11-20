@extends('layouts.app')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p>Date and Time: {{ $conference->datetime->format('Y-m-d H:i') }}</p>
    <p>Location: {{ $conference->location }}</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (Auth::check() && Auth::user()->role === 'client')
        @if (!Auth::user()->registrations()->where('conference_id', $conference->id)->exists())
            <form action="{{ route('conferences.register', $conference->id) }}" method="POST">
                @csrf
                <button type="submit">Register</button>
            </form>
        @else
            <p>You are already registered for this conference.</p>
        @endif
    @else
        <p>Only clients can register for conferences.</p>
    @endif
@endsection
