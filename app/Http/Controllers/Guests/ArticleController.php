<?php

namespace App\Http\Controllers\Guests;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index():View
    {
        $articles = Article::orderByDesc('id')->take(8)->get();
        return view('articles.index', compact("articles"));
    }

    public function show(Article $article):View | RedirectResponse
    {
        $findArticle = Article::where('id', $article->id)->exists();

        $articles = Article::whereNot("id", "=", $article->id)->take(4)->get();

        if (!$findArticle) {
            abort(404);
        }

        return view('articles.show', compact("article", "articles"));
    }
}
