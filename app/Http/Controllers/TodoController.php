<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return TodoResource::collection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TodoResource
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validateCreateRequest($request);

        // Create Todo
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->completed = $request->completed ?? false;
        $todo->save();

        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TodoResource
     */
    public function show($id)
    {
        return new TodoResource(Todo::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TodoResource
     */
    public function update(Request $request, $id)
    {
        // Validate data
        $this->validateUpdateRequest($request);

        // Update Todo object
        $todo = Todo::find($id);
        if (!empty($request->name)) {
            $todo->name = $request->name;
        }
        if (!empty($request->description)) {
            $todo->description = $request->description;
        }

        if (isset($request->completed)) {
            $todo->completed = $request->completed;
        }
        $todo->save();
        $newTodo = Todo::find($id);

        return new TodoResource($newTodo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }

    private function validateCreateRequest(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'string|nullable',
            'completed' => 'boolean',
        ]);
    }

    private function validateUpdateRequest(Request $request) {
        $request->validate([
            'description' => 'string|nullable',
            'completed' => 'boolean',
        ]);
    }
}
