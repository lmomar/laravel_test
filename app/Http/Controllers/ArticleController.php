<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ArticleController extends Controller{
    
    public function create() {
        return view('articles.view');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $inputs = $request->all();
        $art = new Article();
        $art->title = $inputs['title'];
        $art->body = $inputs['body'];
        $art->user_id = Auth::id();
        $art->save();
        Session::flush('message','Article ajouté');
        return redirect()->route('articles_list');
        
    }
    
    public function index() {
        $articles = Article::all();
        return view('articles.index',['articles' => $articles]);
    }
}
