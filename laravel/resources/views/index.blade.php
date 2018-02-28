@extends('layouts.blog')

@section('title', 'Blog Growth - Posts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Posts</div>

                <div class="card-body">

					@if(count($posts) > 0)
                            @foreach($posts as $post)
                                <div>{{date('m-d-Y', strtotime($post->created_at))}}</div>
                                <div><h2>{{$post->title}}</h2></div>
                                <div>{{substr($post->text, 0, 200)}}</div>
                                <div><a href="{{url('/post/'.$post->id)}}">Read more...</a></div>
                                <div class="aligncenter" style="width:100%;height:1px;background-color:#555555;margin-top:25px;margin-bottom:25px;"></div>
                            @endforeach
                    @else
                        There are no posts in this blog.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection