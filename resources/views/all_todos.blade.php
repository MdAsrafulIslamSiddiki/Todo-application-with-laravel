@extends('layouts.Front_end_layout')

@section('title','-all')

@section('content')
<div class="col-lg-8 mx-auto">
    
        <div class="card">
            <div class="card-header bg-dark text-white text-center fs-5">All todo</div>
            <div class="card-body">
                <table class="table table-responsive">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>User</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach($todos as $key => $todo)
                    <tr>
                        <td>{{ $todos->firstitem() +$key }}</td>
                        <td>
                            <p class="m-0">{{ $todo-> title }}</p>
                            <p class="m-0">{{ $todo-> created_at->diffForHumans() }}</p>
                        </td>
                        <td>{{ $todo-> details }}</td>
                        <td>{{ $todo-> author }}</td>
                        <td>
                            <a href="{{ route('todo.status_update', $todo->id) }}">
                                <span class="badge bg-{{ $todo->is_complete ? 'success' : 'warning text-dark' }}">{{ $todo-> is_complete ? 'complete' : 'pending' }}</span>
                            </a>
                        </td>
                        <td>
                            <div class="btn-group">
                                @if(!$todo->is_complete)
                                <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning ">Edit</a>
                                @endif
                                <a href="{{ route('todo.delete',  $todo->id) }}" class="btn btn-danger ">Delete</a>

                            </div>
                        </td>
                    </tr> 
                    @endforeach
                </table>

                <span>{{ $todos->links() }}</span>
            </div>
        </div>
    </div>
@endsection


