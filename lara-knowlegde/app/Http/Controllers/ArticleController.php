<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index()
    {
        // On récupère tous les articles , du plus récent au plus vieux.
        $articles = Article::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
        // $data = $request->all();
        // dd($data);
        $data = $request->safe()->except(['image']);

        //Gestion de l'image si présente
        
        if($request->hasFile('image')) {
            //1-Supprimer l'ancienne image si elle existe
             if($request->user()->avatar){
                Storage::disk('public')->delete($request->user()->getOriginal('image_path'));
            }
            //Stocke dans storage/app/public/articles
            $path = $request->file('image')->store('articles', 'public');
            //Ajoute le chemin de l'image aux données sauvegardées
            $data['image_path'] = $path;
        }
        //3-Création de l'article via la relation 
        //Cela remplit automatiquement le user_id avec l'id de l'utilisateur connecté
        $article = $request->user()->articles()->create($data);
        return redirect()->route('articles.index')->with('success', "L'article a bien été ajouté");

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
