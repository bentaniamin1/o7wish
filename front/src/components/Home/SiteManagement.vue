<template>
  <div class="home_box">
    <h1>Gestion du site</h1>
    <div class="home_sub_box">
      <h3>Mise en ligne</h3>
      <div class="toggle_button_container"
           @click="isPutOnLine = !isPutOnLine"
           :class="{'toggle_button_container-active' : isPutOnLine}"
      >
        <span class="toggle_button"
              :class="{'toggle_button-active' : isPutOnLine}"
        ></span>
      </div>
    </div>
    <div class="home_sub_box">
      <h3>Minifier les images</h3>
      <div class="toggle_button_container"
           @click="isMinimizeImages = !isMinimizeImages"
           :class="{'toggle_button_container-active' : isMinimizeImages}"
      >
        <span class="toggle_button"
              :class="{'toggle_button-active' : isMinimizeImages}"
        ></span>
      </div>
    </div>
    <div class="home_sub_box">
      <h3>Activer le cache</h3>
      <div class="toggle_button_container"
           @click="isActivateCache = !isActivateCache"
           :class="{'toggle_button_container-active' : isActivateCache}"
      >
        <span class="toggle_button"
              :class="{'toggle_button-active' : isActivateCache}"
        ></span>
      </div>
    </div>
    <div class="home_sub_box">
      <h3>Activer le cache</h3>
      <button>Reset le cache</button>
    </div>
  </div>
</template>

<script>

export default {
  name: "SiteManagement",
  data: () => {
    return {
      isPutOnLine: false,
      isMinimizeImages: false,
      isActivateCache: true,
    }
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
