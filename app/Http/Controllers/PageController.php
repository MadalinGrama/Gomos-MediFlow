<?php

namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\MenuItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Spatie\Activitylog\Models\Activity;

class PageController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('Metoda index a fost apelată.'); 
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'template' => 'required',
        ]);

        $slug = $request->input('slug') ?? Str::slug($request->input('title'));

        try {
            $page = new Page([
                'title' => $request->input('title'),
                'name' => $request->input('name'),
                'slug' => $slug,
                'meta_title' => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
                'content' => $request->input('content'),
                'template' => $request->input('template'),
            ]);

            $page->save();

            return redirect('/admin/pages')->with('success', 'Pagina a fost creată cu succes!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                // Dacă există duplicat de cheie unică, adăugăm eroarea în sesiune
                return redirect('/admin/pages/create')
                    ->withErrors(['slug' => 'The slug must be unique. Please choose another slug. If left blank, it will be automatically generated based on the title'])
                    ->withInput();
            }

            // Dacă nu este o eroare de cheie unică, aruncăm excepția mai departe
            throw $e;
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $menuItems = MenuItem::with('children')->whereNull('parent_id')->get();
        // Verifică dacă template-ul există
        if (view()->exists('templates.' . $page->template)) {
            return view('templates.' . $page->template, compact('page', 'menuItems'));
        } else {
            // Dacă nu există, utilizează un șablon implicit sau returnează o eroare, după caz
            return view('frontend.onlycontent', compact('page', 'menuItems'));
        }
    }

    public function showHome($slug = null)
    {
        // Verificați dacă slug-ul este gol sau '/'
        if ($slug === null || $slug === '/') {
            $page = Page::where('slug', '/')->firstOrFail();
    
            // Verifică dacă template-ul există
            if (view()->exists('templates.' . $page->template)) {
                return view('templates.' . $page->template, compact('page'));
            } else {
                // Dacă nu există, utilizează un șablon implicit sau returnează o eroare, după caz
                return view('frontend.onlycontent', compact('page'));
            }
        } else {
            // Încărcare normală pentru paginile non-home
            return $this->show($slug);
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'template' => 'required',
        ]);

        try {
            $page->title = $request->input('title');
            $page->name = $request->input('name');
            $page->slug = $request->input('slug') ?? Str::slug($request->input('title'));
            $page->meta_title = $request->input('meta_title');
            $page->meta_description = $request->input('meta_description');
            $page->meta_keywords = $request->input('meta_keywords');
            $page->content = $request->input('content');
            $page->template = $request->input('template');

            $page->save();

            return redirect('/admin/pages')->with('success', 'The page has been updated successfully!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                // Dacă există duplicat de cheie unică, adăugăm eroarea în sesiune
                return redirect()->back()
                    ->withErrors(['slug' => 'The slug must be unique. Please choose another slug. If left blank, it will be automatically generated based on the title'])
                    ->withInput();
            }

            // Dacă nu este o eroare de cheie unică, aruncăm excepția mai departe
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();

            return redirect('/admin/pages')->with('success', 'The page has been successfully deleted!');
        } catch (\Exception $e) {
            return redirect('/admin/pages')->with('error', 'An error occurred while deleting the page.');
        }
    }
}
