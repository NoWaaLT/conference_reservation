@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.conferences') }}</h1>

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

    <a href="{{ route('admin.conferences.create') }}">{{ __('messages.create_conference') }}</a>

    <ul>
        @foreach ($conferences as $conference)
            <li>
                {{ $conference->title }} - {{ $conference->datetime->format('Y-m-d H:i') }}
                <a href="{{ route('admin.conferences.edit', $conference->id) }}">{{ __('messages.edit') }}</a>
                <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('messages.delete') }}</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
