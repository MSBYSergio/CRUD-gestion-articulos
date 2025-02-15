<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('id')->paginate(4);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(null, $request->description));
        Tag::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('tags.index')->with('mensaje', "Tag insertada correctamente.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.update', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate($this->rules($tag->id, $request->description));
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('mensaje', "Tag editado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('mensaje', "Tag eliminado correctamente.");
    }

    private function rules(?int $id = null, ?string $description)
    {
        /* Lo he hecho de esta forma porque he querido que si el usuario pone algo en la descripción 
           tenga unas validaciones sino pone nada, pues que sea nulo */

        return [
            'name' => ['required', 'string', 'max:15', 'unique:tags,name,' . $id],
            'description' => is_null($description) ? ['nullable'] : ['required', 'string', 'min:8', 'max:150'],
        ];
    }
}
