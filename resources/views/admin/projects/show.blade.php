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
    <div>
        <h5>Technologies: </h5>
        @forelse ($project->technologies as $technology)
            <span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
        @empty
            <span>Nessuna tecnologia presente</span>
        @endforelse

    </div>
    <p class="mt-4">{{ $project->description }}</p>
@endsection