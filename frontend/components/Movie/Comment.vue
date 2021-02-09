<template>
  <div class="comment">
    <div class="title">
      <span>{{ this.comment.name }}</span>
      <span>{{ timeFormat(this.comment.created_at) }}</span>
    </div>
    <div class="content">{{ this.comment.text }}</div>
  </div>
</template>

<script lang="ts">

interface CommentInterface {
  name: string,
  created_at: string,
  text: string
}

export default {
  name: 'comment',
  props: { comment : Object as () => CommentInterface },
  methods: {
    timeFormat(time : string) {
      return new Date(time).toLocaleString("en-GB");
    }
  }
}
</script>


<style scoped type="text/scss" lang="scss">

.comment {
  border: 1px solid $base-color;
  margin-bottom: 2px;

  .title {
    border-bottom: 1px solid $base-color;
    span {
      padding: 0 3px;

      &:nth-child(2) {
        float: right;
      }
    }
  }

  .content {
    padding: 3px;
    word-break: break-word;
  }
}

</style>
