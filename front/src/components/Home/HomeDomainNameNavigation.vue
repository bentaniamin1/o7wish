<template>
  <div class="home_box">
    <h1>Fichiers</h1>
    <router-link  class="link_sub_box" to="/domaine">
      <DomainPrincipal />
      <h3>gestion du nom de domaine</h3>
    </router-link>
    <router-link  class="link_sub_box" to="/sous-domaine">
      <SubDomain />
      <h3>Gestion des sous-domaines</h3>
    </router-link>
    <router-link  class="link_sub_box" to="/">
      <DNS />
      <h3>Gestion du DNS</h3>
    </router-link>
  </div>
</template>

<script>
import SubDomain from "@/assets/Picto/SubDomain";
import DNS from "@/assets/Picto/DNS";
import DomainPrincipal from "@/assets/Picto/DomainPrincipal";
export default {
  name: "HomeDomainNameNavigation",
  components: {DomainPrincipal, DNS, SubDomain}
}
</script>

<style scoped>
</style>
