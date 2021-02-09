<template>
  <div class="container">
      <movie v-for="item in movies" v-bind:movie='item' v-bind:key="item.id_imdb"></movie>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import Movie from "~/components/Movie/Movie.vue";
import axios from "~/plugins/axios";

export default Vue.extend({
  components: {Movie},
  async mounted() {
    let data = await axios.get("/movies");
    this.movies = data.data;
  },
  data () {
    return {
      movies: []
    }
  }
})
</script>

<style>

</style>
