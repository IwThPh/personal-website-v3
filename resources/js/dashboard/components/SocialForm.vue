<template>
  <div class="p-4 d-flex flex-column">
    <div @click="$emit('close')" class="close-btn"></div>
    <div class="flex-column">
      <form action="/socials" @submit.prevent @keydown="form.errors.clear($event.target.name)">
        <div class="d-flex flex-wrap">
          <div class="form-group flex-grow-1 m-1">
            <label for="name">Social Name:</label>
            <input type="text" class="form-control" id="name" name="name" v-model="form.name" />
            <span
              class="text-danger"
              v-if="form.errors.has(`name`)"
              v-text="form.errors.get(`name`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="ref">Social Link:</label>
            <input
              type="text"
              class="form-control"
              id="ref"
              name="ref"
              v-model="form.ref"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`ref`)"
              v-text="form.errors.get(`ref`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="fa">Social Symbol:</label>
            <input
              type="text"
              class="form-control"
              id="fa"
              name="fa"
              v-model="form.fa"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`fa`)"
              v-text="form.errors.get(`fa`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="project_id">Associate Project ID:</label>
            <input
              type="number"
              class="form-control"
              id="project_id"
              name="project_id"
              v-model="form.project_id"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`project_id`)"
              v-text="form.errors.get(`project_id`)"
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
  name: "SocialForm",
  props: ["social"],
  data() {
    return {
      form: new Form({
        id: "",
        project_id: "",
        name: "",
        ref: "",
        fa: "",

      })
    };
  },
  mounted() {
    console.log("Mounted");
    if (
      this.social !== null &&
      this.social !== "" &&
      this.social !== {} &&
      this.social !== undefined
    ) {
      console.log("Social Recieved.");
      this.form.id = this.social.id;
      this.form.project_id = this.social.project_id;
      this.form.name = this.social.name;
      this.form.ref = this.social.ref;
      this.form.fa = this.social.fa;
    }
  },
  methods: {
    submit() {
      if (this.social === undefined) {
        this.form.post("/socials").then(() => {
          this.$emit("close");
        });
      } else {
        this.form.patch("/socials/" + this.social.id).then(() => {
          this.$emit("close");
        });
      }
    }
  }
};
</script>
