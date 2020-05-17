<template>
  <div class="section-cont p-4">
    <h2>Images</h2>
    <div class="table-responsive">
      <datatable :columns="columns" :data="byID"></datatable>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Image Component Mounted.");
  },
  computed: {
    byID: function() {
      return _.orderBy(this.images, "id", "asc");
    }
  },
  data() {
    return {
      columns: [
        { label: "id", field: "id" },
        { label: "filename", field: "filename" },
        { label: "name", field: "name" },
        { label: "width", field: "width", sortable: false },
        { label: "height", field: "height", sortable: false },
      ],
      images: [],
      image: {
        id: "",
        filename: "",
        height: "",
        width: "",
        name: "",
      },
      image_id: ""
    };
  },

  created() {
    this.fetchImages();
  },
  methods: {
    fetchImages(url) {
      url = "/imageables";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.images = res;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
