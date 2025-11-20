<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $subject)
    {
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $revisions = $article->revisions()->orderBy('edited_at', 'desc')->get();

        return view("revisions.index")->with("revisions", $revisions)->with("subject", $article->subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $subject, string $id)
    {
        $article = Article::where('subject', '=', $subject)->firstOrFail();
        $revision = Revision::findOrFail($id);
        return view("revisions.show")->with("revision", $revision)->with("subject", $article->subject);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $subject, string $id)
    {
        $revision = Revision::findOrFail($id);
        $revision->delete();

        return redirect()->route("revision.index", [$subject]);
    }
}
