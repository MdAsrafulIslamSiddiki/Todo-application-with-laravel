<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class Todo_Controller extends Controller
{
    function all_todos(){
        $todos = Todo::orderBy('is_complete', 'ASC')->latest()->paginate(5);
        // dd($todos);
        return view('all_todos',compact('todos'));
    }

    function store_todo(Request $request){
        $request->validate(
            [
                'title' => 'required|min:5',
                'author' => 'required'
            ],
            // if you can set your own error message then you need the next array
            // [
            //     'title.required' => 'title is missing',
            //     'author.required' => 'author is required..'
            // ]
        );

        // store data
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->details = $request->details;
        $todo->author = $request->author;
        $todo->save();

        return back()->with('msg', 'Todo insert successfull.');

    
    }

    function edit_todo($id){
        $todo = Todo::findOrFail($id);
        return view('edit_todo', compact('todo') );
    }


    function  update_todo(Request $request, $id){
        $request->validate(
            [
                'title' => 'required',
                'author' => 'required'
            ]
        );
        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->details = $request->details;
        $todo->author = $request->author;
        $todo->save();

        notify()->success('Your todo updated successfull!');
        if($todo){
            // return redirect()->route('todo.all');

            // this is new  way to redirect
            return to_route('todo.all');
        }   
    }

    function status_update($id){
        $todo = Todo::findOrFail($id);
        if(!$todo->is_complete){
            $todo->is_complete = true;
            notify()->success("Your ($todo->title) todo status updated successfull!");
            $todo-> save();
            
            return back(); 
        }
        else{
            notify()->warning("Your ($todo->title) todo is already completed!");
            return back();
        }
    }

    function delete_todo($id){
        $todo = Todo::findOrFail($id)->delete();
        notify()->success("Your todo deleted successfull!");
        if($todo){
            return back();
        }

    }
}
