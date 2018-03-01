/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("post-list", require("./components/PostList.vue"));
Vue.filter("truncate", function(value, length, omission) {
  var length = length ? parseInt(length, 10) : 20;
  var ommision = omission ? omission.toString() : "...";

  if (value.length <= length) {
    return value;
  } else {
    return value.substring(0, length) + ommision;
  }
});
const app = new Vue({
  el: "#app"
});
