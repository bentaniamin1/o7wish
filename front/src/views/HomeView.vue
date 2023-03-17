<template>
  <section class="home">
    <section class="HomeNavigation">
      <h1>Espace Technique </h1>
      <HomeFilesNavigation/>
      <HomeDatabasesNavigation/>
      <HomeDomainNameNavigation/>
    </section>
    <section class="HomeStats">
      <SiteManagement/>
      <GeneralInformation/>
      <SiteStatistics/>
    </section>
  </section>
</template>

<script>
import GeneralInformation from "@/components/Home/GeneralInformation";
import SiteManagement from "@/components/Home/SiteManagement";
import SiteStatistics from "@/components/Home/SiteStatistics";
import HomeDatabasesNavigation from "@/components/Home/HomeDatabasesNavigation";
import HomeFilesNavigation from "@/components/Home/HomeFilesNavigation";
import HomeDomainNameNavigation from "@/components/Home/HomeDomainNameNavigation";
import {useCookies} from "vue3-cookies";
import router from "@/router";


export default {
  name: "HomeView",
  components: {
    HomeDomainNameNavigation,
    HomeFilesNavigation, HomeDatabasesNavigation, SiteStatistics, SiteManagement, GeneralInformation
  },
  data: () => {
    return {
      user: "",
    }
  },setup() {
    const { cookies } = useCookies();
    return { cookies };
  },

  mounted() {
    let my_cookie_value = this.cookies.get('o7wishJWT')
    if (!my_cookie_value) {
      router.push({ path: '/authentification' })
    }
  }
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