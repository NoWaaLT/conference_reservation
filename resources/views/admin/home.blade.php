@extends('layouts.app')

@section('content')
    <h1>Administrator Homepage</h1>

    <ul>
        <li><a href="{{ route('admin.conferences.index') }}">Administrate Conferences</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
    </ul>
@endsection
