<template>
  <div class="section-cont p-sm-4">
    <div class="col justify-content-center">
      <div
        class="row m-0 my-2 m-sm-4 justify-content-center"
        v-if="byRank.length == 0"
      >
      <h4>No Projects Found.</h4>
      </div>
      <div
        class="row m-0 my-2 m-sm-4 justify-content-center"
        v-for="project in byRank"
        v-bind:key="project.id"
      >
        <div class="my-auto">
          <img
            v-bind:src="'storage/images/' + project.images[0].filename"
            :width="200"
            class="rounded mx-auto border-5 border-primary"
          />
        </div>
        <div class="col-lg-8 col-md-12 m-1 m-sm-4 justify-content-center">
          <h3 class="section-subheader">{{ project.name }}</h3>
          <div class="my-2">
            <h6 class="text-center">Skills Used</h6>
            <div class="row justify-content-center">
              <span
                class="badge badge-pill badge-secondary p-2 m-1"
                v-for="skill in project.skills"
                v-bind:key="project.id+'s'+skill.id"
              >{{ skill.name }}</span>
            </div>
          </div>
            <div class="text-center" v-html="project.brief"> </div>
          <div class="row justify-content-center">
            <div @click="show(project)" class="btn btn-primary m-2">View Details</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProjectModal from "./ProjectModal";

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
    },
    show(project) {
      this.$modal.show(
        ProjectModal,
        {
          project: project
        },
        {
          scrollable: true,
          adaptive: true,
          height: "auto",
          width: "80%"
        }
      );
    }
  }
};
</script>
