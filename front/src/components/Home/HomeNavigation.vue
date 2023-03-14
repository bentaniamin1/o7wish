<template>
  <nav>
    <ul>
      <li><a>Accueil</a></li>
      <li><a>Connextion</a></li>
      <li><a>Contact</a></li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "HomeNavigation"
}
</script>

<style lang="css" scoped>
nav {
  font-size: 1.1rem;
  text-align: center;
  border: 1px solid rgba(0, 0, 0, 5);
  border-radius: 10px;
  padding: 15px;

}

ul {
  padding: 0;
  display: inline;
}

li {
  list-style-type: none;
  display: inline;
  margin: 10px;
}

li:hover {
  font-weight: bold;
}

header {
  text-align: center;
  background-color: #1D1D1D;
  color: white;
  padding-bottom: 30px;
}

h1 {
  text-align: center;
  font-family: 'Open Sans', sans-serif;
  font-weight: bold;
  padding-top: 30px;
  margin-top: 0;
}

h2 {
  text-align: center;
  font-family: Arial, Helvetica, sans-serif, sans-serif;
  font-weight: bold;
  font-size: 1.5rem;
  width: 400px;
  margin: auto;
}

.separator {
  width: 40px;
  height: 1px;
  margin: 15px auto;
  display: block;
  background: #999;
}

</style>
