<template>
  <div class="section-cont p-4">
    <h2>Experiences</h2>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byStartDesc"></datatable>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Experience Component Mounted.");
  },
  computed: {
    byStartDesc: function() {
      return _.orderBy(this.experiences, "start_at", "desc");
    }
  },
  data() {
    return {
      columns: [
        { label: "id", field: "id" },
        { label: "name", field: "name" },
        { label: "description", field: "desc", sortable: false },
        { label: "location", field: "location", sortable: false },
        { label: "start at", field: "start_at" },
        { label: "end at", field: "end_at" }
      ],
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
  methods: {
    fetchExperiences(url) {
      url = "/experiences";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.experiences = res;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
