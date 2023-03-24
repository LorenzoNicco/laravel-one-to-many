@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Modifica Progetto</h1>

    @include('partials.error')

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title-input" class="form-label text-light">Titolo<span class="text-danger">*</span></label>
            <input required type="text" class="form-control" id="title-input" value="{{ old('title', $project->title) }}" name="title" placeholder="Inserisci un titolo">
        </div>
        
        <div class="mb-3">
            <label for="description-input" class="form-label text-light">Descrizione<span class="text-danger">*</span></label>
            <textarea required class="form-control" id="description-input" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image-input" class="form-label text-light">Immagine</label>

            @if ($project->img)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="delete-img" id="delete-img">
                    <label class="form-check-label text-light" for="delete-img">
                        Elimina immagine
                    </label>
                </div>

                <img src="{{ asset('storage/'.$project->img) }}" class="card-img-top mb-3" alt="immagine" style="height: 200px; width: 300px">
            @endif

            <input class="form-control" type="file" id="image-input" name="img" accept="image/*">
        </div>

        <div>
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection