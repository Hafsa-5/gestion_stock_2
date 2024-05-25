<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Compte;
use App\Models\Entite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CompteController extends Controller
{

    public function __construct(){
        $this->middleware('permission:agent-list|agent-create|agent-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:agent-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:agent-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:agent-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptes = Compte::whereNotIn('id', [Auth::user()->id])->paginate(10);
        return view('comptes.index', compact('comptes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $entites = Entite::all();
        return view('comptes.create', compact('roles', 'entites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate incoming request data
        $validatedData = $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'adresse' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'entite_id' => ['required', 'integer'],
            'username' => ['required', 'string', 'unique:comptes'],
            'email' => ['required', 'string', 'unique:comptes'],
            'password' => ['required', 'string', 'min:6'],
            'role_id' => ['required'],
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create the Agent
            $agent = Agent::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'adresse' => $validatedData['adresse'],
                'phone' => $validatedData['phone'],
                'entite_id' => $validatedData['entite_id'],
            ]);

            // Create the Compte
            $compte = Compte::create([
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'agent_id' => $agent->id,
            ]);

            $role = Role::query()->where('id', $validatedData['role_id'])->first();
            $compte->assignRole($role);

            DB::commit();

            return redirect()->route('comptes.index')->with('success', 'Agent créer avec succée');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Une erreur est survenue lors de la création de l\'agent : ' . $e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compte = Compte::with('agent')->find($id);
        return view('comptes.show', compact('compte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $compte = Compte::with('agent')->find($id);
        $entites = Entite::all();
        $role_id = Role::where('name', $compte->getRoleNames()->first())->first()->id;
        return view('comptes.edit', compact('roles', 'entites', 'compte', 'role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compte = Compte::with('agent')->find($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'adresse' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'entite_id' => ['required', 'integer'],
            'username' => ['required', 'string', Rule::unique('comptes')->ignore($compte->id)],
            'email' => ['required', 'string', Rule::unique('comptes')->ignore($compte->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'role_id' => ['required'],
        ]);

        //dd($validatedData);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Update the Agent
            $agent = Agent::findOrFail($compte->id);
            $agent->update([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'adresse' => $validatedData['adresse'],
                'phone' => $validatedData['phone'],
                'entite_id' => $validatedData['entite_id'],
            ]);

            //dd($agent);

            // Update the Compte
            $compte = Compte::where('agent_id', $compte->id)->firstOrFail();
            $compte->update([
                'email' => $validatedData['email'],
                'username' => $validatedData['username'],
                'password' => isset($validatedData['password']) ? bcrypt($validatedData['password']) : $compte->password,
            ]);

            $role = Role::query()->where('id', $validatedData['role_id'])->first();
            $compte->assignRole($role);

            //dd($compte);

            // Commit the transaction if both updates were successful
            DB::commit();

            return redirect()->route('comptes.index')->with('success', 'Agent and Compte updated successfully');

        } catch (\Exception $e) {
            // Rollback the transaction if any error occurs
            DB::rollback();
            return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour de l\'compte : ' . $e);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Delete the Compte
            $compte = Compte::with('agent')->find($id);
            $agent = $compte->agent;
            $compte->delete();

            // Delete the Agent
            //$agent = Agent::findOrFail($id);
            $agent->delete();

            // Commit the transaction if both deletions were successful
            DB::commit();

            return redirect()->route('comptes.index')->with('success', 'Agent and Compte deleted successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if any error occurs
            DB::rollback();
            return redirect()->back()->withErrors('Failed to delete Agent and Compte : '. $e);
        }
    }
}
