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

        $article->views++;
        $article->save();

        return view("articles.show")->with([
            'article' => $article,
            'latestRevision' => $latestRevision
        ]);
    }

    public function edit(string $subject)
    {
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        return view("articles.edit")->with([
            "revision" => $latestRevision,
            "subject" => $article->subject
        ]);
    }

    public function update(Request $request, string $subject)
    {
        if (!$request->user()) {
            return redirect()->route('login')->with('status', 'You must login to edit articles.');
        }

        $request->validate([
            'content' => "required|string|min:1|max:2000000000",
            'summary' => "required|string|min:1|max:255"
        ]);

        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $latestRevision = $article->revisions()->orderBy('edited_at', 'desc')->firstOrFail();

        $data = $request->all();

        if (e($data['content']) == $latestRevision->content) {
            return Redirect::back()
                ->withErrors(['content' => 'No changes detected — content is identical to the latest revision.'])
                ->withInput();
        }

        $revision = new Revision();
        $revision->content = e($data["content"]);
        $revision->summary = $data["summary"];
        $revision->edited_at = Carbon::now();
        $revision->edited_by = $request->user()->id;
        $revision->article_id = $article->id;

        $revision->save();

        return redirect()->route('article.show', $subject);
    }

    public function create()
    {
        return view("articles.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => "required|string|min:1|max:255",
            'content' => "required|string|min:1|max:2000000000"
        ]);

        if (Article::where('subject', '=', $request['subject'])->exists()) {
            return Redirect::back()
                ->withErrors(['subject' => 'Article with this subject already exists.'])
                ->withInput();
        }

        $article = new Article();
        $article->subject = $request["subject"];
        $article->created_by = $request->user()->id;

        $article->save();

        $revision = new Revision();
        $revision->content = $request["content"];
        $revision->summary = "Created " . $request["subject"];
        $revision->edited_at = Carbon::now();
        $revision->edited_by = $request->user()->id;
        $revision->article_id = $article->id;

        $revision->save();

        return redirect()->route("article.show", $article->subject);
    }
}
