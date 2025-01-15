<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{
    public function showAlerts()
    {
        $alerts = Alert::latest()->take(5)->get(); 
        return view('alerts.index', compact('alerts'));
    }
    
}
