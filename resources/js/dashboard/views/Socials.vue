<template>
  <div class="section-cont p-4">
    <h2>Socials</h2>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byID"></datatable>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Social Component Mounted.");
  },
  computed: {
    byID: function() {
      return _.orderBy(this.socials, "id", "asc");
    }
  },
  data() {
    return {
      columns: [
        { label: "id", field: "id" },
        { label: "project id", field: "project_id" },
        { label: "name", field: "name" },
        { label: "ref",representedAs: ({ref}) => `<a href=${ref}>${ref}</a>`, interpolate: true, sortable: false },
        { label: "icon",representedAs: ({fa}) => `<i class="${fa}"></i>`, interpolate: true, sortable: false },
      ],
      socials: [],
      social: {
        id: "",
        project_id: "",
        name: "",
        ref: "",
        fa: "",
      },
      social_id: ""
    };
  },

  created() {
    this.fetchsocials();
  },
  methods: {
    fetchsocials(url) {
      url = "/socials";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.socials = res;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
