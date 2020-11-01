<template>
  <div class="row app-row">
    <div class="col-lg-2 col-sm-12">
      <toolbar></toolbar>
    </div>
    <div class="col-lg-10 col-sm-12">
    </div>
  </div>
</template>

<script>
  import Toolbar from "../components/Toolbar";

  export default {
    name: "Dashboard",
    components: {
      Toolbar
    }
  }
</script>

<style scoped>

</style>