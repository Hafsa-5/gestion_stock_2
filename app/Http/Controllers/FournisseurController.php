<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{

    public function __construct(){
        $this->middleware('permission:fournisseur-list|fournisseur-create|fournisseur-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:fournisseur-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:fournisseur-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:fournisseur-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = fournisseur::paginate(10);
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            fournisseur::create($request->all());
            return redirect()->route('fournisseurs.index')->with('success', 'fournisseur ajouté avec succée');
        } catch (\Exception $e) {
            return back()->withErrors('Une erreur est survenue lors de la création de l\'fournisseur : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.show', compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $fournisseur = Fournisseur::findOrFail($id);
            $fournisseur->update($request->all());
            return redirect()->route('fournisseurs.index');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Une erreur est survenue lors de la mise à jour du fournisseur : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $fournisseur = Fournisseur::findOrFail($id);
            $fournisseur->delete();
            return redirect()->route('fournisseurs.index')->with('success', 'fournisseur deleted successfully');

        }catch(\Exception $e){
            return redirect()->back()->withErrors('Failed to delete fournisseur : '. $e);
        }
    }
}
