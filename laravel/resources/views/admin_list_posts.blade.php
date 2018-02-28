@extends('layouts.master_admin')

@section('title', 'List of Posts')

@section('content')
	<h1>List of Posts</h1>
	<form action="{{url('/admin/delete-posts')}}" method="post">
        {{ csrf_field() }}
        <input type="button" value="Create new post" onclick="window.location.href='{{url('/admin/new-post')}}'" />
        <input type="submit" value="Delete selected" />
        <br /><br />
        @if(count($posts) > 0)
            <table border="1">
                <tr>
                    <td></td>
                    <td></td>
                    <td>Posted at</td>
                    <td>Title</td>
                    <td>Text</td>
                </tr>
            @foreach($posts as $post)
                <tr>
                    <td><input type="checkbox" name="post_ids[]" value="{{$post->id}}" />
                    </td>
                    <td><a href="{{url('/admin/edit-post/'.$post->id)}}" target="_self">Edit</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->text, 0, 100)}}</td>
                </tr>
            @endforeach
            </table>
        @else
            There are no posts in this blog.
        @endif
    </form>
@endsection