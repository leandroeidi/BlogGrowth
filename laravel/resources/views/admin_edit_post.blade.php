@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <div id="appEditPost">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p v-if="errors.length">
                                <b>Please correct the following error(s):</b>
                                <ul>
                                    <li v-for="error in errors">@{{ error }}</li>
                                </ul>
                            </p>
                            <form action="{{url('/admin/edit-post')}}" method="post" @submit="checkForm">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$id}}" />
                                Title: <br />
                                <input type="text" name="title" value="{{$title}}" v-model="title" />
                                <br /><br />
                                Text: <br />
                                <textarea rows="15" cols="90" name="text" v-model="text">{{$text}}</textarea>
                                <br /><br />
                                <input type="submit" value="Save changes" />
                                <input type="button" value="Cancel" onclick="window.location.href='{{url('/admin/list')}}'" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const app = new Vue({
  el:'#appEditPost',
  data:{
    errors:[],
    title:'{{$title}}',
    text:'{{$text}}'
  },
  methods:{
    checkForm:function(e) {
      if(this.name && this.age) return true;
      this.errors = [];
      if(!this.title) this.errors.push("Title required.");
      if(!this.text) this.errors.push("Text required.");
	  if(!this.errors.length) return true;
      e.preventDefault();
    }
  }
})
</script>

@endsection