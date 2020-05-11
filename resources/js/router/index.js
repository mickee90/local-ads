import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../views/Home.vue";
import Register from "../views/Register.vue";
import Profile from "../views/Profile.vue";
import Login from "../views/Login.vue";
import ContactUs from "../views/ContactUs.vue";
import Posts from "../views/Posts/Posts.vue";
import Post from "../views/Posts/Post.vue";
import EditPost from "../views/Posts/EditPost.vue";
import CreatePost from "../views/Posts/CreatePost.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/:city_id",
    name: "Posts",
    component: Posts,
  },
  {
    path: "/:city_id/post/:postId",
    name: "Post",
    component: Post,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/edit-post/:postId",
    name: "EditPost",
    component: EditPost,
  },
  {
    path: "/create-post",
    name: "CreatePost",
    component: CreatePost,
  },
  {
    path: "/contact-us",
    name: "ContactUs",
    component: ContactUs,
  },
  {
    path: "/",
    name: "Home",
    component: Home,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.MIX_BASE_URL,
  routes,
});

export default router;
