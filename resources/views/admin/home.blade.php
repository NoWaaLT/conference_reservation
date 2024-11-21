@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.administrator_homepage') }}</h1>

    <ul>
        <li><a href="{{ route('admin.conferences.index') }}">{{ __('messages.administrate_conferences') }}</a></li>
        <li><a href="{{ route('admin.users.index') }}">{{ __('messages.manage_users') }}</a></li>
    </ul>
@endsection
