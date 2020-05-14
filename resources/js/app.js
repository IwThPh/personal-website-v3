require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});

$(document).ready(
    function () {
        const pointer = document.querySelector(".nav-pointer");
        const items = document.querySelectorAll('.nav-item');

        function handlePointer(el) {
            items.forEach(item => {
                item.classList.remove('active');
            });
            if (el == null) {
                pointer.style.top = `33px`;
                pointer.style.right = `-22px`;
            } else {
                pointer.style.top = `${el.offsetTop + pointer.offsetHeight}px`;
                pointer.style.right = `0`;
                el.classList.add('active');
            }
        }
        items.forEach((item, index) => {
            item.addEventListener('click', (e) => {
                handlePointer(e.target)
            });
            item.classList.contains('active') && handlePointer(item);
        });

        var section1Height = $('.about-section').offset().top;
        var section2Height = $('.project-section').offset().top;
        var section3Height = $('.experience-section').offset().top;
        $(window).scroll(function () {
            var winTop = $(window).scrollTop();
            var winHeight = $(window).height();
            var winOff = winTop + (winHeight / 2);
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
    }
);
