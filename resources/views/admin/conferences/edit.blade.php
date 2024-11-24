@extends('layouts.app')

@section('content')
    <h1 class="my-4">{{ __('messages.edit_conference') }}</h1>

    <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">{{ __('messages.title') }}</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $conference->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('messages.description') }}</label>
            <textarea id="description" name="description" class="form-control" required>{{ $conference->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="datetime" class="form-label">{{ __('messages.datetime') }}</label>
            <input type="datetime-local" id="datetime" name="datetime" class="form-control" value="{{ $conference->datetime->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">{{ __('messages.location') }}</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ $conference->location }}" required>
        </div>

        <div id="lectors" class="mb-3">
            <label class="form-label">{{ __('messages.lectors') }}</label>
            @foreach ($conference->lectors as $index => $lector)
                <div class="lector mb-2" id="lector-{{ $index }}">
                    <input type="text" name="lectors[{{ $index }}][name]" class="form-control mb-2" value="{{ $lector->name }}" placeholder="{{ __('messages.title') }}" required>
                    <input type="text" name="lectors[{{ $index }}][surname]" class="form-control mb-2" value="{{ $lector->surname }}" placeholder="{{ __('messages.surname') }}" required>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeLector({{ $index }})">{{ __('messages.remove') }}</button>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mb-4">
            <button type="button" class="btn btn-success" onclick="addLector()">{{ __('messages.add_lector') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
        </div>
    </form>

    <script>
        let lectorIndex = {{ $conference->lectors->count() }};

        function addLector() {
            const lectorsDiv = document.getElementById('lectors');
            const newLectorDiv = document.createElement('div');
            newLectorDiv.classList.add('lector', 'mb-2');
            newLectorDiv.id = `lector-${lectorIndex}`;
            newLectorDiv.innerHTML = `
                <input type="text" name="lectors[${lectorIndex}][name]" class="form-control mb-2" placeholder="{{ __('messages.title') }}" required>
                <input type="text" name="lectors[${lectorIndex}][surname]" class="form-control mb-2" placeholder="{{ __('messages.surname') }}" required>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeLector(${lectorIndex})">{{ __('messages.remove') }}</button>
            `;
            lectorsDiv.appendChild(newLectorDiv);
            lectorIndex++;
        }

        function removeLector(index) {
            const lectorDiv = document.getElementById(`lector-${index}`);
            if (lectorDiv) {
                lectorDiv.remove();
            }
        }
    </script>
@endsection
