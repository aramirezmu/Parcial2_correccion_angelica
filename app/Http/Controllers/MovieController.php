<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies= Movie::all(); #coge todos los registros (Select * from movie)
        return view('movies.index',compact('movies')); #manda los registros a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create'); //retorna la vista de creación de registros
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $movie = new Movie(); #crea un nuevo objeto de la clase Movie
        $movie->title = $request->title; #asigna el valor del campo title del formulario al campo title de la tabla
        $movie->age_restriction = $request->age_restriction; #asigna el valor del campo age_restriction del formulario al campo age_restriction de la tabla
        $movie->duration_minutes = $request->duration_minutes; #asigna el valor del campo duration_minutes del formulario al campo duration_minutes de la tabla
        $movie->price = $request->price; #asigna el valor del campo price del formulario al campo price de la tabla
        $movie->save(); #guarda el registro en la tabla
        return redirect()->route('movies.index'); #redirecciona a la vista de index
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $Movie)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie= Movie::find($id); 
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //coge los datos del edit para renovar un registro en la tabla, guarda los cambios y me regresa al index
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->age_restriction = $request->age_restriction;
        $movie->duration_minutes = $request->duration_minutes;
        $movie->price = $request->price;
        $movie->save();
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
