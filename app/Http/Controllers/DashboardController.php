<?php

namespace App\Http\Controllers;

use App\Models\Interes;
use App\Models\Persona;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalPersonas = Persona::count();
        $totalIntereses = Interes::count();
        $totalUsuarios = User::count();

        return view('dashboard', compact(
            'totalPersonas',
            'totalIntereses',
            'totalUsuarios'
        ));
    }
}
