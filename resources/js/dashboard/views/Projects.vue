<template>
  <div class="section-cont p-4">
    <h2>Projects</h2>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byRank"></datatable>
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
      columns: [
        { label: "id", field: "id" },
        { label: "rank", field: "rank" },
        { label: "name", field: "name" },
        { label: "brief", field: "brief", sortable: false },
        { label: "description", field: "desc", sortable: false },
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
    edit(id, event) {
        console.log('Edit Project ' + id);
    }
  }
};
</script>
