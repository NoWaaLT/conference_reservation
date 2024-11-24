@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $conference->title }}</h1>

        <p>{{ $conference->description }}</p>
        <p><strong>{{ __('messages.datetime') }}:</strong> {{ $conference->datetime->format('Y-m-d H:i') }}</p>
        <p><strong>{{ __('messages.location') }}:</strong> {{ $conference->location }}</p>

        <!-- Display Success or Error Alerts -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Register Form for Clients -->
        @if (Auth::check() && Auth::user()->role === 'client')
            @if (!Auth::user()->registrations()->where('conference_id', $conference->id)->exists())
                <form action="{{ route('conferences.register', $conference->id) }}" method="POST" class="d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{ __('messages.register') }}</button>
                </form>
            @else
                <p class="text-center mt-3">{{ __('messages.already_registered') }}</p>
            @endif
        @else
            <p class="text-center mt-3">{{ __('messages.only_clients_can_register') }}</p>
        @endif
    </div>
@endsection
