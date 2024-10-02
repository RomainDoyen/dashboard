<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;

class AppController extends Controller
{
    public function index() {
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdmins = User::all()->count();
        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdmins'));
    }
}
