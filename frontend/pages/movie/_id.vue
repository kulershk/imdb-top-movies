<template>
  <div class="container">
    <div class="movie-container">
      <div class="thumbnail">
        <img v-bind:src="this.movie.url_poster" />
      </div>
      <p class="info">
        {{ this.movie.title }} ({{this.movie.year}})<br>
        Rating: {{ this.movie.rating }}
      </p>
    </div>

    <div class="comment-container">

      <div class="post-comment">
        <form @submit.prevent="addComment">
          <input v-model="name" placeholder="Name"><br>
          <textarea v-model="message" placeholder="Comment"></textarea>
          <button type="submit" :disabled="!cansend">Submit</button>
        </form>
      </div>

      <div class="comment-list">
        <template v-for="comment in comments">
          <Comment v-bind:comment="comment" ></Comment>
        </template>
      </div>

    </div>
  </div>

</template>

<script lang="ts">

import Vue from "vue";
import Comment from "~/components/Movie/Comment.vue";
import axios from "~/plugins/axios";

export default Vue.extend({
  components: {Comment},
  mounted() {
    this.loadMovie();
    this.loadCommenets();
  },
  data () {
    return {
      name: "",
      message: "",
      comments: [],
      cansend: true,
      movie:
        {
          "title": "Loading...",
          "year": "0000",
          "url_poster": "https://via.placeholder.com/45x67",
          "rating": "0",
          "ranking": 0
        }

    }
  },
  methods: {
    async loadCommenets() {
      let data = await axios.get("/comment/get/"+this.$route.params.id);
      this.comments = data.data;
    },
    async loadMovie() {
      let data = await axios.get("/movie/"+this.$route.params.id);
      if (data.data.error == true) {
        this.$bus.$emit('global_message', data.data)
        await this.$router.push('/');
        return;
      }
      this.movie = data.data;
    },
    addComment() {
      this.cansend = false;
      axios.post("/comment/post", {
        name: this.name,
        text: this.message,
        movie: this.$route.params.id
      })
      .then((response) => {
        this.cansend = true;
        this.$bus.$emit('global_message', response.data)
        if (response.data.error == undefined) {
          this.loadCommenets();
        }
      })
      .catch(() => {
        this.cansend = true;
      })
    }
  }
})

</script>

<style scoped type="text/scss" lang="scss">

.comment-container {
  max-width: 400px;
  width: 100%;
  float: left;

  .post-comment {
    border: 1px solid $base-color;
    padding: 10px;
    margin-bottom: 3px;
    overflow: hidden;

    input {
      max-width: 150px;
      width: 100%;
      margin-bottom: 3px;
    }

    textarea {
      width: 100%;
    }

    button {
      float: right;
    }
  }
}

</style>
