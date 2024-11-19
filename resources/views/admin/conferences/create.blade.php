@extends('layouts.app')

@section('content')
    <h1>Create Conference</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
