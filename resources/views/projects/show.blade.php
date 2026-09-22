

@extends('layouts.projects')
@section('title', 'Projects')
@section('content')
  <p>{{ $project->name }}</p>
 
  <p>{{ $project->customer }}</p>
  <p>{{ $project->period }}</p>
   <p>{{ $project->description }}</p>
@endsection