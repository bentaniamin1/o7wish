
<template>
    <section class="webFtp_section">
        <header class="webFtp_header">
            <div class="webFtp_header_left">
                <p>Web FTP</p>
                <figure>
                    <img src="" alt="">
                </figure>
            </div>
            <button>Reset le cache</button>
        </header>
        
        <div class="explorer">
            <FileList/>
        </div>
    </section>
</template>

<script>

import FileList from '@/components/FileExplorer/FileList.vue';

export default {
    name: "WebFtp",
    components: { FileList }
};
</script>

<style scoped>

* {
    box-sizing: border-box;
}
.webFtp_section {
    width: 100%;
    height: 100%;
    padding: 40px;
}
.webFtp_header_left {
  display: flex;
  align-items: center;
}
.webFtp_header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 40px;
}

.explorer {
    width: 100%;
    height: 90%;
    box-shadow: 0px 4px 4px 0px #00000040;
}

button {
    min-height: 50px;
    min-width: 180px;
    border: none;
    background: #B3145E;
    font-family: 'Readex Pro', sans-serif;
    font-weight: bolder;
    font-size: 1.4rem;
    color: white;
    box-shadow: 0px 4px 4px 0px #00000040;

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