<template>
    <div>
      <h1>File Explorer</h1>
      <FileList :current-path="currentPath" />
    </div>
  </template>
  
  <script>
  import FileList from './FileList.vue';
  
  export default {
    name: 'FileExplorer',
    components: {
      FileList,
    },
    data() {
      return {
        currentPath: '/',
      };
    },
    methods: {
    //   getFiles(path) {
    //     // TODO Récup les fichiers
    //   },
      handleFolderClick(folder) {
        this.currentPath = folder.path;
      },
    },
  };
  </script>
  