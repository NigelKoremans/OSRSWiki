<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisionController;
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

Route::get('/wiki/{subject}/edit', [ArticleController::class, "edit"])->name("article.edit");
Route::put('/wiki/{subject}', [ArticleController::class, "update"])->name("article.update");
