<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        $news = News::with('user')->get();
        return view('users.news',compact('news'));
    }
    public function search(Request $request){
        if($request->input('query') == "") {
            $news = News::with('user')->get();
        }
        $news = News::where('title', 'LIKE', '%' . $request->input('query') . '%')->get();
        return view('users.news',compact('news'));
    }
    
}
