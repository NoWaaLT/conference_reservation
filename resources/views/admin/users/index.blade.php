@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.manage_users') }}</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} {{ $user->surname }} {{ $user->email }}
                <a href="{{ route('admin.users.edit', $user->id) }}">{{ __('messages.edit') }}</a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('messages.delete') }}</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
