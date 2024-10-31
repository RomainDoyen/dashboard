<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
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

        $employers = Employer::with('departement')->paginate(10);
        return view("employers.index", compact("employers"));
    }

    public function edit(Employer $employer) {
        $departements = Departement::all();
        return view("employers.edit", compact("employer", "departements"));
    }

    public function store(StoreEmployerRequest $request) {
        $employer = Employer::create($request->all());

        if ($employer) {
            return redirect()->route("employer.index")->with("success_message", "Employer ajouté avec succès");
        } else {
            return redirect()->route("employer.index")->with("error_message", "Erreur lors de l'ajout de l'employer");
        }
    }

    public function update(UpdateEmployerRequest $request, Employer $employer) {
        
        $employer->name = $request->name;
        $employer->prenom = $request->prenom;
        $employer->email = $request->email;
        $employer->contact = $request->contact;
        $employer->departement_id = $request->departement_id;
        $employer->montant_journalier = $request->montant_journalier;

        $employer->update();

        if ($employer) {
            return redirect()->route("employer.index")->with("success_message", "Employé modifié avec succès");
        } else {
            return redirect()->route("employer.index")->with("error_message", "Erreur lors de la modification de l'employé");
        }
    }

    public function delete(Employer $employer) {
        try {
            $employer->delete();
            return redirect()->route("employer.index")->with("success_message", "Employé supprimé avec succès");
        } catch (\Exception $e) {
            return redirect()->route("employer.index")->with("error_message", "Erreur lors de la suppression de l'employé");
        }
    }
}
