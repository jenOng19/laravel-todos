<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() 
    {
        //fetch all todos from database and display them in the todos.index page

        //return index file in todos folder
        return view('todos.index');
    }
}
