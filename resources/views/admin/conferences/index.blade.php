@extends('layouts.app')

@section('content')
    <h1 class="my-4">{{ __('messages.conferences') }}</h1>

    <!-- Success and Error Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Create Conference Link -->
    <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary mb-4">
        {{ __('messages.create_conference') }}
    </a>

    <!-- Conferences List -->
    <div class="list-group">
        @foreach ($conferences as $conference)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $conference->title }}</h5>
                    <p class="mb-1">{{ $conference->datetime->format('Y-m-d H:i') }}</p>
                </div>

                <div class="d-flex">
                    <!-- Edit Conference Link -->
                    <a href="{{ route('admin.conferences.edit', $conference->id) }}" class="btn btn-warning btn-sm me-2">
                        {{ __('messages.edit') }}
                    </a>

                    <!-- Delete Conference Form -->
                    <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
