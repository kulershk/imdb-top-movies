<template>
  <div v-if="message" class="message" v-bind:class="{ error: error }">
    {{ message }}
  </div>
</template>

<script lang="ts">

export default {
  name: 'message',
  data() {
    return {
      message: '',
      error: false,
      debounce: null
    }
  },
  mounted() {
    this.$nuxt.$on('global_message', this.sendMessage);
  },
  destroyed() {
    this.$nuxt.$off('global_message');
  },
  methods: {
    sendMessage(response) {
      this.message = response.message;
      this.error = response.error | false

      if (this.debounce != null) {
        clearTimeout(this.debounce);
      }
      this.debounce = setTimeout(() => {this.message = ""}, 2000);
    },
  }
}
</script>

<style scoped type="text/scss" lang="scss">
.message {
  margin: 0 auto;
  max-width: 400px;
  padding: 0 3px;
  width: 100%;

  border: 1px solid $base-color;
  margin-bottom: 3px;
  background: #c8ffc8;

  &.error {
    background: #ffdddd !important;
  }
}
</style>
