<template>
  <div class="p-4 d-flex flex-column">
    <div @click="$emit('close')" class="close-btn"></div>
    <div class="flex-column">
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

      <p class>{{ project.desc }}</p>

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
        <div class="flex-column">
          <h4>Screenshots</h4>
          <swiper class="swiper" :options="swiperOption">
            <swiper-slide v-for="image in project.images" v-bind:key="project.id+'i'+image.id">
              <img
                class="rounded"
                :src="'storage/images/' + image.filename"
                :width="400"
              />
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
        slidesPerView: "auto",
        spaceBetween: 30,
        autoplay: {
          delay: 3500,
          disableOnInteraction: true
        },
        loop: true,
        centeredSlides: true,
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

.swiper {
  height: 100%;
  width: 100%;
  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-weight: bold;
    background-position: center;
    background-size: cover;
  }
}
.swiper-pagination {
  position: relative !important;
}
.swiper-pagination ::v-deep {
  .swiper-pagination-bullet {
    opacity: 1;
    border: #f5f5f5 solid 1px;
    background-color: $offwhite;
  }
  .swiper-pagination-bullet-active {
    background-color: $pri-color;
  }
}
.swiper-container-horizontal > .swiper-pagination-bullets {
  bottom: 0;
  left: 0;
  width: 100%;
}
</style>
