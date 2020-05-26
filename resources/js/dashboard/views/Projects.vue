<template>
  <div class="section-cont p-4">
    <div class="d-flex flex-row justify-content-between m-1">
      <h2>Projects</h2>
      <div class="d-flex flex-row p-1">
        <button @click="show()" class="btn btn-primary m-1">
          <i class="fas fa-plus"></i>
        </button>
        <input
          type="number"
          class="form-control input-lg m-1"
          id="idSelect"
          placeholder="Project ID"
          v-model="project_id"
        />
        <button @click="show(project_id)" class="btn btn-outline-primary m-1">
          <i class="far fa-edit"></i>
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byRank"></datatable>
    </div>
  </div>
</template>

<script>
import ProjectForm from '../components/ProjectForm';

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
      columns: [
        { label: "id", field: "id" },
        { label: "rank", field: "rank" },
        { label: "name", field: "name" },
        { label: "brief", field: "brief", sortable: false },
        { label: "description", field: "desc", sortable: false }
      ],
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
    show(id) {
      this.$modal.show(
        ProjectForm,
        {
          project: _.find(this.projects, function(o) { return o.id == id; }),
        },
        {
          scrollable: true,
          adaptive: true,
          clickToClose: false,
          height: "auto",
          width: 800
        }
      );
    }
  }
};
</script>
