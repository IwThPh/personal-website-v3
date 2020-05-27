<template>
  <div class="section-cont p-4">
    <div class="d-flex flex-row justify-content-between m-1">
      <h2>Skills</h2>
      <div class="d-flex flex-row p-1">
        <button @click="show()" class="btn btn-primary m-1">
          <i class="fas fa-plus"></i>
        </button>
        <input
          type="number"
          class="form-control input-lg m-1"
          id="idSelect"
          placeholder="Skill ID"
          v-model="skill_id"
        />
        <button @click="show(skill_id)" class="btn btn-outline-primary m-1">
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
import SkillForm from '../components/SkillForm';

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
        { label: "name", field: "name" }
      ],
      skills: [],
      skill: {
        id: "",
        name: ""
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
    },
    show(id) {
      this.$modal.show(
        SkillForm,
        {
          skill: _.find(this.skills, function(o) {
            return o.id == id;
          })
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
