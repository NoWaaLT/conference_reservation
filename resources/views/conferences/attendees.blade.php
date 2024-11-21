@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.attendees_for') }} {{ $conference->name }}</h1>

    <ul>
        @foreach ($attendees as $registration)
            <li>{{ $registration->user->name }} {{ $registration->user->surname }}</li>
        @endforeach
    </ul>

    <a href="{{ route('conferences.employee') }}">{{ __('messages.back_to_conferences') }}</a>
@endsection
