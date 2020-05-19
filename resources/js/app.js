import VModal from "vue-js-modal";
import VueAwesomeSwiper from "vue-awesome-swiper";

import 'swiper/css/swiper.css'

require("./bootstrap");

window.Vue = require("vue");
Vue.use(VModal, { dynamic: true, injectModalsContainer: true });
Vue.use(VueAwesomeSwiper);

Vue.component("projects", require("./components/Projects.vue").default);
Vue.component("projectModal", require("./components/ProjectModal.vue").default);
Vue.component("experiences", require("./components/Experiences.vue").default);

const app = new Vue({
    el: "#app"
});

$(document).ready(function() {
    const toggler = document.querySelector(".toggler");
    toggler.addEventListener("click", e => {
        if (toggler.checked) {
            const scrollY = document.documentElement.style.getPropertyValue(
                "--scroll-y"
            );
            document.body.style.position = "fixed";
            document.body.style.top = `-${scrollY}`;
        } else {
            const body = document.body;
            const scrollY = body.style.top;
            body.style.position = "";
            body.style.top = "";
            window.scrollTo(0, parseInt(scrollY || "0") * -1);
        }
    });
    const mobileitems = document.querySelectorAll(".mobile-nav-item");
    mobileitems.forEach((item, index) => {
        item.addEventListener("click", e => {
            toggler.click();
        });
    });

    const pointer = document.querySelector(".nav-pointer");
    const items = document.querySelectorAll(".nav-item");
    function handlePointer(el) {
        items.forEach(item => {
            item.classList.remove("active");
        });
        if (el == null) {
            pointer.style.top = `33px`;
            pointer.style.right = `-22px`;
        } else {
            pointer.style.top = `${el.offsetTop + pointer.offsetHeight}px`;
            pointer.style.right = `0`;
            el.classList.add("active");
        }
    }
    items.forEach((item, index) => {
        item.addEventListener("click", e => {
            handlePointer(e.target);
        });
        item.classList.contains("active") && handlePointer(item);
    });

    $(window).scroll(function() {
        document.documentElement.style.setProperty(
            "--scroll-y",
            `${window.scrollY}px`
        );
        var winTop = $(window).scrollTop();
        var winHeight = $(window).height();
        var winOff = winTop + winHeight / 2;
        var section1Height = $(".about-section").offset().top;
        var section2Height = $(".project-section").offset().top;
        var section3Height = $(".experience-section").offset().top;

        if (winOff >= section1Height && winOff <= section2Height) {
            handlePointer(items.item(0));
        } else if (winOff >= section2Height && winOff <= section3Height) {
            handlePointer(items.item(1));
        } else if (winOff >= section3Height) {
            handlePointer(items.item(2));
        } else {
            handlePointer(null);
        }
    });
});
