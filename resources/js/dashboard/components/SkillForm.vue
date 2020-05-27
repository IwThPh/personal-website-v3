<template>
  <div class="p-4 d-flex flex-column">
    <div @click="$emit('close')" class="close-btn"></div>
    <div class="flex-column">
      <form action="/skills" @submit.prevent @keydown="form.errors.clear($event.target.name)">
        <div class="d-flex flex-wrap">
          <div class="form-group flex-grow-1 m-1">
            <label for="name">Skill Name:</label>
            <input type="text" class="form-control" id="name" name="name" v-model="form.name" />
            <span
              class="text-danger"
              v-if="form.errors.has(`name`)"
              v-text="form.errors.get(`name`)"
            ></span>
          </div>
          </div>
        <div class="form-group text-right">
          <button @click.prevent="submit()" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import Form from "../../scripts/form";

export default {
  name: "SkillForm",
  props: ["skill"],
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
      })
    };
  },
  mounted() {
    console.log("Mounted");
    if (
      this.skill !== null &&
      this.skill !== "" &&
      this.skill !== {} &&
      this.skill !== undefined
    ) {
      console.log("Skill Recieved.");
      this.form.id = this.skill.id;
      this.form.name = this.skill.name;
    }
  },
  methods: {
    submit() {
      if (this.skill === undefined) {
        this.form.post("/skills").then(() => {
          this.$emit("close");
        });
      } else {
        this.form.patch("/skills/" + this.skill.id).then(() => {
          this.$emit("close");
        });
      }
    }
  }
};
</script>
