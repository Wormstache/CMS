<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
		$categories= Category::all();
    	return view('admin.dashboard')->with('categories',$categories);
    }
    public function blogs()
    {
		$user=User::find(Auth::user()->id)->post;
		// dd($user->post);
		$posts = $user;
    	return view('admin.blogs')->with('posts', $posts);
    }	
    public function postEdit($id)
    {
		$categories = Category::all();
		$post = Post::findOrFail($id);
		return view("admin.post_edit")->with(compact('categories'));
    	// $post=Post::findOrFail($id);
    	// // DD($post);
    	// return view('admin.edit.post_edit')->with('posts',$post);
    }		
    public function postUpdate(Request $request, $id)
    {
    // 	$post=Post::findOrFail($id);
    // 	// DD($post);
    // 	$post->title = $request->title;
	// 	$post->content = $request->content;
	// 	if ($request->hasFile('image')) {
	// 	$img=$request->file('image');
	// 	//DD($img);
	// 	$filename=$img->getClientOriginalName();
	// 	// dd($filename);
	// 	$img->move('image',$filename);
	// 	// DD($filename);
	// 	$post->image=$filename;
	// }
	// 	$post->save();
	// 	return redirect('/admin/blogs')->with('Success','update completed');
    }
    public function destroy($id)
    {
    	// $post=Post::findOrFail($id);
    	// $post->delete();
    	// return redirect('/admin/blogs')->with('Success','deleted successfully');
    }														
}
