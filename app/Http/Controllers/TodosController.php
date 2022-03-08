<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() 
    {
        //return index file in todos folder
        return view('todos.index');
    }
}
