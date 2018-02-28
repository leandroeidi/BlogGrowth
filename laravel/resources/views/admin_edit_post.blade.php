@extends('layouts.master_admin')

@section('title', 'Edit Post')

@section('content')
    <form action="{{url('/admin/edit-post')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$id}}" />
        Title: <input type="text" name="title" value="{{$title}}" />
        <br /><br />
        Text: <textarea rows="15" cols="100" name="text">{{$text}}</textarea>
        <br /><br />
        <input type="submit" value="Save changes" />
        <input type="button" value="Cancel" onclick="window.location.href='{{url('/admin/list')}}'" />
    </form>
@endsection