<template>
  <div class="section-cont p-4">
    <h2>Skills</h2>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byID"></datatable>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Skill Component Mounted.");
  },
  computed: {
    byID: function() {
      return _.orderBy(this.skills, "id", "asc");
    }
  },
  data() {
    return {
      columns: [
        { label: "id", field: "id" },
        { label: "name", field: "name" },
      ],
      skills: [],
      skill: {
        id: "",
        name: "",
      },
      skill_id: ""
    };
  },

  created() {
    this.fetchskills();
  },
  methods: {
    fetchskills(url) {
      url = "/skills";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.skills = res;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
