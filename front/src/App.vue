<template>
  <header>

  </header>
  <main>
    <WebFtpViewVue />
  </main>
  <footer>

  </footer>
</template>

<script>
import WebFtpViewVue from './views/WebFtpView.vue';

export default {
  name: 'App',
  components: {
    WebFtpViewVue
  }
}
</script>

<style>
@import "./assets/styles/form_style.scss";
@import "assets/styles/reset.css";
@import url('https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&display=swap');

main {
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  font-family: 'Readex Pro', sans-serif;
  font-weight: bold;
  font-size: 1.5rem;
}

button {
  background: #B3145E;
  color: white;
  border-radius: 10px;
  padding: 10px;
  font-family: 'Readex Pro', sans-serif;
  font-weight: bold;
  font-size: 1.125rem;
}
button:hover {
  cursor: pointer;
}
input {
  font-family: 'Readex Pro', sans-serif;
  font-weight: bold;
  font-size: 1.125rem;
}
</style>
