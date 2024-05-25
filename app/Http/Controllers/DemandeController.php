<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Demande;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemandeController extends Controller
{

    public function __construct(){
        $this->middleware('permission:demande-list|demande-create|demande-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:demande-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:demande-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:demande-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = demande::paginate(10);
        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuts = ['en_attente', 'en_cours', 'terminee'];
        $agents = Agent::orderBy('nom')->get();
        return view('demandes.create', compact('statuts', 'agents'));
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
            demande::create($request->all());
            return redirect()->route('demandes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la création de l\'demande : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demande = Demande::findOrFail($id);
        $agents = Agent::orderBy('nom')->get();
        $statuts = ['en_attente', 'en_cours', 'terminee'];
        $date_demande_formattee = Carbon::parse($demande->date_demande)->format('Y-m-d');
        return view('demandes.edit', compact('demande', 'statuts', 'agents', 'date_demande_formattee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $demande = Demande::findOrFail($id);
            $demande->update($request->all());
            return redirect()->route('demandes.index')->with('success', 'Demande updated successfully');;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour de l\'demande : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            // Delete the Compte
            $demande = Demande::findOrFail($id);
            $demande->delete();

            return redirect()->route('demandes.index')->with('success', 'Demande deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete Demande : '. $e);
        }
    }
}
