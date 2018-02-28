@extends('layouts.blog')

@section('title', 'Blog Growth - '.$title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$title}}</h2></div>
                <div class="card-body">
                    <div style="margin-bottom:25px;">{{date('m-d-Y', strtotime($created_at))}}</div>
                    <div style="margin-bottom:25px;">{!! nl2br($text) !!}</div>
                    <div style="width:100%;">
                    	<div style="width:50%;text-align:left;float:left;"><a href="{{url('/post/'.$previous_id)}}">
                        @if($previous_id > 0)
                            &lt;&lt; Previous post
                        @endif
                        &nbsp;</a></div>
                        <div style="width:50%;text-align:right;float:left;"><a href="{{url('/post/'.$next_id)}}">
                        @if($next_id > 0)
                            Next post &gt;&gt;
                        @endif
                        </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection