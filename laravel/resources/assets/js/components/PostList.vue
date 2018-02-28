<template>
  <div>
    <post-detail v-for="post in posts" :key="post.id" :post="post"></post-detail>              
  </div>
</template>

<script>
import PostDetail from "./PostListItem";
import axios from "axios";

export default {
  components: {
    PostDetail
  },
  data() {
    return {
      posts: {}
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getPosts();
  },
  methods: {
    getPosts() {
      let url = "//localhost:8000/api/post";
      axios
        .get(url)
        .then(response => {
          this.posts = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
<style lang="sass" scoped>

</style>

