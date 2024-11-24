@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ __('messages.attendees_for') }} {{ $conference->name }}</h1>

        @if($attendees->isEmpty())
            <p class="text-center">{{ __('messages.no_attendees') }}</p>
        @else
            <ul class="list-group">
                @foreach ($attendees as $registration)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $registration->user->name }} {{ $registration->user->surname }}
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('conferences.employee') }}" class="btn btn-primary">{{ __('messages.back_to_conferences') }}</a>
        </div>
    </div>
@endsection
