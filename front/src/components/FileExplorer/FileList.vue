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
        { 
          name: 'folder1',
          type: 'folder',
          path: "/folder1",
          children: [
            {
              name: "file2.txt",
              type: "file",
              path: "/folder1/file2.txt",
            },
          ],
        },
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
  