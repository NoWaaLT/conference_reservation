@extends('layouts.app')

@section('content')
    <h1 class="my-4">{{ __('messages.edit_user') }}</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('messages.name') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">{{ __('messages.surname') }}</label>
            <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $user->surname) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('messages.email') }}</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">{{ __('messages.role') }}</label>
            <select id="role" name="role" class="form-select" required>
                <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>{{ __('messages.client') }}</option>
                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>{{ __('messages.employee') }}</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>{{ __('messages.admin') }}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
    </form>
@endsection
