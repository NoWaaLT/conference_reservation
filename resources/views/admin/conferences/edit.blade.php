@extends('layouts.app')

@section('content')
    <h1>Edit Conference</h1>

    <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $conference->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ $conference->description }}</textarea>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="{{ $conference->date }}" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ $conference->location }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
