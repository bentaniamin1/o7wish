<template>
    <div>
      <h2>{{ currentPath }}</h2>
      <ul>
        <li v-for="file in files" :key="file.name">
          <span>{{ file.name }}</span>
          <span v-if="file.type === 'folder'" @click="handleFolderClick(file)">[open]</span>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    name: 'FileList',
    props: {
      currentPath: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        files: [
        { name: 'folder1', type: 'folder' },
        { name: 'file1.txt', type: 'file' },
        ],
      };
    },
    mounted() {
      this.updateFiles();
    },
    watch: {
      currentPath() {
        this.updateFiles();
      },
    },
    methods: {
      updateFiles() {
        this.files = this.$parent.getFiles(this.currentPath);
      },
      handleFolderClick(folder) {
        this.$parent.handleFolderClick(folder);
      },
    },
  };
  </script>
  