@extends('layouts.Front_end_layout')

@section('title','-add')

@section('content')
<div class="col-lg-5 mx-auto">
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <div class="card">
        <div class="card-header bg-dark text-white text-center fs-5">Add todo</div>
        <div class="card-body">
            <form action="{{ route('todo.store') }}" method="post">
                @csrf
                <input value="{{ old('title') }}" name="title" type="text" class="form-control my-2" placeholder="Todo title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea name="details" id="" class="form-control my-2" placeholder="Todo details" >{{ old('details') }}</textarea>
                <input value="{{ old('details') }}" name="author" type="text" placeholder="Author" class="form-control"> 
                @error('author')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
                <button class="btn btn-dark w-100 mt-2">Add Todo</button>
            </form>
        </div>
    </div>
</div>
@endsection