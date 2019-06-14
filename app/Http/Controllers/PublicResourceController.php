<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PublicResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        //dd($request->image);
        $post=new Post();
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->hasFile('image')) {
            $img=$request->file('image');
            //DD($img);
            $filename=$img->getClientOriginalName();
            // dd($filename);
            $img->move('image',$filename);
            // DD($filename);
            $post->image=$filename;
        }
        $post->save();
        return redirect('/admin/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
    	// DD($post);
    	return view('admin.edit.post_edit')->with('posts',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
    	// DD($post);
    	$post->title = $request->title;
		$post->content = $request->content;
		if ($request->hasFile('image')) {
		$img=$request->file('image');
		//DD($img);
		$filename=$img->getClientOriginalName();
		// dd($filename);
		$img->move('image',$filename);
		// DD($filename);
		$post->image=$filename;
	}
		$post->save();
		return redirect('/admin/blogs')->with('Success','update completed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
    	$post->delete();
    	return redirect('/admin/blogs')->with('Success','deleted successfully');
    }
}
