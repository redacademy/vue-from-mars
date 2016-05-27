<template>
   <footer class="site-footer">
      <div class="container">
         Copyright &copy; 2016 <a class="site-link" v-link="{ path: base_path }">RED Mars Colony</a>
      </div>
   </footer>
</template>

<script>
   export default {

      data() {
         return {
            base_path: wp.base_path,
            site_name: wp.site_name
         }
      }

   }
</script>

<style lang="sass">
   @import '../assets/sass/_variables.scss';
   @import '../assets/sass/_mixins.scss';

   .site-footer {
      font-family: $font__alt;
      @include font-size(.9);
      padding: $base__space-unit 0;
      text-align: center;

      .site-link {
         margin-left: ($base__space-unit / 2);
      }
   }
</style>
