<template>
  <form action="" method="get" class="">
    <div class="form_label_groupe">
      <input type="text" name="name" id="name" placeholder="Votre nom" required>
    </div>
    <div class="form_label_groupe">
      <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
    </div>
    <div class="form_label_groupe">
      <button type="submit" value="">Connexion</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "ConnectionForm"
}
</script>

<style scoped>

</style>