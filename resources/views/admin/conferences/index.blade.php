@extends('layouts.app')

@section('content')
    <h1>Conferences</h1>

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

    <a href="{{ route('admin.conferences.create') }}">Create Conference</a>

    <ul>
        @foreach ($conferences as $conference)
            <li>
                {{ $conference->title }} - {{ $conference->date }}
                <a href="{{ route('admin.conferences.edit', $conference->id) }}">Edit</a>
                <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
