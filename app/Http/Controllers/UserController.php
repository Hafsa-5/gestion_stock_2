<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\StatutUtilisateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNotIn('id', [Auth::user()->id])->paginate(10);
        return view('utilisateurs.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('utilisateurs.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            //$input['statut_utilisateur_id'] = StatutUtilisateur::where(['nom'=>'Actif'])->first()->id;

            $user = User::create($input);
            $user->assignRole($request->input('role_id'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('utilisateurs.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name')->get();
        $role_id = Role::where('name', $user->getRoleNames()->first())->first()->id;
        return view('utilisateurs.edit', compact('user', 'role_id', 'roles' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try{
            $input = $request->all();
            if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input, array('password'));
            }

            $user = User::findOrFail($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('role_id'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succée');
    }
}
