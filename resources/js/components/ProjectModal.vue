<template>
<div class="container py-4">
    <div @click="$emit('close')" class="btn btn-secondary close-btn">X</div>
  <div class="d-flex flex-wrap">
    <div class="container-sm col-12 col-xl-6">
      <h3 class="section-subheader">{{ project.name }}</h3>
      <div class="flex-row justify-content-center m-2">
        <a
          class="btn btn-sm btn-outline-primary p-2 m-1"
          v-for="social in project.socials"
          v-bind:key="project.id+'so'+social.id"
          :href="social.ref"
        >
          <i :class="social.fa"></i>
          {{ social.name }}
        </a>
      </div>

      <div v-html="project.desc"></div>
    </div>
    <div class="container-sm col-12 col-xl-6">
      <div class="my-2">
        <h4>Skills Used</h4>
        <div class="row">
          <span
            class="badge badge-pill badge-secondary p-2 m-1"
            v-for="skill in project.skills"
            v-bind:key="project.id+'s'+skill.id"
          >{{ skill.name }}</span>
        </div>
      </div>
      <div class="my-2">
        <h4>Screenshots</h4>
        <swiper class="swiper" :options="swiperOption">
          <swiper-slide v-for="image in project.images" v-bind:key="project.id+'i'+image.id">
            <img class="rounded mx-auto" :src="'storage/images/' + image.filename" :width="400" />
          </swiper-slide>
          <div class="swiper-pagination" slot="pagination"></div>
        </swiper>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import { Swiper, SwiperSlide, directive } from "vue-awesome-swiper";
import "swiper/css/swiper.css";

export default {
  name: "ProjectModal",
  props: ["project"],
  components: {
    Swiper,
    SwiperSlide
  },
  directives: {
    swiper: directive
  },
  data() {
    return {
      swiperOption: {
        slidesPerView: 'auto',
          centeredSlides: true,
        spaceBetween: 15,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: true
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        }
      }
    };
  }
};
</script>

<style lang="scss" scoped>
@import "~@/_variables.scss";
.swiper-slide {
    width: 400px;
}
.swiper-pagination {
  position: relative !important;
}
.swiper-pagination ::v-deep {
  .swiper-pagination-bullet {
    opacity: 1;
    border: #f5f5f5 solid 1px;
    background-color: $pri-color;
  }
  .swiper-pagination-bullet-active {
    background-color: $sec-color;
  }
}
.swiper-container-horizontal > .swiper-pagination-bullets {
  bottom: 0;
  left: 0;
  width: 100%;
}
</style>
