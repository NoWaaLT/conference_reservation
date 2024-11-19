@extends('layouts.app')

@section('content')
    <h1>Conferences</h1>

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
