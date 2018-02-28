<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function list_posts()
	{
		$posts = App\Post::all()->sortByDesc('created_at');
		return view('admin_list_posts', array('posts' => $posts));
	}
	
    public function new_post()
	{
		return view('admin_new_post');
	}
	
	public function insert_new_post(Request $request)
	{
		$validatedData = $request->validate([
			'title' => 'required|max:100',
			'text' => 'required',
		]);
		$title = $request->input('title');
		$text = $request->input('text');
		
		App\Post::create(array('title' => $title, 'text' => $text));
		
		return redirect('/admin/list');
	}
	
	public function edit_post($id)
	{
		$posts = App\Post::find($id);
		return view('admin_edit_post', array('id' => $id, 'title' => $posts->title, 'text' => $posts->text));
	}
	
	public function update_post(Request $request)
	{
		$validatedData = $request->validate([
			'title' => 'required|max:100',
			'text' => 'required',
		]);
		$posts = App\Post::find($request->id);
		$posts->title = $request->title;
		$posts->text = $request->text;
		$posts->save();
		
		return redirect('/admin/list');
	}
	
	public function delete_posts(Request $request)
	{
		$posts_for_deletion = $request->input('post_ids');
		if(isset($posts_for_deletion))
		{
			foreach($posts_for_deletion as $id_post)
			{
				$posts = App\Post::find($id_post);
				$posts->delete();
			}
		}
		
		return redirect('/admin/list');
	}
}
