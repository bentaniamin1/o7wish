<template>
  <section class="form_container">
    <div class="form">
      <div class="authentication_header">
        <button @click="wentRegister = false">Connexion</button>
        <button @click="wentRegister = true">Inscription</button>
      </div>
      <transition-group name="bounce">
        <ConnectionForm v-if="!wentRegister"/>
        <RegisterForm v-if="wentRegister"/>
      </transition-group>
    </div>
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


.bounce-enter-active {
  animation: slideleft 0.5s;
}

.bounce-leave-active {
  transform: translateX(-100%);
}

@keyframes slideleft {
  0% {
    opacity: 0;
    transform: translatey(-100%);
  }
  50% {
    transform: translatey(20%);
  }
  100% {
    opacity: 100%;
    transform: translatey(0);
  }
}

</style>