<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $a = 0; $pa = 0; $upa = 0; $u = 0;$c = 0;
        $articles = Article::all();
        $PublishedArticles = Article::where('published', 1)->get();
        $unPublishedArticles = Article::where('published', 0)->get();
        $users = User::where('type', 'user')->get();
        $categories = Category::all();
        foreach ($articles as $article) {$a++;}
        foreach ($PublishedArticles as $article) {$pa++;}
        foreach ($unPublishedArticles as $article) {$upa++;}
        foreach ($users as $user) {$u++;}
        foreach ($categories as $category) {$c++;}

        return view('admin',['a' => $a, 'pa' => $pa, 'upa' => $upa,'u' => $u, 'c' => $c]);
    }

    public function addArticle()
    {
        $categories = Category::all();
        return view('addArticle',compact('categories'));
    }
    
    public function storeArticle(Request $request)
    {
        $this->validate($request, [
              'title' => 'required|string|max:255',
              'body' => 'required|string',
         ]);
         if($request->file('photo')){
             $file_extention = $request->file('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/articles';
             $request->photo->move($path,$file_name);
         }else{
            $file_name = '';
         }
       
       $article = new Article();
       $article->photo = $file_name;
       $article->title = request('title');
       $article->body = request('body');
       $article->published = 0;
       $article->user_id = auth()->user()->id;
       $article->category_id = request('category');
       $article->save();
        
         return redirect('/viewArticles');   
    }

    public function viewArticles()
    {
        $articles = Article::orderby('id' ,'desc')->paginate(5);
        return view('viewArticles', ['articles' => $articles]);
    }

    public function publishArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->published = 1;
        $article->save();
        return back();
    }
    
    public function unPublishArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->published = 0;
        $article->save();
        return back();
    }

    public function deleteArticle(Article $id){
        $id->delete();
        return back();
    }

    public function updateArticle($id){
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('updateArticle', compact('article'), compact('categories'));
    }

    public function saveArticle($id)
    {
         request()->validate([
              'title' => 'required|string|max:255',
              'body' => 'required|string',
         ]);
         if(request('photo')){
             $file_extention = request('photo')->getClientOriginalExtension();
             $file_name = time().'.'.$file_extention;
             $path ='images/articles';
             request('photo')->move($path,$file_name);
         }else{
            $file_name = '';
         }
       
       $article = Article::findOrFail($id);
       $article->photo = $file_name;
       $article->title = request('title');
       $article->body = request('body');
       $article->user_id = auth()->user()->id;
       $article->category_id = request('category');
       $article->save();
        
         return redirect('/viewArticles');   
    }
    





}
