@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo progetto</h2>

    @include('partials.errors')

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="type">Tipologia</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <h5>Seleziona le Tecnologie</h5>
            @foreach ($technologies as $technology)
            <div class="form-check">
                {{-- L'input dev'essere selezionato se l'id della tecnologia è contenuta nell'array old(['technologies']) --}}
                <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="tag-{{ $technology->id }}" @checked(in_array($technology->id, old('technologies', [])))>
                <label class="form-check-label" for="tag-{{ $technology->id }}">
                  {{ $technology->name }}
                </label>
            </div>
                
            @endforeach
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection
