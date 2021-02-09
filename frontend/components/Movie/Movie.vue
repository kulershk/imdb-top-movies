<template>
  <nuxt-link v-bind:to="'/movie/'+this.movie.id_imdb">
    <div class="movie-container">
      <div class="thumbnail">
        <img v-bind:src="this.movie.url_poster" alt="poster" />
      </div>
      <p class="info">
        {{ this.movie.title }} ({{this.movie.year}})<br>
        Comments: {{ this.movie.comments }}<br>
        Rating: {{ this.movie.rating }}
      </p>
    </div>
  </nuxt-link>
</template>

<script lang="ts">

interface MovieInterface {
  title: string,
  year: string,
  urlPoster: string,
  id_imdb: string,
  rating: string,
  ranking: number,
  comments: number
}

export default {
  name: 'movie',
  props: { movie : Object as () => MovieInterface }
}
</script>

<style scoped type="text/scss" lang="scss">

.movie-container {

  background: $odd-background;

  .comments-blob {
    position: relative;
  }

  &:nth-child(even) {
    background: $even-background;
  }

  &:hover {
    background: $base-color;
  }
}

</style>
