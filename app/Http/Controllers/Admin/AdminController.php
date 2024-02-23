<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function __construct()
    {
        // Aplică middleware-ul 'admin' pentru toate metodele din acest controler
        $this->middleware('admin');
    }

    public function index()
    {
        $messages = Contact::latest()->take(4)->get();
        $activities = Activity::latest()->take(4)->get();
        $appointments = Appointment::latest()->take(4)->get();
        // Calculează diferența de timp pentru fiecare mesaj
        foreach ($messages as $message) {
            $message->time_diff = Carbon::parse($message->created_at)->diffForHumans();
        }

        return view('admin.dashboard', compact('messages', 'activities', 'appointments'));
    }

    
}
