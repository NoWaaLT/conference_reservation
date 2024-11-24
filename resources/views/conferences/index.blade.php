@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ __('messages.conferences') }}</h1>

        <div class="list-group">
            @foreach ($conferences as $conference)
                <a href="{{ route('conferences.show', $conference->id) }}" class="list-group-item list-group-item-action mb-2">
                    {{ $conference->title }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
