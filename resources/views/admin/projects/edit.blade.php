@extends('layouts.admin')

@section('content')
    <h2>Modifica il progetto {{ $project->title }}</h2>

    @include('partials.errors')

    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>

        <div class="mb-3">
            <label for="type">Tipologia</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <h5>Tecnologie</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                  {{-- Al primo caricamento della pagina devo selezionare i checkbox che sono salvati nel DB, quindi ho una collection. Se c'è un errore al submit del bottone devo selezionare i checkbox selezionati dall'utente nella pagina precedente, quindi ho un array preso da old --}}
                    <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="tag-{{ $technology->id }}" 
                    @checked(old('technologies') ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology->id))>
                    <label class="form-check-label" for="tag-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection
