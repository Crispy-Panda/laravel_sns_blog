<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Articleモデルに対するポリシーの設定
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 記事一覧ページ表示
     * 
     * @return view
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('updated_at');
        $user = Auth::user();

        return view('articles.index', ['articles' => $articles, 'user' => $user]);
    }

    /**
     * 記事作成ページ表示
     * 
     * @return view
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * 記事作成処理
     */
    public function store(ArticleRequest $request, Article $article )
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * 記事編集ページ表示
     * 
     * @var
     * 
     * @return view
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * 記事編集処理
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    /**
     * 記事削除処理
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /**
     * 記事詳細ページ表示
     * 
     * @return view
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * いいね機能
     * 
     * @return array
     */
    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    /**
     * いいね取り消し
     * 
     * @return array
     */
    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLike' => $article->count_likes,
        ];
    }
}
