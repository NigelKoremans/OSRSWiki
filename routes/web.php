<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $popularArticles = Article::orderBy("views", "DESC")->limit(6)->get();
    return view('home')->with("popularArticles", $popularArticles);
})->name("home");

Route::get('/test', function () {
    return view('test');
})->name("test");

Route::get('/wiki/{subject}', [ArticleController::class, "show"]);
