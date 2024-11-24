@extends('layouts.app')

@section('content')
    <h1 class="my-4">{{ __('messages.manage_users') }}</h1>

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

    <div class="list-group">
        @foreach ($users as $user)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $user->name }} {{ $user->surname }}</strong><br>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">{{ __('messages.edit') }}</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
