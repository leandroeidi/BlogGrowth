@extends('layouts.blog')

@section('title', 'Blog Growth')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="appDetail">
                	<div class="card-header"><h2>@{{post.title}}</h2></div>
                    <div class="card-body">
                        <div style="margin-bottom:25px;">@{{post.createdAt}}</div>
                        <div style="margin-bottom:25px;">@{{post.text}}</div>
                        <div style="width:100%;">
                            <div style="width:50%;text-align:left;float:left;">
                            	<div v-if="post.previousId > 0"><a :href="'/post/' + post.previousId">&lt;&lt; Previous post</a></div>
                            &nbsp;</div>
                            <div style="width:50%;text-align:right;float:left;">
                            	<div v-if="post.nextId > 0"><a :href="'/post/' + post.nextId">Next post &gt;&gt;</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var appDetail = new Vue({
  el: '#appDetail',
  
  data() {
    return {
      post: {}
    };
  },
  
  mounted: function() {
	  this.getPost();
  },
  
  methods: {
    getPost() {
      let url = "//localhost:8000/api/post-detailed/{{$id}}";
      axios
        .get(url)
        .then(response => {
          this.post = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
  
})
</script>
@endsection