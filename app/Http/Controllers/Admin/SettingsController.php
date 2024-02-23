<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Aplică middleware-ul 'admin' pentru toate metodele din acest controler
        $this->middleware('admin');
    }
    
    public function index()
    {
        $settings = Settings::first(); // sau folosește metoda adecvată pentru a obține setările
        return view('admin.settings.index', compact('settings'));
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
        $settings = Settings::firstOrCreate(); // Creează setările dacă nu există deja
        $settings->page_title = $request->input('page_title');
        $settings->header_color = $request->input('header_color');
        $settings->footer_color = $request->input('footer_color');
        $settings->socials_links = json_decode($request->input('socials_links_json'), true);
        $settings->footer_links = $request->input('footer_links');        
        $settings->address = $request->input('address');
        $settings->email = $request->input('email');
        $settings->phone = $request->input('phone');
        
        if ($request->hasFile('home_banner')) {
            // Încarcă și salvează imaginea pentru home banner
            $imagePath = $request->file('home_banner')->store('public/banners');
            $settings->home_banner = $imagePath;
        }
    
        if ($request->hasFile('logo')) {
            // Încarcă și salvează imaginea pentru logo
            $imagePath = $request->file('logo')->store('public/logos');
            $settings->logo = $imagePath;
        }
    
        $settings->save();
    
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $settings = Settings::first(); // Obține setările existente
    
        // Actualizează valorile setărilor cu datele din formular
        $settings->update($request->all());
    
        // Redirecționează către pagina de setări cu un mesaj de succes sau orice altă acțiune
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
