@extends('layouts.app')
@section('title', 'To Do App')
@section('content')
    <div class="mb-4">
    <a class="font-medium text-blue-700 underline decoration-blue-500" href="{{ route('tasks.create')}}">+ Create Task</a>
    </div>
    <table class="table-fixed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            {{-- <th>Description</th>
            <th>Long Description</th> --}}
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            @if (count($tasks)>0)
                @foreach ($tasks as $task )
                <tr>
                <!--Phan tu cua 1 list -->
                    <td>{{$task->id}}</td>
                    <td>{{$task->title}}</td>
                    {{-- <td>{{$task->description}}</td>
                    <td>{{$task->long_description}}</td> --}}
                    <td>{{$task->completed==true?"Completed":"Uncompleted"}}</td>
                    <td>
                    <form action="{{route('tasks.toggle-completed', ['id'=>$task->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{$task->completed!=true?'Completed':'Uncompleted'}}</button>
                    </form>
                    <a href="{{route('tasks.detail',['id'=>$task->id])}}">Detail</a>
                    <a href="{{route('tasks.edit',['id'=>$task->id])}}">Edit</a>
                    <form action="{{route('tasks.delete',['id'=>$task->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No task found</td>
                </tr>
            @endif
            </tbody>
    </table>
    @if ($tasks->count())
    <nav class="mt-4">{{$tasks->links()}}</nav>
    @endif
@endsection
