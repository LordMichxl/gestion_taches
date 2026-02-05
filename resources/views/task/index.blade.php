@extends('layouts')

@section('content')
<div class="container mt-5">
    <h2>Liste des mes tâches</h2>
    <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Ajouter une tâche</a>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Accéder au dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" name="complete" onChange="this.form.submit()" {{ $task->complete ? 'checked' : '' }}>
                    {{ $task->titre }}
                </form>
                <p>{{ $task->description }}</p>
                <div class="float-right">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info btn-sm">Modifier</a>

                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirmer la suppression de cette tâche ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection