<?php

namespace App\Http\Controllers;

//use Model to communicate with db
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() 
    {
        //fetch all todos from database and display them in the todos.index page
        //all() is a static function
        //this will fetch all db records in the Todos table(from the migration file that creates todos)
        //laravel knows that Todo + s is going to give you the table that this model is going to communicate with
        $todos = Todo::all();

        //return index file in todos folder
        //in order for the view to have access to $todos, use method with that takes in the key, value/data
        return view('todos.index')->with('todos', $todos);
    }

    //argument $todoId is the specific todo that gets passed in the route
    public function show($todoId)
    {
        $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
        //dd(die dump) kills application and dump contents of variable, it is a laravel thing
        //this is short form for php's die(var_dump($todoId))
        // dd($todoId);
    }
}
