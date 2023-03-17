<template>
  <form  v-on:submit.prevent="createUser" method="get" class="">
    <div class="form_label_groupe">
      <input type="text" name="username" id="username" v-model="this.username" placeholder="Nom d'utilisateur" required>
    </div>
    <div class="form_label_groupe">
      <input type="password" name="password" id="password"  v-model="this.password" placeholder="Mot de passe" required>
    </div>
    <div class="form_label_groupe">
      <label for="projectName">/home/username/</label>
      <input type="text" name="projectName" id="projectName" v-model="this.projectName" placeholder="Nom du projet" required>
    </div>
    <div class="form_label_groupe">
      <button type="submit" value="">Créer un FTP</button>
    </div>
  </form>
</template>

<script>
import router from "@/router";
import useCreateVmUser from "@/axios/hooks/useCreateVmUser";
import {useCookies} from "vue3-cookies";

const useRegisterVmUser = useCreateVmUser()

export default {
  name: "FtpForm",
  data: () => {
    return {
      username: '',
      password: '',
      projectName: '',
      myJWT: '',
    }
  },setup() {
    const { cookies } = useCookies();
    return { cookies };
  }, methods: {
    createUser() {
      this.myJWT = this.cookies.get('o7wishJWT')
      const auth = {username: this.username, password: this.password, projectName: this.projectName, myJWT: this.myJWT}
      try {
        console.log(auth)
        useRegisterVmUser(auth);
        router.push({path: '/'})
      } catch (err) {
        this.error = err.message;
      }
    }
  }
}
</script>

<style scoped>

</style>