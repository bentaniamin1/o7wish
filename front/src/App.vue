<template>
  <header>
    <nav>
      <router-link to="/">Home</router-link>
      |
      <router-link to="/authentification">Authentification</router-link>
      |
      <router-link to="/ftp">Ftp Form</router-link>
      |
      <router-link to="/sous-domaine">Sous-domain</router-link>
      |
      <router-link to="/webftp">Web FTP</router-link>
    </nav>
  </header>
  <main>
    <router-view/>
  </main>
</template>

<script>

export default {
  name: "App",
  data: () => {
    return {
    }
  },
}

</script>

<style>
@import "assets/styles/reset.css";
@import "./assets/styles/form_style.scss";
@import "./assets/styles/table_style.scss";
@import "./assets/styles/home_style.scss";
@import url('https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&display=swap');

body {
  background: #F9F9F9;
}

main {
  overflow-x: hidden;
  font-family: 'Readex Pro', sans-serif;
  font-weight: bold;
  font-size: 1.125rem;

}
h1 {
  font-family: 'Readex Pro', sans-serif;
  font-weight: bolder;
  font-size: 1.875rem;
  color: black;
  margin-bottom: 10px;
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

input, select {
  font-family: 'Readex Pro', sans-serif;
  font-weight: bold;
  font-size: 1.125rem;
}
</style>
<!-- test -->