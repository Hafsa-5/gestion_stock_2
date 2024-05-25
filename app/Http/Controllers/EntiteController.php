<?php

namespace App\Http\Controllers;

use App\Models\Entite;
use Exception;
use Illuminate\Http\Request;

class EntiteController extends Controller
{

    public function __construct(){
        $this->middleware('permission:entite-list|entite-create|entite-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:entite-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:entite-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:entite-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entites = entite::paginate(10);
        return view('entites.index', compact('entites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entites.create');
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
            entite::create($request->all());
            return redirect()->route('entites.index');
        } catch (\Exception $e) {
            return back()->withError('Une erreur est survenue lors de la création de l\'entite : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entite = Entite::findOrFail($id);
        return view('entites.show', compact('entite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entite = Entite::findOrFail($id);
        return view('entites.edit', compact('entite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $entite = Entite::findOrFail($id);
            $entite->update($request->all());
            return redirect()->route('entites.index');
        } catch (\Exception $e) {
            return back()->withError('Une erreur est survenue lors de la mise à jour de l\'entite : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $entite = Entite::findOrFail($id);
            $entite->delete();
            return redirect()->route('entites.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression de l\'entité : ' . $e->getMessage());
        }
    }
}
