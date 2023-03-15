<template>
  <form action="" method="get" class="">
    <div class="form_label_groupe">
      <input type="email" name="email" id="email" v-model="this.email" placeholder="Votre email" required>
    </div>
    <div class="form_label_groupe">
      <input type="password" name="password" id="password" v-model="this.password" placeholder="Votre mot de passe"
             required>
    </div>
    <div class="form_label_groupe">
      <button type="submit" value="">Connexion</button>
    </div>
  </form>
</template>

<script>

export default {
  name: "ConnectionForm",
  data: () => {
    return {
      pseudo: '',
      email: '',
      password: '',
      error: false,
      success: false
    }
  }
}

</script>

<style scoped>

</style>