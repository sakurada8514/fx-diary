require("./bootstrap");

import Vue from "vue";
import router from "./router";
import store from "./store";
import InfiniteLoading from "vue-infinite-loading";

import App from "./App.vue";

Vue.use(InfiniteLoading);

//ユーザー情報取得後アプリクリエイト
const createApp = async () => {
    await store.dispatch("auth/currentUser");
    new Vue({
        el: "#app",
        router,
        store,
        components: { App },
        template: "<App></App>"
    });
};

createApp();
