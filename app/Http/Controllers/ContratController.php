<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ContratController extends Controller
{

    public function __construct(){
        $this->middleware('permission:contrat-list|contrat-create|contrat-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:contrat-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contrat-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contrat-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrats = contrat::paginate(10);
        return view('contrats.index', compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::orderBy('nom')->get();
        return view('contrats.create', compact('fournisseurs'));
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
            contrat::create($request->all());
            return redirect()->route('contrats.index')->with('success', 'contrat crée avec succée');
        } catch (\Exception $e) {
            return back()->withError('Une erreur est survenue lors de la création du contrat : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrat = Contrat::findOrFail($id);
        return view('contrats.show', compact('contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrat = Contrat::findOrFail($id);
        $fournisseurs = Fournisseur::orderBy('nom')->get();
        return view('contrats.edit', compact('contrat', 'fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $contrat = Contrat::findOrFail($id);
            $contrat->update($request->all());
            return redirect()->route('contrats.index')->with('success', 'contrat a été mise a jour avec succée!');
        } catch (\Exception $e) {
            return back()->withError('Une erreur est survenue lors de la mise à jour de l\'contrat : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $contrat = Contrat::findOrFail($id);
            $contrat->delete();
            return redirect()->route('contrats.index')->with('success', 'Contrat deleted successfully!');
        }catch(\Exception $e){
            return redirect()->back()->withErrors('Failed to delete contrat : '. $e);
        }
        
    }
}
