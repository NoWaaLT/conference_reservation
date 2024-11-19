@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
                <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
