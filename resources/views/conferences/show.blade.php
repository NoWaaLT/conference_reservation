@extends('layouts.app')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p>{{ __('messages.datetime') }}: {{ $conference->datetime->format('Y-m-d H:i') }}</p>
    <p>{{ __('messages.location') }}: {{ $conference->location }}</p>

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
                <button type="submit">{{ __('messages.register') }}</button>
            </form>
        @else
            <p>{{ __('messages.already_registered') }}</p>
        @endif
    @else
        <p>{{ __('messages.only_clients_can_register') }}</p>
    @endif
@endsection
