<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        $news = News::with('user')->orderBy('created_at','desc')->get();
        return view('users.news',compact('news'));
    }
    public function search(Request $request){
        if($request->input('query') == "") {
            $news = News::with('user')->get();
        }
        $news = News::where('title', 'LIKE', '%' . $request->input('query') . '%')->get();
        return view('users.news',compact('news'));
    }
    public function addNews(Request $request){
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'post_by' => Auth::user()->id,
            'upload_date' => now()
        ]);
        return redirect()->back()->with('message','berhasil menambah data...');
    }
    
}
