<template>
  <div class="p-4 d-flex flex-column">
    <div @click="$emit('close')" class="close-btn"></div>
    <div class="flex-column">
      <form action="/projects" @submit.prevent @keydown="form.errors.clear($event.target.name)">
        <div class="d-flex flex-wrap">
          <div class="form-group flex-grow-1 m-1">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" v-model="form.name" />
            <span
              class="text-danger"
              v-if="form.errors.has(`name`)"
              v-text="form.errors.get(`name`)"
            ></span>
          </div>
          <div class="form-group m-1">
            <label for="rank">Project Rank:</label>
            <input type="number" class="form-control" id="rank" name="rank" v-model="form.rank" />
            <span
              class="text-danger"
              v-if="form.errors.has(`rank`)"
              v-text="form.errors.get(`rank`)"
            ></span>
          </div>
        </div>
        <div class="form-group">
          <div class="d-flex flex-row justify-content-between align-items-center my-1">
            <label>Project Social Links</label>
            <button @click="addSocial" class="btn btn-primary">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div v-for="(social,counter) in form.socials" v-bind:key="'newSocial'+counter">
            <div class="d-flex flex-row justify-content-between align-items-center my-1">
              <label :for="'newSocial'+counter">Add New Social:</label>
              <button @click.prevent="deleteSocial(counter)" class="btn btn-outline-danger">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
            <div class="flex-wrap">
              <input
                type="text"
                class="form-control m-1"
                v-model="social.name"
                placeholder="Name"
                :id="'socials.'+counter+'.name'"
                :name="'socials.'+counter+'.name'"
              />
              <span
                class="text-danger"
                v-if="form.errors.has(`socials.` + counter + `.name`)"
                v-text="form.errors.get(`socials.` + counter + `.name`)"
              ></span>
              <input
                type="text"
                class="form-control m-1"
                v-model="social.ref"
                placeholder="Links to..."
                :id="'socials.'+counter+'.ref'"
                :name="'socials.'+counter+'.ref'"
              />
              <span
                class="text-danger"
                v-if="form.errors.has(`socials.` + counter + `.ref`)"
                v-text="form.errors.get(`socials.` + counter + `.ref`)"
              ></span>
              <input
                type="text"
                class="form-control m-1"
                v-model="social.fa"
                placeholder="Font Awesome Icon... 'fa fas-hashtag'"
                :id="'newSocialIcon'+counter"
                :name="'socials.'+counter+'.fa'"
              />
              <span
                class="text-danger"
                v-if="form.errors.has(`socials.` + counter + `.fa`)"
                v-text="form.errors.get(`socials.` + counter + `.fa`)"
              ></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="d-flex flex-row justify-content-between align-items-center my-1">
            <label for="skill_id">Skills Used</label>
            <button @click="addSkill" class="btn btn-primary">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div v-for="(skill,counter) in form.skills" v-bind:key="'newSkill'+counter">
            <div class="d-flex flex-row justify-content-between align-items-center my-1">
              <label :for="'skills.'+counter">Add New Skill:</label>
              <button @click.prevent="deleteSkill(counter)" class="btn btn-outline-danger">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
            <input
              type="text"
              class="form-control m-1"
              placeholder="Skill Name"
              v-model="skill.name"
              :id="'skills.'+counter+'.name'"
              :name="'skills.'+counter+'.name'"
            />
            <span
              class="text-danger"
              v-if="form.errors.has(`skills.` + counter + `.name`)"
              v-text="form.errors.get(`skills.` + counter + `.name`)"
            ></span>
          </div>
          <label for="skill_id">Existing Skills</label>
          <select
            v-model="form.skill_ids"
            class="form-control"
            name="skill_id"
            id="skill_id"
            multiple
          >
            <option
              v-bind:key="skill.value"
              v-for="skill in skills"
              :value="skill.id"
            >{{skill.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="brief">Project Brief:</label>
          <textarea class="form-control" row="3" id="brief" name="brief" v-model="form.brief"></textarea>
          <span
            class="text-danger"
            v-if="form.errors.has(`brief`)"
            v-text="form.errors.get(`brief`)"
          ></span>
        </div>
        <div class="form-group">
          <label for="desc">Project Description:</label>
          <textarea class="form-control" row="5" id="desc" name="desc" v-model="form.desc"></textarea>
          <span class="text-danger" v-if="form.errors.has(`desc`)" v-text="form.errors.get(`desc`)"></span>
        </div>

        <!--  Existing Images -->
        <div class="d-flex flex-wrap">
          <div
            v-for="(image_id,counter) in form.image_ids"
            v-bind:key="'image'+counter"
            class="img-container"
          >
            <img :src="'storage/images/'+project.images[counter].filename" :width="120" class="rounded m-1" />
            <div class="img-remove">
              <button @click.prevent="deleteImage(counter)" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="desc">Upload Screenshots:</label>
          <input
            class="form-control btn"
            id="image_upload"
            name="image_upload"
            type="file"
            @change="handleImages($event)"
            multiple
          />
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
  name: "ProjectForm",
  props: ["project"],
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        rank: "",
        brief: "",
        desc: "",
        socials: [],
        skills: [],
        images: [],
        social_ids: [],
        image_ids: [],
        skill_ids: []
      }),
      social: {
        name: "",
        ref: "",
        fa: ""
      },
      skills: [],
      skill: {
        id: "",
        name: ""
      }
    };
  },
  mounted() {
    console.log("Mounted");
    if (
      this.project !== null &&
      this.project !== "" &&
      this.project !== {} &&
      this.project !== undefined
    ) {
      console.log("Project Recieved.");
      this.form.id = this.project.id;
      this.form.name = this.project.name;
      this.form.rank = this.project.rank;
      this.form.brief = this.project.brief;
      this.form.desc = this.project.desc;
      this.form.social_ids = this.project.socials.map(x => x.id);
      this.form.skill_ids = this.project.skills.map(x => x.id);
      this.form.image_ids = this.project.images.map(x => x.id);
    }
  },
  created() {
    this.fetchSkills();
  },
  methods: {
    fetchSkills(url) {
      url = "/skills";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.skills = res;
        })
        .catch(err => console.log(err));
    },
    addSkill() {
      this.form.skills.push({
        name: ""
      });
    },
    deleteSkill(i) {
      this.form.skills.splice(i, 1);
    },
    addSocial() {
      this.form.socials.push({
        name: "",
        ref: "",
        fa: ""
      });
    },
    deleteSocial(i) {
      this.form.socials.splice(i, 1);
    },
    deleteImage(i) {
      this.form.image_ids.splice(i, 1);
    },
    handleImages(e) {
      this.form.images = e.target.files;
    },
    submit() {
      if (this.project === undefined) {
        this.form
          .post("/projects")
          .then(() => {
              this.$emit("close");
          });
      } else {
        this.form
          .patch("/projects/" + this.project.id)
          .then(() => {
              this.$emit('close');
          });
      }
    }
  }
};
</script>
