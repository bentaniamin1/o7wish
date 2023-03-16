<template>
  <form v-on:submit.prevent="singin" action="" method="get" class="">
    <div class="form_label_groupe">
      <input type="text" name="pseudo" id="pseudo" v-model="this.pseudo" placeholder="Votre nom" required>
    </div>
    <div class="form_label_groupe">
      <input type="email" name="email" id="email" v-model="this.email" placeholder="Votre email" required>
    </div>
    <div class="form_label_groupe">
      <input type="password" name="password" id="password" v-model="this.password" placeholder="Votre mot de passe"
             required>
    </div>
    <div class="form_label_groupe">
      <button type="submit" value="">Inscription</button>
    </div>
    <div v-if="this.error" class="form_label_groupe">
      <p>{{ this.error }}</p>
    </div>

  </form>
</template>

<script>
import useRegister from "@/axios/hooks/useRegister";
import router from "@/router";
const useNewRegister = useRegister()
export default {
  name: "RegisterForm",
  data: () => {
    return {
      pseudo: '',
      email: '',
      password: '',
      error: false,
      success: false
    }
  },methods: {
    singin() {
      const auth = {pseudo: this.pseudo, email: this.email, password: this.password};
      this.success = false;
      this.error = false;
      try {
        console.log(auth)
        useNewRegister(auth);
        localStorage.pseudoUser = this.pseudo;
        localStorage.emailUser = this.email;
        localStorage.passwordUser = this.password;
        this.success = true;
        router.push({ path: '/' })
      } catch (err) {
        this.error = err.message;
      }
    }
  }
}


</script>

<style scoped>

</style>