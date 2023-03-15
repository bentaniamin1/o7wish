<template>
  <section class="form_container">
    <div class="form">
      <h1>Gérer votre nom de domaine</h1>
      <DomaineForm />
    </div>
  </section>
  <section class="table_container">
    <div class="table">
      <h1>Votre domaine</h1>
      <DomainsList />
    </div>
  </section>
</template>

<script>
import DomainsList from "@/components/Domains/DomainsList";
import DomaineForm from "@/components/Domains/DomainsForm";
export default {
  name: "DomainsView",
  components: {DomaineForm, DomainsList}
}
</script>

<style scoped>

</style>