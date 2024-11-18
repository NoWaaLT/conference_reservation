{{-- conferences/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Conferences</h1>
        <ul>
            @foreach ($conferences as $conference)
                <li>
                    <a href="{{ route('conferences.show', $conference->id) }}">
                        {{ $conference->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
