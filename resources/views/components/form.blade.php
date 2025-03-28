@extends('layouts.app')
@section('title', 'Create Task')
@section('style')
    .alert-danger {
        color:red;
    }
@endsection
<!-- -->
@section('title', isset($task)?'Update Task':'Create Task')
@section('content')

    <form action="{{isset($task)? route('tasks.update',['id'=>$task->id]):route('tasks.store')}}" method="POST">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{old('title', $task->title??'')}}">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{old('description', $task->description??'')}}">
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="long_description">Long Description</label>
        <input type="text" name="long_description" id="long_description" value="{{old('long_description', $task->long_description??'')}}">
        @error('long_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">{{isset($task)?'Update':'Create'}}</button>
    </form>
@endsection
