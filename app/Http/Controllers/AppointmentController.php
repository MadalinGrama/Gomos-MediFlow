<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'message' => 'nullable|max:500',
            'appointment_date' => 'required'
        ]);

        Appointment::create($validatedData);

        return redirect()->route('homeurl')
                         ->with('success', 'Appointment created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            return view('admin.appointments.show', compact('appointment'));
        } catch (ModelNotFoundException $e) {
            // Mesajul nu a fost găsit în baza de date
            return redirect()->route('admin.appointments.index')->with('error', 'Appointment not found.');
        } catch (\Exception $e) {
            // Alte erori neașteptate
            return redirect()->route('admin.appointments.index')->with('error', 'An unexpected error occurred.');
        }
        return view('admin.appointments.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
    
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
