<template>
  <div class="section-cont p-sm-4">
    <div class="d-flex flex-row justify-content-center">
      <div class="row m-0 my-2 m-sm-4 justify-content-center" v-if="byStartDesc.length == 0">
        <h4>No Experience Found.</h4>
      </div>
      <div class="tab w-25" v-else>
        <button
          class="tablinks p-2 text-break"
          v-for="experience in byStartDesc"
          v-bind:key="experience.id"
          v-on:click="open(experience.id, $event)"
        >{{experience.name}}</button>
      </div>
      <div
        class="tabcontent p-2 flex-grow-1"
        :id="'tc'+experience.id"
        v-for="experience in byStartDesc"
        v-bind:key="experience.id"
      >
        <h3 class="font-weight-bold">{{experience.name}}</h3>
        <div class="d-flex flex-wrap justify-content-between">
          <h4 class="font-weight-light">{{experience.location}}</h4>
          <h4
            class="font-weight-light"
          >{{experience.start_at + ' to '}}{{experience.end_at||'Present'}}</h4>
          <div v-html="experience.desc"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Experience Component Mounted.");
  },
  data() {
    return {
      experiences: [],
      experience: {
        id: "",
        name: "",
        location: "",
        desc: "",
        start_at: "",
        end_at: ""
      },
      experience_id: ""
    };
  },

  created() {
    this.fetchExperiences();
  },

  computed: {
    byStartDesc: function() {
      return _.orderBy(this.experiences, "start_at", "desc");
    }
  },
  methods: {
    fetchExperiences(url) {
      url = "/experiences";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.experiences = res;
        })
        .then(_ => {
          var elem = this.$el.querySelector(".tablinks");
          elem.click();
        })
        .catch(err => console.log(err));
    },
    open(id, event) {
      var i, tabcontent, tablinks;

      tabcontent = this.$el.querySelectorAll(".tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      tablinks = this.$el.querySelectorAll(".tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      this.$el.querySelector("#tc" + id).style.display = "block";
      event.currentTarget.className += " active";
    }
  }
};
</script>
