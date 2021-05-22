<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $size = 10;
        $articles = Article::latest('id')->paginate($size);

        foreach ($articles as $article) {
            $text = $article->text;
            $textArray = explode(' ', $text);
            $smallArray = array_slice($textArray, 0, 60);
            $smallText = implode(' ', $smallArray);
            $article->text = $smallText . ' ...';
        }

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->text = $request->text;
        $res = $article->save();

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
            'message' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if ($request->save) {

            $this->validate($request, [
                'title' => 'required',
                'text' => 'required',
            ]);

            $article->title = $request->title;
            $article->text = $request->text;
            $res = $article->save();
            if ($res) {
                $message = "Запись $article->id обновлена";
            } else {
                $message = "Запись $article->id не обновлена";
            }
            
        } else {
            $message = false;
        }

        return view('article.edit', [
            'article' => $article,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $id = $article->id;
        $res  = $article->delete();

        if ($res) {
            session()->flash('message', "запись $id удалена");
        } else {
            session()->flash('message', "ошибка удаления записи $id");
        }

        return redirect()->route('article.index');

    }
}
