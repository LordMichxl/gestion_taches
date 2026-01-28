<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
        public function index(){

    $tasks = Task::all();
    return view('task.index', compact('tasks'));

    }
    //Afficher le formulaire de creation

    public function create(){
        return view('task.create');
    } 

    public function store(Request $request){
        $request->validate([
            'titre'=> 'required|max:255',
            'description'=>'nullable'
        ]);

        Task::create([
            'titre'=> $request ->titre,
            'description'=>$request ->description,
            'complete' =>false,
        ]);
        return redirect()->route('task.index')->with('success', 'Tâche créée avec succès');
    } 

    public function edit(Task $task){
        return view('task.edit', compact('task'));
    }

        public function update(Request $request, task $task){
        $request->validate([
            'titre'=> 'required|max:255',
            'description'=>'nullable'
        ]);

        $task->update([
            'titre'=> $request ->titre,
            'description'=>$request ->description,
            'complete' =>$request->has('complete'),
        ]);
        return redirect()->route('task.index')->with('success', 'Tâche mise à jour avec succès');
    } 

    public function destroy(Task $task){
        $task -> delete();
        return redirect()->route('task.index')->with('success', 'Tâche supprimée avec succès');
    }
}
