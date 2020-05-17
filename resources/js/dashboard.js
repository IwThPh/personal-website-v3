import VueRouter from "vue-router";

import router from "./dashboard/routes";
import { VuejsDatatableFactory } from "vuejs-datatable";

require("./bootstrap");

window.Vue = require("vue");
Vue.use(VueRouter);
Vue.use(VuejsDatatableFactory);

Vue.component("dashboard", require("./dashboard/views/Dashboard.vue").default);
Vue.component("projects", require("./dashboard/views/Projects.vue").default);
Vue.component("skills", require("./dashboard/views/Skills.vue").default);
Vue.component("images", require("./dashboard/views/Images.vue").default);
Vue.component("experiences",require("./dashboard/views/Experiences.vue").default);
Vue.component("socails", require("./dashboard/views/Socials.vue").default);

VuejsDatatableFactory.useDefaultType(false).registerTableType(
    "datatable",
    tableType =>
        tableType.mergeSettings({
            table: {
                class: "table table-hover table-striped",
                sorting: {
                    sortAsc:
                        '<i class="fas fa-sort-amount-up" title="Sort ascending"></i>',
                    sortDesc:
                        '<i class="fas fa-sort-amount-down" title="Sort descending"></i>',
                    sortNone: '<i class="fas fa-sort" title="Sort"></i>'
                }
            },
            pager: {
                classes: {
                    pager: "pagination text-center",
                    selected: "active"
                },
                icons: {
                    next:
                        '<i class="fas fa-chevron-right" title="Next page"></i>',
                    previous:
                        '<i class="fas fa-chevron-left" title="Previous page"></i>'
                }
            }
        })
);

const dashboard = new Vue({
    el: "#dashboard",
    router
});
