<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Movie;
use App\Models\Room;



class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Sale::count();
        $totalMovies = Movie::count();
        $totalRooms = Room::count();
        $cheapestMovie = Movie::orderBy('price', 'asc')->first();

        return view('dashboard', compact('totalSales', 'totalMovies', 'totalRooms', 'cheapestMovie'));
    }
}