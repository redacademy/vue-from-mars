<template>
    <div class="posts">
        <Post v-for="post in posts" :post="post"></Post>
    </div>
</template>

<script>
   import Post from './Post.vue'

   export default {

      components: {
         Post
      },

      ready() {
         this.getPosts();
      },

      data() {
         return {
            posts: []
         }
      },

      methods: {
         getPosts() {
            this.$http.get(wp.root + 'wp/v2/posts').then(function(response) {
               this.posts = response.data;
               this.$dispatch('page-title', '');
            }, function(response) {
               console.log(response);
            });
         }
      }

   }
</script>

<style lang="sass">
</style>
