<template>
  <section class="home">
    <section class="HomeNavigation">
      <HomeNavigation/>
    </section>
    <section class="HomeStats">
      <SiteManagement/>
      <GeneralInformation/>
      <SiteStatistics />
    </section>
  </section>
</template>

<script>
import HomeNavigation from "@/components/Home/HomeNavigation";
import GeneralInformation from "@/components/Home/GeneralInformation";
import SiteManagement from "@/components/Home/SiteManagement";
import SiteStatistics from "@/components/Home/SiteStatistics";

export default {
  name: "HomeView",
  components: {SiteStatistics, SiteManagement, GeneralInformation, HomeNavigation}
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
  flex-direction: column;
  justify-content: start;
  align-items: center;
  overflow-y: auto;
  padding: 40px;
  gap: 40px;
}

.HomeStats {
  display: flex;
  flex-direction: column;
  justify-content: start;
  align-items: center;
  overflow-y: auto;
  padding: 40px;
  gap: 40px;
}
</style>