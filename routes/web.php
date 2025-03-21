<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    $tasks= Task::latest('id')->get();
    return view('index',['tasks'=>$tasks]);
})->name('tasks.index');

Route::get('tasks/create', function(){
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function($id) {
    $task = Task::findOrFail($id);
    return view('detail',['task'=>$task]);
})->name('tasks.detail');

Route::post('tasks/', function(Request $request){
    // dd($request->all());
    $data = $request->validate([
        'title'=>'required|max:255',
        'description'=>'required|min:3|max:255',
        'long_description'=>'required|min:3|max:255',
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = false; //set default value = false
    $task->save();
    return redirect()->route('tasks.index');
})->name('tasks.create');

// Route::get('/about', function(){
//     return view('index',['name' => 'About']);
// });