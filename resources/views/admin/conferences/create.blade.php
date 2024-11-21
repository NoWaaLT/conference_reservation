@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.create_conference') }}</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">{{ __('messages.title') }}</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">{{ __('messages.description') }}</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="datetime">{{ __('messages.datetime') }}</label>
            <input type="datetime-local" id="datetime" name="datetime" required>
        </div>
        <div>
            <label for="location">{{ __('messages.location') }}</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div id="lectors">
            <label>{{ __('messages.lectors') }}</label>
            <div class="lector">
                <input type="text" name="lectors[0][name]" placeholder="{{ __('messages.title') }}" required>
                <input type="text" name="lectors[0][surname]" placeholder="{{ __('messages.surname') }}" required>
                <button type="button" onclick="removeLector(0)">{{ __('messages.remove') }}</button>
            </div>
        </div>
        <button type="button" onclick="addLector()">{{ __('messages.add_lector') }}</button>
        <button type="submit">{{ __('messages.create_conference') }}</button>
    </form>

    <script>
        let lectorIndex = 1;

        function addLector() {
            const lectorsDiv = document.getElementById('lectors');
            const newLectorDiv = document.createElement('div');
            newLectorDiv.classList.add('lector');
            newLectorDiv.id = `lector-${lectorIndex}`;
            newLectorDiv.innerHTML = `
                <input type="text" name="lectors[${lectorIndex}][name]" placeholder="{{ __('messages.title') }}" required>
                <input type="text" name="lectors[${lectorIndex}][surname]" placeholder="{{ __('messages.surname') }}" required>
                <button type="button" onclick="removeLector(${lectorIndex})">{{ __('messages.remove') }}</button>
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
