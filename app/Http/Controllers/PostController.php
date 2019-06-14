<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function addPost(Request $request){
	// $request->validate([
	// 	'title'=>'required',
	// 	'content'=>'required',
	// 	'image'=>'required'
	// ]);
	// //dd($request->image);
	// $post=new Post();
	// $post->title = $request->title;
	// $post->content = $request->content;
	// if ($request->hasFile('image')) {
	// 	$img=$request->file('image');
	// 	//DD($img);
	// 	$filename=$img->getClientOriginalName();
	// 	// dd($filename);
	// 	$img->move('image',$filename);
	// 	// DD($filename);
	// 	$post->image=$filename;
	// }
	// $post->save();
	return redirect('/admin/blogs');
	}
	public function get(){
	return('/');
}
}