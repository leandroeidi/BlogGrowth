<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class BlogController extends Controller
{
    public function list_posts()
	{
		$posts = App\Post::all()->sortByDesc('created_at');
		return view('index', array('posts' => $posts));
	}
	
	public function post_detailed($id)
	{
		$post = App\Post::find($id);
		
		$previous = App\Post::where('id', '<', $post->id)->max('id');
        $next = App\Post::where('id', '>', $post->id)->min('id');
			
		return view('post', array('id' => $id, 'title' => $post->title, 'text' => $post->text, 'created_at' => $post->created_at, 'previous_id' => $previous, 'next_id' => $next));
	}
}
