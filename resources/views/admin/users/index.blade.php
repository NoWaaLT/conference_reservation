@extends('layouts.app')

@section('content')
    <h1>Manage Users</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} {{ $user->surname }} - {{ $user->email }} - {{ $user->role }}
                <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
