@extends('layouts.Front_end_layout')

@section('title','-add')

@section('content')
<div class="col-lg-5 mx-auto">
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <div class="card">
        <div class="card-header bg-dark text-white text-center fs-5">Edit todo</div>
        <div class="card-body">
            <form action="{{ route('todo.update', $todo->id) }}" method="post">
                @csrf
                @method('patch')
                <input value="{{ $todo->title }}" name="title" type="text" class="form-control my-2" placeholder="Todo title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea name="details" id="" class="form-control my-2" placeholder="Todo details" >{{ $todo->details }}</textarea>
                <input value="{{ $todo->author }}" name="author" type="text" placeholder="Author" class="form-control"> 
                @error('author')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
                <button class="btn btn-dark w-100 mt-2">update Todo </button>
            </form>
        </div>
    </div>
</div>
@endsection