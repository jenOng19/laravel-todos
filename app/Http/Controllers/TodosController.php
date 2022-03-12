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
    // -Todo $todo replaces the logic $todo = Todo::find($todoId);

    //receive parameter $todo of type Todo, this detects that the route has a dynamic property {todo}
    public function show(Todo $todo)
    {
        // $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
        //dd(die dump) kills application and dump contents of variable, it is a laravel thing
        //this is short form for php's die(var_dump($todoId))
        // dd($todoId);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        //input fields must have name attr to get value

        //request()->all() will show you everything the client input in the form
        // dd(request()->all());

        //validate data from form to make sure there are values before saving
        //validate function comes from Controller that we extend from
        //if you check Controller.php you'll see ValidateRequests
        //validate() takes in an instance of the data we want to validate
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        //new Todo model
        $todo = new Todo();

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->completed = false;

        //make db query to save todo to db
        $todo->save();

        //after saving, redirect user to todos page
        return redirect('/todos');

    }

    public function edit(Todo $todo)
    {
        // $todo = Todo::find($todoId);

        //return the edit page with the todo that was found
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        //Two Ways:
        //1. create hidden input in view file that gets the id and that will be passed to server
        //2. change route to get id from url

        // $todo = Todo::find($todoId);

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->save();

        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
        // $todo = Todo::find($todoId);

        $todo->delete();

        return redirect('/todos');
    }
}
