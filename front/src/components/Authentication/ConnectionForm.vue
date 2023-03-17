<template>
  <form v-on:submit.prevent="login" action="" method="get" class="">
    <div class="form_label_groupe">
      <input type="text" name="pseudo" id="pseudo" v-model="this.pseudo" placeholder="Votre email" required>
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
import useLogin from "@/axios/hooks/useLogin";
import router from "@/router";

const useNewLogin = useLogin()

export default {
  name: "ConnectionForm",
  data: () => {
    return {
      pseudo: '',
      password: '',
      error: false,
      success: false,
      my_cookie_value: "",
    }
  },methods: {
    login() {
      const auth = {pseudo: this.pseudo, password: this.password};
      this.success = false;
      this.error = false;
      try {
        console.log(auth)
        useNewLogin(auth);
        router.push({ path: '/' })
        this.success = true;
      } catch (err) {
        this.error = err.message;
      }
    }
  }
}

</script>

<style scoped>

</style>