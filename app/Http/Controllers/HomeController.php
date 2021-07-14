<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $articles = Article::where('published', 1)->orderby('id' ,'desc')->paginate(5);
        return view('home', ['categories' => $categories, 'articles' => $articles]);
    }

    public function filterArticle(Request $request)
    {
        $categories = Category::all();
        if ($request->category == 'empty') {
            return redirect('home');
        }else{
            $articles = Article::where('published', 1)->where('category_id', $request->category)->orderby('id' ,'desc')->paginate(5);
        }
        return view('home', ['categories' => $categories, 'articles' => $articles]);
    }

    public function commentsForPost($id)
    {
        $article = Article::findOrFail($id);
        $comments = Comment::orderby('id' ,'desc')->get();
        return view('commentsForPost', ['article' => $article, 'comments' => $comments]);
    }



    

}
