<template>
  <div class="section-cont p-4">
    <div class="col justify-content-center">
      <div
        class="row m-0 my-2 m-sm-4 justify-content-center"
        v-for="project in byRank"
        v-bind:key="project.id"
      >
        <img
          v-bind:src="'images/' + project.images[0].filename"
          :width="project.images[0].width"
          :height="project.images[0].height"
          class="rounded mx-auto border-5 border-primary"
        />
        <div class="col-lg-8 col-md-12 m-4 justify-content-center">
          <h3 class="section-subheader">{{ project.name }}</h3>
          <p class="text-center">{{ project.brief }}</p>
          <div class="row justify-content-center">
            <span
              class="badge badge-pill badge-secondary p-2 m-1"
              v-for="skill in project.skills"
              v-bind:key="project.id+'s'+skill.id"
            >{{ skill.name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Project Component Mounted.");
  },
  computed: {
    byRank: function() {
      return _.orderBy(this.projects, "rank", "asc");
    }
  },
  data() {
    return {
      projects: [],
      project: {
        id: "",
        name: "",
        brief: "",
        desc: "",
        rank: "",
        images: [],
        skills: [],
        socials: [],
        skill: {
          id: "",
          name: ""
        },
        social: {
          id: "",
          name: "",
          ref: ""
        },
        image: {
          id: "",
          filename: "",
          width: "",
          height: ""
        }
      },
      project_id: ""
    };
  },

  created() {
    this.fetchProjects();
  },

  methods: {
    fetchProjects(url) {
      url = "/projects";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.projects = res;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
