import VueRouter from "vue-router";

let routes = [
    { path: "/", component: require("./views/Dashboard.vue").default },
    { path: "/skills", component: require("./views/Skills.vue").default },
    { path: "/socials", component: require("./views/Socials.vue").default },
    { path: "/experiences", component: require("./views/Experiences.vue").default },
    { path: "/images", component: require("./views/Images.vue").default },
    { path: "/projects", component: require("./views/Projects.vue").default }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'active'
});
