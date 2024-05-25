<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contrat;
use App\Models\Demande;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:article-list|article-create|article-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:article-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:article-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrats = Contrat::orderBy('nom')->get();
        $demandes = Demande::orderBy('date_demande', 'desc')->get();
        return view('articles.create', compact('contrats', 'demandes'));
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
            article::create($request->all());
            return redirect()->route('articles.index')->with('success', 'article ajouté avec succée!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la création de l\'article : ' . $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $contrats = Contrat::orderBy('nom')->get();
        $demandes = Demande::orderBy('date_demande', 'desc')->get();
        return view('articles.edit', compact('article', 'contrats', 'demandes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->update($request->all());
            return redirect()->route('articles.index')->with('success', 'l\'article a été mise a jour avec succée');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Une erreur est survenue lors de la mise à jour de l\'article : ' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $article = Article::findOrFail($id);
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'article ajouté avec succée');
        }catch(\Exception $e){
            return redirect()->back()->withErrors('erreur de suppression de l\'article '.$e);
        }
    }
}

