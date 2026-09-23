@extends('layouts.projects')
@section('title', 'Modifica Projects')
@section('content')
    <h1>Projects</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
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
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
@endsection