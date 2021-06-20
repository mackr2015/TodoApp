<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller {
    // Display todos
    public function index(){
        $todos =  Todo::get();

        return view('index', [
            'todos' => $todos
        ]);
    }

    public function saveTodo(Request $request){
        $this->validate($request, [
            'title' =>  'required'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;

        $todo->save();
        // Return to the requested uri
        return back();
    }


    public function deleteTodo(Todo $todo) {
        $todo->delete();

        return back();
    }
}
