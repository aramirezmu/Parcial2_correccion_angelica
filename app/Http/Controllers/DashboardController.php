<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Sale::count();
        $cheapestMovie = Movie::orderBy('price', 'asc')->first();

        return view('dashboard', compact('totalSales', 'cheapestMovie'));
    }
}