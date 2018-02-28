<template>
  <div class="card-body">
    <div>{{ post.createdAt | moment }}</div>
    <div><h2>{{ post.title }}</h2></div>
    <div>{{ post.text | truncate(30,'...') }}</div>
    <div>Read more...</div>
    <hr/>
  </div>
              
</template>

<script>
import moment from 'moment';

export default {
  props: ["post"],
  mounted() {
    console.log("mounted");
  },
  filters:{
    moment (date){
      return moment(date).format('YYYY年MM月DD日 HH:mm');
    }
  }
};
</script>
<style lang="sass" scoped>

</style>


