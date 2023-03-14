<template>
  <section class="form_container">
    <div class="authentication_header">
      <button @click="wentRegister = false">Connexion</button>
      <button @click="wentRegister = true">Inscription</button>
    </div>

    <transition name="bounce">
      <ConnectionForm v-if="!wentRegister"/>
    </transition>

    <transition name="bounce">
      <RegisterForm v-if="wentRegister"/>
    </transition>
  </section>
</template>

<script>
import RegisterForm from "@/components/Authentication/RegisterForm";
import ConnectionForm from "@/components/Authentication/ConnectionForm";

export default {
  name: "AuthenticationView",
  components: {ConnectionForm, RegisterForm},
  data: () => {
    return {
      wentRegister: false
    }
  }
}
</script>

<style scoped>
.authentication_header {
  display: flex;
  justify-content: space-between;
}

button {
  border: none;
  background: transparent;
  font-family: 'Readex Pro', sans-serif;
  font-weight: bolder;
  font-size: 1.875rem;
  color: black;
}

button:hover {
  color: #B3145E;
}


.enter-form {
  opacity: 0;
}

.enter-to {
  opacity: 1;
}

.enter-active {
  transition: opacity 1s ease-in-out;
}
</style>