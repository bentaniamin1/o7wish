
<template>
    <section class="webFtp_section">
        <header class="webFtp_header">
            <div class="webFtp_header_left">
                <figure>
                    <img src="" alt="">
                </figure>
            </div>
            <button>Reset le cache</button>
        </header>
        
        <div class="explorer">
            <FileExplorer/>
        </div>
    </section>
</template>

<script>
// import FileList from '@/components/FileList.vue';

import FileExplorer from '@/components/FileExplorer/FileExplorer.vue';

export default {
    name: "WebFtp",
    components: { FileExplorer }
};
</script>

<style scoped>
.webFtp_header {
  display: block;
}

.webFtp_header {
  display: flex;
  justify-content: space-between;
}

button {
  border: none;
  background: #B3145E;
  font-family: 'Readex Pro', sans-serif;
  font-weight: bolder;
  font-size: 1.875rem;
  color: white;
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