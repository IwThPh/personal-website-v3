<template>
  <div class="section-cont p-4">
    <div class="d-flex flex-row justify-content-between m-1">
      <h2>Socials</h2>
      <div class="d-flex flex-row p-1">
        <button @click="show()" class="btn btn-primary m-1">
          <i class="fas fa-plus"></i>
        </button>
        <input
          type="number"
          class="form-control input-lg m-1"
          id="idSelect"
          placeholder="Social ID"
          v-model="social_id"
        />
        <button @click="show(social_id)" class="btn btn-outline-primary m-1">
          <i class="far fa-edit"></i>
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byID"></datatable>
    </div>
  </div>
</template>

<script>
import SocialForm from '../components/SocialForm';

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
    },
    show(id) {
      this.$modal.show(
        SocialForm,
        {
          social: _.find(this.socials, function(o) { return o.id == id; }),
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
