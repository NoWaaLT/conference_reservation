@extends('layouts.app')

@section('content')
    <h1>Edit Conference</h1>

    <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $conference->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ $conference->description }}</textarea>
        </div>
        <div>
            <label for="datetime">Date and Time</label>
            <input type="datetime-local" id="datetime" name="datetime" value="{{ $conference->datetime->format('Y-m-d\TH:i') }}" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{ $conference->location }}" required>
        </div>
        <div id="lectors">
            <label>Lectors</label>
            @foreach ($conference->lectors as $index => $lector)
                <div class="lector" id="lector-{{ $index }}">
                    <input type="text" name="lectors[{{ $index }}][name]" value="{{ $lector->name }}" placeholder="Name" required>
                    <input type="text" name="lectors[{{ $index }}][surname]" value="{{ $lector->surname }}" placeholder="Surname" required>
                    <button type="button" onclick="removeLector({{ $index }})">Remove</button>
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addLector()">Add Lector</button>
        <button type="submit">Update</button>
    </form>

    <script>
        let lectorIndex = {{ $conference->lectors->count() }};

        function addLector() {
            const lectorsDiv = document.getElementById('lectors');
            const newLectorDiv = document.createElement('div');
            newLectorDiv.classList.add('lector');
            newLectorDiv.id = `lector-${lectorIndex}`;
            newLectorDiv.innerHTML = `
                <input type="text" name="lectors[${lectorIndex}][name]" placeholder="Name" required>
                <input type="text" name="lectors[${lectorIndex}][surname]" placeholder="Surname" required>
                <button type="button" onclick="removeLector(${lectorIndex})">Remove</button>
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
