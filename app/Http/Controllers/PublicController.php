<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
class PublicController extends Controller
{
    public function index()
    {
        // $user=User::find(Auth::user()->id);
        // dd($user->post);
    	$posts=Post::all();
    	return view('public.index')->with('posts',$posts);
    }
    public function blog($id){
    	$post=Post::find($id);
    	return view('public.blog')->with('post',$post);
    }
    public function search(Request $request)
    {
        $posts=Post::where('title','like','%'.$request->search.'%')->get();
    	return view('public/search')->with('posts',$posts);
    }
    public function category($id)
    {
        $posts=Post::where('category_id',$id)->get();
    	return view('public/category')->with('posts',$posts);
    }
    public function author($id)
    {
        $posts=Post::where('user_id',$id)->get();
    	return view('public/author')->with('posts',$posts);
    }
}
