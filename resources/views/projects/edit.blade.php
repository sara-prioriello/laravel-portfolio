@extends('layouts.projects')
@section('title', 'Modifica Projects')
@section('content')
    <h1>Projects</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $project->name }}">
        </div>
        <div class="mb-3">
            <label for="customer" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="customer" name="customer" required value="{{ $project->customer }}">
        </div>
    <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="period" class="form-label">Periodo</label>
            <input type="text" class="form-control" id="period" name="period" placeholder="es. Gennaio – Marzo 2025" required value="{{ $project->period }}">
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie</label>
            <div>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="technology_{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} >
                        <label class="form-check-label" for="technology_{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
         <div class="form-control mb-3 d-flex flex-wrap gap-3">
            <label for="image" class="form-label">Immagine di copertina</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
             @if($project->image)
                <div id="form-project">
                        <img class="img-fluid w-15" src="{{ asset('storage/' . $project->image )}}" alt="copertina" width=100>
                    </div>
                    @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
@endsection