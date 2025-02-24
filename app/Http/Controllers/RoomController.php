<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms= Room::all(); #coge todos los registros (Select * from room)
        return view('rooms.index',compact('rooms')); #manda los registros a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room(); #crea un nuevo objeto de la clase Room
        $room->room_name = $request->room_name; #asigna el valor del campo room_name del formulario al campo room_name de la tabla
        $room->capacity = $request->capacity; #asigna el valor del campo capacity del formulario al campo capacity de la tabla
        $room->save(); #guarda el registro en la tabla
        return redirect()->route('rooms.index'); #redirecciona a la vista de index
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room= Room::find($id); 
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $room->room_name = $request->room_name; #asigna el valor del campo room_name del formulario al campo room_name de la tabla
        $room->capacity = $request->capacity; #asigna el valor del campo capacity del formulario al campo capacity de la tabla
        $room->save(); #guarda el registro en la tabla
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
