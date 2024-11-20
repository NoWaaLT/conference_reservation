@extends('layouts.app')

@section('content')
    <h1>Create Conference</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="datetime">Date and Time</label>
            <input type="datetime-local" id="datetime" name="datetime" required>
        </div>
        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div id="lectors">
            <label>Lectors</label>
            <div class="lector">
                <input type="text" name="lectors[0][name]" placeholder="Name" required>
                <input type="text" name="lectors[0][surname]" placeholder="Surname" required>
                <button type="button" onclick="removeLector(0)">Remove</button>
            </div>
        </div>
        <button type="button" onclick="addLector()">Add Lector</button>
        <button type="submit">Create</button>
    </form>

    <script>
        let lectorIndex = 1;

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
