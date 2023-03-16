<template>
  <div class="home_box">
    <h1>Bases de données</h1>
    <router-link  class="link_sub_box" to="/ftp">
      <DataBase />
      <h3>Gestion de la base de données</h3>
    </router-link>
    <router-link  class="link_sub_box" to="/upload-site">
      <DataBase />
      <h3>Upload le site</h3>
    </router-link>
  </div>
</template>

<script>
import DataBase from "@/assets/Picto/DataBase";
export default {
  name: "HomeDatabasesNavigation",
  components: {DataBase}
}
</script>

<style scoped>
</style>
