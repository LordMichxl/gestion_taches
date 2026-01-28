@extends('layouts')

@section('content')
<div class="container mt-5">
    <h2>Modifier la tâche</h2>
    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $task->titre }}" required>
        </div>
        <div class="form-group mt-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $task->description }}</textarea>
        </div>
        <div class="form-group mt-2">
            <input type="checkbox" name="complete" {{ $task->complete ? 'checked' : '' }}> Complété
        </div>
        <button type="submit" class="btn btn-success mt-2">Mettre à jour</button>
        <a href="{{ route('task.index') }}" class="btn btn-secondary mt-2">Retour</a>
    </form>
</div>
@endsection