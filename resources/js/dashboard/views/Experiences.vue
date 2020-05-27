<template>
  <div class="section-cont p-4">
    <div class="d-flex flex-row justify-content-between m-1">
      <h2>Experiences</h2>
      <div class="d-flex flex-row p-1">
        <button @click="show()" class="btn btn-primary m-1">
          <i class="fas fa-plus"></i>
        </button>
        <input
          type="number"
          class="form-control input-lg m-1"
          id="idSelect"
          placeholder="Experience ID"
          v-model="experience_id"
        />
        <button @click="show(experience_id)" class="btn btn-outline-primary m-1">
          <i class="far fa-edit"></i>
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byStartDesc"></datatable>
    </div>
  </div>
</template>

<script>
import ExperienceForm from '../components/ExperienceForm';

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
    },
    show(id) {
      this.$modal.show(
        ExperienceForm,
        {
          experience: _.find(this.experiences, function(o) { return o.id == id; }),
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
