<template>
  <div class="home_box">
    <h1>Information général</h1>
    <div class="home_sub_box">
      <h3>Utilisateur actuel</h3>
      <p>{{ this.user.pseudo }}</p>
    </div>
  </div>
</template>

<script>

export default {
  name: "GeneralInformation",
  data: () => {
    return {
      user: "",
    }
  },
  async mounted() {
    if (localStorage.pseudoUser) {
      this.user = {
        pseudo: localStorage.pseudoUser,
        email: localStorage.emailUser,
        password: localStorage.passwordUser
      }
    }
  }
}

</script>

<style lang="css" scoped>

.box {
  background: #fff;
  padding: 8px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 300px;
}

</style>
