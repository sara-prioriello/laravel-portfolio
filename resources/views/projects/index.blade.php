@extends('layouts.projects')
@section('title', 'Projects')
@section('content')
   //creiamo una tabella con tutti i progetti
   <table class="table">
   <thead>
      @foreach ($projects as $project)
      <tr>
         <td scope="col">{{ $project->name }}</td>
         <td scope="col">{{ $project->customer }}</td>
         <td scope="col">{{ $project->period }}</td>
         <td scope="col">{{ $project->description }}</td>
         <td scope="col">
            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Visualizza</a>
         </td>
      </tr>
      @endforeach
      </thead>
   </table>
      
@endsection