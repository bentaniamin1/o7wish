<template>
  <div class="home_box">
    <h1>Fichiers</h1>
    <router-link  class="link_sub_box" to="/webftp">
      <WebFTP />
      <h3>Web FTP</h3>
    </router-link>
  </div>
</template>

<script>
import WebFTP from "@/assets/Picto/WebFTP";
export default {
  name: "HomeFilesNavigation",
  components: {WebFTP}
}
</script>

<style scoped>
</style>
