<template>
  <div class="home_box">
    <h1>Gestion du site</h1>
    <div class="home_sub_box">
      <h3>Mise en ligne</h3>
      <VueToggleBtn></VueToggleBtn>
    </div>
  </div>
</template>

<script>
import VueToggleBtn from 'vue-toggle-btn';

export default {
  name: "SiteManagement",
  components: {
    VueToggleBtn
  }
}
</script>

<style lang="css" scoped>

.box {
  background: #fff;
  padding: 8px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 300px;
}

</style>
