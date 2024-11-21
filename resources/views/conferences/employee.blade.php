@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.conferences') }}</h1>

    <h2>{{ __('messages.ended_conferences') }}</h2>
    <ul>
        @forelse ($endedConferences as $conference)
            <li>
                <a href="{{ route('conferences.show', $conference->id) }}">{{ $conference->title }}</a>
                - <a href="{{ route('conferences.attendees', $conference->id) }}">{{ __('messages.view_attendees') }}</a>
            </li>
        @empty
            <li>{{ __('messages.no_ended_conferences') }}</li>
        @endforelse
    </ul>

    <hr>

    <h2>{{ __('messages.upcoming_conferences') }}</h2>
    <ul>
        @forelse ($upcomingConferences as $conference)
            <li>
                <a href="{{ route('conferences.show', $conference->id) }}">{{ $conference->title }}</a>
                - <a href="{{ route('conferences.attendees', $conference->id) }}">{{ __('messages.view_attendees') }}</a>
            </li>
        @empty
            <li>{{ __('messages.no_upcoming_conferences') }}</li>
        @endforelse
    </ul>
@endsection
