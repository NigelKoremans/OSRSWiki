<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Revision;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(string $subject){
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        return view("article")->with([
            'article' => $article,
            'latestRevision' => $latestRevision
        ]);
    }
}
