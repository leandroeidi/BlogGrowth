@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body">
                	@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{url('/admin/new-post')}}" method="post">
                        {{ csrf_field() }}
                        Title: <br />
                        <input type="text" name="title" />
                        <br /><br />
                        Text: <br />
                        <textarea rows="15" cols="90" name="text"></textarea>
                        <br /><br />
                        <input type="submit" value="Create post" />
                        <input type="button" value="Cancel" onclick="window.location.href='{{url('/admin/list')}}'" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection