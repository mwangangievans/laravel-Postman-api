<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\http\Requests;
//use Illuminate\Http\Request;


use App\Http\Resources\Article as ArticleResource;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get some artcles

        $articles = Article::paginate(15);
        //return collection of articles as a resource

        return ArticleResource::collection($articles);
        //return $articles;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ?   Article::findOrFind
        ($request->article_id) : new Article;
        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body= $request->input('body');
        if ($article->save()){
            return new ArticleResource($article);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        // return a single article as a resource

        return new ArticleResource($article);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        // return a single article as a resource
            if($article->delete()){
                return new ArticleResource($article);
            }
    }
}
