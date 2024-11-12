<?php

use App\Events\TaskCreated;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tarefas', function () {
    return view('tasks');
})->name('tasks');

Route::post('/tarefa', function (Request $request) {
    $name = $request->input('task');

    try {
        $task = Task::create(['title' => $name]);
        TaskCreated::dispatch($task);
        return redirect()->route('tasks');
    } catch (Exception $e) {
        logger('Error creating task ' . $e->getMessage());
    }
})->name('tasks.store');
