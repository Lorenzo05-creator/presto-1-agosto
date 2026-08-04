<?php

namespace App\Http\Controllers;
use App\Models\Article;

class PublicController extends Controller
{
 public function home()
{
    $articles = Article::accepted()
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

    return view('welcome', compact('articles'));
}

}
