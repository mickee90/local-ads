<template>
  <div>
    <PostSearch/>
  <PostList/>
  </div>
</template>

<script>
import PostList from "../../components/Layout/PostList.vue";
import PostSearch from "./PostSearch.vue";

export default {
  components: {
    PostList,
    PostSearch,
  },
};
</script>
