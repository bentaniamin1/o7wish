<template>
  <section>
    <div @dragenter.prevent="toggleActive"
         @dragleave.prevent="toggleActive"
         @dragover.prevent
         @drop.prevent="drop"
         class="upload-container"
         :class="{'upload-container-activer': active}"
    >
      <input @change="dropButton" type="file" id="upload-button" multiple accept=".zip,.rar,.7zip">
      <label for="upload-button">
        <UploadFile/>
        Choisi ou envoie ton fichier
      </label>
    </div>
    <div>
      <p>Fichier : {{ file.name }}</p>
    </div>
    <div>
      <button @click="upload">Envoyer</button>
    </div>
  </section>
</template>

<script>
import UploadFile from "@/assets/Picto/UploadFile";
import useUploadSite from "@/axios/hooks/useUploadSite";

const useNewUploadSite = useUploadSite()

export default {
  name: "UploadSiteForm",
  components: {UploadFile},
  data: () => {
    return {
      file: '',
      active: false,
    }
  }, methods: {
    toggleActive() {
      this.active = !this.active
    },
    drop(e) {
      this.active = false
      this.file = e.dataTransfer.files[0]
      console.log( e.dataTransfer.files[0])
    },
    dropButton(e) {
      this.active = false
      this.file = e.target.files[0]
    },
    upload() {
      let formData = new FormData();
      formData.append("file", this.file);
      console.log(this.file)
      useNewUploadSite(formData);
    }
  }
}
</script>

<style scoped>
section {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.upload-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 200px;
  border-radius: 10px;
  box-shadow: inset 0 1px 10px -1px rgba(0, 0, 0, 0.25);

  transition: .2s ease-in-out;
}
.upload-container:hover {
  cursor: pointer;
  box-shadow: inset 0 1px 10px -1px rgba(0, 0, 0, 1);
  background: #B3145E;
  color: white;
  file: white;
}

.upload-container-activer {
  box-shadow: inset 0 1px 10px -1px rgba(0, 0, 0, 1);
  background: #B3145E;
  color: white;
  file: white;
}

input[type='file'] {
  display: none;
}

label {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  width: 100%;
  height: 100%;
}
label:hover {
  cursor: pointer;
}
</style>