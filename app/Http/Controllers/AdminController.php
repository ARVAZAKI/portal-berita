<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $news = News::where('post_by',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('admin.dashboard',compact('news'));
    }
    public function news(){
        $news = News::with('user')->orderBy('created_at','desc')->get();
        return view('admin.news',compact('news'));
    }
    public function addNews(){
        return view('admin.addnews');
    } 
   
    public function delete($id){
        News::findOrFail($id)->delete();
        return redirect()->back()->with('message','delete data successfully...');
    }
}
