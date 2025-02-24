<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Room;
use App\Models\Movie;
use Illuminate\Http\Request;
//PARA LOS CRUDESDE LAS TABLAS INTERMEDIAS CAMBIA EL INDEX Y EL EDIT
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms= Room::all(); #coge todos los registros (Select * from rooms)
        $movies= Movie::all(); #coge todos los registros (Select * from movies)
        $sales= Sale::all(); #coge todos los registros (Select * from sales)
        return view('sales.index',compact('sales','rooms','movies')); #manda los registros a la vista
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
        $sales = new Sale(); #crea un nuevo objeto de la clase Sales
        $sales->movie_id = $request->movie_id; #asigna el valor del campo movie_id del formulario al campo movie_id de la tabla
        $sales->room_id = $request->room_id; #asigna el valor del campo room_id del formulario al campo room_id de la tabla
        $sales->number_of_tickets = $request->number_of_tickets; #asigna el valor del campo number_of_tickets del formulario al campo number_of_tickets de la tabla
        $sales->save(); #guarda el registro en la tabla
        return redirect()->route('sales.index'); #redirecciona a la vista de index
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms= Room::all(); #coge todos los registros (Select * from rooms)
        $movies= Movie::all(); #coge todos los registros (Select * from movies)
        $sale= Sale::find($id); 
        return view('sales.edit',compact('sale','rooms','movies')); #manda los registros a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sale= Sale::find($id);
        $sale->movie_id = $request->movie_id; #asigna el valor del campo movie_id del formulario al campo movie_id de la tabla
        $sale->room_id = $request->room_id; #asigna el valor del campo room_id del formulario al campo room_id de la tabla
        $sale->number_of_tickets = $request->number_of_tickets; #asigna el valor del campo number_of_tickets del formulario al campo number_of_tickets de la tabla
        $sale->save(); #guarda el registro en la tabla

        return redirect()->route('sales.index'); #redirecciona a la vista de index


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale= Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index');

    }
}
