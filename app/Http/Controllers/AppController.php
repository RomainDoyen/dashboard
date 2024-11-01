<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Employer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;

class AppController extends Controller
{
    public function index() {
        $totalDepartements = Departement::all()->count();
        $totalEmployers = Employer::all()->count();
        $totalAdmins = User::all()->count();

        $appName = Configuration::where("type", "APP_NAME")->first();

        $defaultPaymentDate = null;
        $paymentNotification = "";

        $currentDate = Carbon::now()->day;

        $defaultPaymentDateQuery = Configuration::where("type","PAYMENT_DATE")->first();

        if ($defaultPaymentDateQuery) {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertedPaymentDate = intval($defaultPaymentDate);

            if ($currentDate < $convertedPaymentDate) {
                $paymentNotification = "Le paiement doit avoir lieu le $convertedPaymentDate de ce mois";
            } else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format("F");
                $paymentNotification = "Le paiement doit avoir lieu le $convertedPaymentDate du mois de $nextMonthName";
            }
        }
        

        return view('dashboard', compact('totalDepartements', 'totalEmployers', 'totalAdmins', 'paymentNotification', 'appName'));
    }
}
