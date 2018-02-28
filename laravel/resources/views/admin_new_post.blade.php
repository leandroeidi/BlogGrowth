@extends('layouts.master_admin')

@section('title', 'New Post')

@section('content')
	<form action="{{url('/admin/new-post')}}" method="post">
        {{ csrf_field() }}
        Title: <input type="text" name="title" />
        <br /><br />
        Text: <textarea rows="15" cols="100" name="text"></textarea>
        <br /><br />
        <input type="submit" value="Create post" />
        <input type="button" value="Cancel" onclick="window.location.href='{{url('/admin/list')}}'" />
    </form>
@endsection