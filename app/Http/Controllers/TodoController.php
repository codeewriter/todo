<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todo.index', [
            'todos' => Todo::where('user_id', Auth::id())->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $validatedData['is_done'] = $request->is_done;
        $validatedData['user_id'] = Auth::user()->id;
        Todo::create($validatedData);
        return redirect('/todo')->with('success', "Your list has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $validatedData['is_done'] = $request->is_done;
        $todo->update($validatedData);
        return redirect('/todo')->with('success', "Your list has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        Todo::destroy($todo->id);
        return redirect('/todo')->with('success', "Your list has been deleted!");
    }
}
