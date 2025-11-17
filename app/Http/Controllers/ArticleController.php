<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Revision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    public function show(string $subject)
    {
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        return view("article")->with([
            'article' => $article,
            'latestRevision' => $latestRevision
        ]);
    }

    public function edit(string $subject)
    {
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        return view("edit")->with([
            "revision" => $latestRevision,
            "article" => $article
        ]);
    }

    public function update(Request $request, string $subject) {
        $request->validate([
            'content' => "required|string|min:1",
            'summary' => "required|string|min:1"
        ]);

        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        $data = $request->all();

        if (e($data['content']) == $latestRevision->content) {
            return Redirect::back()
                ->withErrors(['content' => 'No changes detected - content must be different than last revision.'])
                ->withInput();
        }

        $revision = new Revision();
        $revision->content = e($data["content"]);
        $revision->summary = $data["summary"];
        $revision->edited_at = Carbon::now();
        $revision->edited_by = 1;
        $revision->article_id = $article->id;

        $revision->save();

        return redirect()->route('article.show', $subject);
    }
}
