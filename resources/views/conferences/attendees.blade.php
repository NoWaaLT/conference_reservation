@extends('layouts.app')

@section('content')
    <h1>Attendees for {{ $conference->name }}</h1>

    <ul>
        @foreach ($attendees as $registration)
            <li>{{ $registration->user->name }} {{ $registration->user->surname}}</li>
        @endforeach
    </ul>

    <a href="{{ route('conferences.employee') }}">Back to Conferences</a>
@endsection
