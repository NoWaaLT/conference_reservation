@extends('layouts.app')

@section('content')
    <h1 class="my-4">{{ __('messages.create_conference') }}</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('messages.title') }}</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('messages.description') }}</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="datetime" class="form-label">{{ __('messages.datetime') }}</label>
            <input type="datetime-local" id="datetime" name="datetime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">{{ __('messages.location') }}</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div id="lectors" class="mb-3">
            <label class="form-label">{{ __('messages.lectors') }}</label>
            <div class="lector mb-2" id="lector-0">
                <input type="text" name="lectors[0][name]" class="form-control mb-2" placeholder="{{ __('messages.title') }}" required>
                <input type="text" name="lectors[0][surname]" class="form-control mb-2" placeholder="{{ __('messages.surname') }}" required>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeLector(0)">{{ __('messages.remove') }}</button>
            </div>
        </div>

        <!-- Buttons aligned using flexbox -->
        <div class="d-flex justify-content-between mb-4">
            <button type="button" class="btn btn-success" onclick="addLector()">{{ __('messages.add_lector') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('messages.create_conference') }}</button>
        </div>
    </form>

    <script>
        let lectorIndex = 1;

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
