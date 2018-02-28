@extends('layouts.master_admin')

@section('title', 'Login')

@section('content')
	<h2>Login</h2>
    <form action="{{url('admin/login')}}" method="post">
        {{ csrf_field() }}
        <input type="email" name="email" id="email" placeholder="Email Address" />
        <input type="password" name="password" id="password" placeholder="Password" />
        <span>
        <input name="remember" id="remember" type="checkbox" class="checkbox"> 
        Keep me signed in
        </span>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
	
    <h2>Sign up</h2>
    * The real blog wouldn't have a sign up form here, but it's here for practice purposes, and to make user test easier.
    <form method="POST" action="{{url('admin/register')}}">
        {!! csrf_field() !!}
        <input type="text" name="name" id="name"  placeholder="Name">
        <input type="email" name="email" placeholder="Email Address"/>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" class="btn btn-default">Signup</button>
    </form>
@endsection