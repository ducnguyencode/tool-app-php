<?php

use Illuminate\Support\Facades\Route;
class Task{ // viết hoa
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public ?string $long_description,  //Dấu chấm hỏi là optional
        public bool $completed)
    {

    }
}

$tasks = [
    new Task(1, 'Uống đủ nước', '2.5 lít một ngày', null, false), // Tạo Object với model là Task
    new Task(2, 'Đi ngủ sớm', 'Ngủ trước 23h', null, true),
    new Task(3, 'Làm bài tập', 'Làm bài tập về nhà PHP', null, false),
    new Task(4, 'Học từ vựng tiếng anh', 'Học 100 từ mỗi tuần', null, true),
];

Route::get('/', function() use ($tasks) {
    return view('index', ['tasks'=>$tasks]);
});

Route::get('/tasks/{id}', function($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id',$id); //Lay task dau co id trung voi id truyen vao
    if(!$task){
        return redirect(404);
    }
    return view('detail',['task'=>$task]);
})->name('tasks.detail');

Route::fallback(function (){
    return "Không tìm thấy trang";
});

// Route::get('/about', function(){
//     return view('index',['name' => 'About']);
// });