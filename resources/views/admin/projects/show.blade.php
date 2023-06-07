@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="d-flex justify-content-between">
        @if ($project->type)
        <span>Tipologia: {{ $project->type->name }}</span>
        @else
            <span>Nessuna tipologia</span>
        @endif
        <span>{{ $project->slug }}</span>
    </div>
    <p class="mt-4">{{ $project->description }}</p>
@endsection