<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();

        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'text' => 'required|max:255',
            'body' => 'required'
        ));

        $todo = new Todo();
        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');
        
        $todo->save();

        return redirect()->route('todo.index')->with('success', 'Todo Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'text' => 'required|max:255',
            'body' => 'required'
        ));

        $todo = Todo::find($id);

        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');
        
        $todo->save();

        return redirect()->route('todo.show', $todo->id)->with('success', 'Todo Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'Todo Deleted');
    }
}
