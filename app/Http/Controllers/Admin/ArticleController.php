<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'subtitle' => Str::substr($request->subtitle, 0, 100),
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('articles', 'public');
            $data['file'] = $filePath;
        }

        Article::create($data);

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        $data = [
            'title' => $request->title,
            'subtitle' => Str::substr($request->subtitle, 0, 100),
            'description' => $request->description
        ];

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('annexes', 'public');

            try {
                if ($article->file)
                    unlink("storage/$article->file");
            } catch (\Throwable $th) {
                //throw $th;
            }

            $data['file'] = $filePath;
        }

        $article->update($data);

        return back()->withErrors([
            'success' => 'Opération effectuée avec succès !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        try {
            if ($article->file)
                unlink("storage/$article->file");
        } catch (\Throwable $th) {
            //throw $th;
        }

        $article->delete();
        return back();
    }
}
