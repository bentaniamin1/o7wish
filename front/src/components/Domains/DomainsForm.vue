<template>
  <form action="" method="get" class="">
    <div class="form_label_groupe">
      <input type="text" name="subdomains" id="subdomains" placeholder="Nom de domaine" required>
    </div>
    <div class="form_label_groupe">
      <label for="directory">/home/username/</label>
      <input type="password" name="directory" id="directory" placeholder="Répertoire" required>
    </div>
    <div class="form_label_groupe">
      <button type="submit" value="">Créer</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "DomaineForm"
}
</script>

<style scoped>

</style>