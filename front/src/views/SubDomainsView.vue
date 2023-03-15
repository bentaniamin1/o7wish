<template>
  <section class="form_container">
    <div class="form">
      <h1>Ajouter un Sous-domaine</h1>
      <SubDomaineForm />
    </div>
  </section>
  <section class="table_container">
    <div class="table">
      <h1>Vos Sous-domaine</h1>
      <SubDomainsList />
    </div>
  </section>
</template>

<script>
import SubDomaineForm from "@/components/SubDomains/SubDomainsForm";
import SubDomainsList from "@/components/SubDomains/SubDomainsList";
export default {
  name: "SubDomainsView",
  components: {SubDomainsList, SubDomaineForm}
}
</script>

<style scoped>

</style>