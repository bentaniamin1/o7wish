<template>
  <section class="form_container">
    <div class="form">
      <h1>Ajouter votre site</h1>
      <UploadSiteForm />
    </div>
  </section>
</template>

<script>
import UploadSiteForm from "@/components/UploadSite/UploadSiteForm";
export default {
  name: "UploadSiteView",
  components: {UploadSiteForm},
}
</script>

<style scoped>

</style>