@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ __('messages.administrator_homepage') }}</h1>

    <div class="list-group">
        <a href="{{ route('admin.conferences.index') }}" class="list-group-item list-group-item-action list-group-item-primary">
            {{ __('messages.administrate_conferences') }}
        </a>
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action list-group-item-secondary">
            {{ __('messages.manage_users') }}
        </a>
    </div>
</div>
@endsection
