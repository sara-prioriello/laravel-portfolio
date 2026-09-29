

@extends('layouts.projects')
@section('title', 'Projects')
@section('content')


<a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Modifica</a>
<form action="{{ route('projects.destroy', $project) }}" method="POST">
    @csrf
    @method('DELETE')  

    
    <input type="submit" value="Cancella project">
   
        <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Elimina Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sei sicuro di voler eliminare questo project?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Elimina</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
</form>

  <h3>{{ $project->name }}</h3>
    @if($project->image)
  <div id="form-control mb-3 d-flex flex-wrap">
        <label for="image">Immagine</label>
        <img src="{{ asset('storage/' . $project->image )}}" alt="copertina" width=100>
    </div>
    @endif
  <p>{{ $project->category->name }}</p>
 
    <p>{{ $project->customer }}</p>


    @if (count($project->technologies) > 0)
    <small>
        
        @foreach ($project->technologies as $technology)
            <span class="badge rounded-pill" style="background-color: {{ $technology->color }};">{{ $technology->name }}</span>
        @endforeach
    </small>
    @endif

    <p>{{ $project->period }}</p>

    <p>{{ $project->description }}</p>
@endsection