<template>
  <div class="p-4 d-flex flex-column">
    <div @click="$emit('close')" class="close-btn"></div>
    <div class="flex-column">
      <form action="/experiences" @submit.prevent @keydown="form.errors.clear($event.target.name)">
        <div class="d-flex flex-wrap">
          <div class="form-group flex-grow-1 m-1">
            <label for="name">Experience Name:</label>
            <input type="text" class="form-control" id="name" name="name" v-model="form.name" />
            <span
              class="text-danger"
              v-if="form.errors.has(`name`)"
              v-text="form.errors.get(`name`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="location">Experience Location:</label>
            <input
              type="text"
              class="form-control"
              id="location"
              name="location"
              v-model="form.location"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`location`)"
              v-text="form.errors.get(`location`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="start_at">Start Date</label>
            <input
              type="date"
              class="form-control"
              id="start_at"
              name="start_at"
              v-model="form.start_at"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`start_at`)"
              v-text="form.errors.get(`start_at`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="end_at">End Date (leave blank for present):</label>
            <input type="date" class="form-control" id="end_at" name="end_at" v-model="form.end_at" />
            <span
              class="text-danger"
              v-if="form.errors.has(`end_at`)"
              v-text="form.errors.get(`end_at`)"
            ></span>
          </div>
        </div>
        <div class="form-group m-1">
          <label for="desc">Experience Description:</label>
          <tiptapeditor :data.sync="form.desc"></tiptapeditor>
          <span class="text-danger" v-if="form.errors.has(`desc`)" v-text="form.errors.get(`desc`)"></span>
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
import TipTapEditor from "./TipTapEditor";

export default {
  name: "ExperienceForm",
  props: ["experience"],
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        desc: "",
        location: "",
        start_at: "",
        end_at: ""
      })
    };
  },
  created() {
    if (
      this.experience !== null &&
      this.experience !== "" &&
      this.experience !== {} &&
      this.experience !== undefined
    ) {
      console.log("Experience Recieved.");
      this.form.id = this.experience.id;
      this.form.name = this.experience.name;
      this.form.desc = this.experience.desc;
      this.form.location = this.experience.location;
      this.form.start_at = this.experience.start_at;
      this.form.end_at = this.experience.end_at;
    }
  },
  methods: {
    submit() {
      if (this.experience === undefined) {
        this.form.post("/experiences").then(() => {
          this.$emit("close");
        });
      } else {
        this.form.patch("/experiences/" + this.experience.id).then(() => {
          this.$emit("close");
        });
      }
    }
  }
};
</script>
