<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Afișează meniul
    public function index()
    {
        $menuItems = MenuItem::with('children')->whereNull('parent_id')->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    // Afișează formularul pentru adăugarea unui element în meniu
    public function create()
    {
        // Obțineți toate elementele de meniu pentru a fi afișate în dropdown
        $parentMenuItems = MenuItem::pluck('title', 'id')->toArray();

        // Adăugați opțiunea pentru a lăsa gol, semnificând că este un element părinte
        $parentMenuItems = ['' => 'Choose...'] + $parentMenuItems;

        return view('admin.menu.create', compact('parentMenuItems'));
    }


    // Procesează formularul și adaugă un element în meniu
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        // Verificam daca parent_id a fost transmis si, daca da, setam valoarea corespunzatoare
        if ($request->has('parent_id')) {
            // Daca a fost selectat un parinte din meniu, setam parent_id-ul noului item cu valoarea selectata
            $validatedData['parent_id'] = $request->input('parent_id');
        } else {
            // Daca nu a fost selectat niciun parinte, setam parent_id-ul la null
            $validatedData['parent_id'] = null;
        }
        // dd($validatedData);
        MenuItem::create($validatedData);

        return redirect()->route('admin.menu.index')->with('success', 'Elementul de meniu a fost adăugat cu succes!');
    }

    public function edit(MenuItem $menuItem)
    {
        $parentMenuItems = MenuItem::pluck('title', 'id')->toArray();
        $parentMenuItems = ['' => 'Choose...'] + $parentMenuItems;
        
        return view('admin.menu.edit', compact('menuItem', 'parentMenuItems'));
    }
    

    // Actualizează elementul de meniu existent
    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
        ]);

        $menuItem->update($request->all());

        return redirect()->route('admin.menu.index')->with('success', 'Elementul de meniu a fost actualizat cu succes!');
    }

    // Șterge un element de meniu
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Elementul de meniu a fost șters cu succes!');
    }
}
