@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.edit_user') }}</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">{{ __('messages.name') }}</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="surname">{{ __('messages.surname') }}</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required>
        </div>
        <div>
            <label for="email">{{ __('messages.email') }}</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="role">{{ __('messages.role') }}</label>
            <select id="role" name="role" required>
                <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>{{ __('messages.client') }}</option>
                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>{{ __('messages.employee') }}</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>{{ __('messages.admin') }}</option>
            </select>
        </div>
        <button type="submit">{{ __('messages.update') }}</button>
    </form>
@endsection
