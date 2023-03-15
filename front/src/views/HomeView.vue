<template>
  <section class="home">
    <section class="HomeNavigation">
      <HomeNavigation/>
    </section>
    <section class="HomeStats">
        <GeneralInformation />
    </section>
  </section>
</template>

<script>
import HomeNavigation from "@/components/Home/HomeNavigation";
import GeneralInformation from "@/components/Home/GeneralInformation";

export default {
  name: "HomeView",
  components: {GeneralInformation, HomeNavigation}
}
</script>

<style scoped>
.home {
  display: grid;
  grid-template-columns: 1fr .5fr;
  width: 100%;
  height: 100vh;
}
.HomeNavigation {
  display: flex;
  justify-content: center;
  align-items: start;
  overflow-y: auto;
  padding: 40px;
}
.HomeStats {
  display: flex;
  justify-content: center;
  align-items: start;
  overflow-y: auto;
  padding: 40px;
}
</style>