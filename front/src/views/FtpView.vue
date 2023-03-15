<template>
  <section class="form_container">
    <div class="form">
      <h1>Ajouter un compte FTP</h1>
      <FtpForm />
    </div>
  </section>
</template>

<script>
import FtpForm from "@/components/Ftp/FtpForm";
export default {
  name: "FtpView",
  components: {FtpForm}
}
</script>

<style scoped>

</style>