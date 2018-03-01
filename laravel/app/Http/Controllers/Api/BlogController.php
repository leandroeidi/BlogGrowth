<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App;

class BlogController extends App\Http\Controllers\Controller
{
    public function list_posts(): JsonResponse
	{
		$posts = App\Post::all()->sortByDesc('created_at');
		return response()->json(self::camelizeAllKeys($posts->toArray()));
	}
	
	public function post_detailed($id)
	{
		$post = App\Post::find($id);
		
		$previous = App\Post::where('id', '<', $post->id)->max('id');
        $next = App\Post::where('id', '>', $post->id)->min('id');
		
		$post = $post->toArray();
		$post["previousId"] = empty($previous) ? 0 : $previous;
		$post["nextId"] = empty($next) ? 0 : $next;
		
		$post["created_at"] = date('m-d-Y', strtotime($post["created_at"]));
		
		return response()->json(self::camelizeAllKeys($post));
	}
}
