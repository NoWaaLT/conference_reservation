@extends('layouts.app')

@section('content')
    <h1>Conferences</h1>

    <h2>Ended Conferences</h2>
    <ul>
        @forelse ($endedConferences as $conference)
            <li>
                <a href="{{ route('conferences.attendees', $conference->id) }}">{{ $conference->title }}</a>
            </li>
        @empty
            <li>No ended conferences available.</li>
        @endforelse
    </ul>

    <hr>

    <h2>Upcoming Conferences</h2>
    <ul>
        @forelse ($upcomingConferences as $conference)
            <li>
                <a href="{{ route('conferences.attendees', $conference->id) }}">{{ $conference->title }}</a>
            </li>
        @empty
            <li>No upcoming conferences available.</li>
        @endforelse
    </ul>
@endsection
