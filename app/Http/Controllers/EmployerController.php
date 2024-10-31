<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEmployerRequest;
use App\Models\Employer;
use App\Models\Departement;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function create() {
        $departements = Departement::all();
        return view("employers.create", compact('departements'));
    }

    public function index() {
        
        $employers = Employer::paginate(10);
        return view("employers.index", compact("employers"));
    }

    public function edit(Employer $employer) {
        return view("employers.edit", compact("employer"));
    }

    public function store(StoreEmployerRequest $request) {
        $employer = Employer::create($request->all());

        if ($employer) {
            return redirect()->route("employer.index")->with("success_message", "Employer ajouté avec succès");
        } else {
            return redirect()->route("employer.index")->with("error_message", "Erreur lors de l'ajout de l'employer");
        }
    }
}
