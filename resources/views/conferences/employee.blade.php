@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ __('messages.conferences') }}</h1>

        <div class="mb-4">
            <h2>{{ __('messages.ended_conferences') }}</h2>
            @forelse ($endedConferences as $conference)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('conferences.show', $conference->id) }}">{{ $conference->title }}</a>
                        </h5>
                        <a href="{{ route('conferences.attendees', $conference->id) }}" class="btn btn-outline-success btn-sm">{{ __('messages.view_attendees') }}</a>
                    </div>
                </div>
            @empty
                <p>{{ __('messages.no_ended_conferences') }}</p>
            @endforelse
        </div>

        <hr>

        <div class="mb-4">
            <h2>{{ __('messages.upcoming_conferences') }}</h2>
            @forelse ($upcomingConferences as $conference)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('conferences.show', $conference->id) }}">{{ $conference->title }}</a>
                        </h5>
                        <a href="{{ route('conferences.attendees', $conference->id) }}" class="btn btn-outline-success btn-sm">{{ __('messages.view_attendees') }}</a>
                    </div>
                </div>
            @empty
                <p>{{ __('messages.no_upcoming_conferences') }}</p>
            @endforelse
        </div>
    </div>
@endsection
