@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Posts</div>
                    <div class="card-body">
                    	<div id="appPost">
                        <form action="{{url('/admin/delete-posts')}}" method="post">
                            {{ csrf_field() }}
                            <input type="button" value="Create new post" onclick="window.location.href='{{url('/admin/new-post')}}'" />
                            <input type="submit" value="Delete selected" v-if="checkPosts.length > 0" />
                            <br /><br />
                            @if(count($posts) > 0)
                                <table border="1" width="100%">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Posted at</td>
                                        <td width="20%">Title</td>
                                        <td width="50%">Text preview</td>
                                    </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><input type="checkbox" name="post_ids[]" value="{{$post->id}}" v-model="checkPosts" />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
new Vue({
  el: '#appPost',
  data: {
	checkPosts: []
  }
})
</script>

@endsection