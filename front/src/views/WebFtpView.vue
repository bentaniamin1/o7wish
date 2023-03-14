
<template>
    <!-- <header>
        <figure>
            <img src="" alt="">
        </figure>
        <a href="http://">
            <span>Reset le cache</span>
        </a>
    </header>
    
    <div class="explorer">
        
    </div> -->

    <FileExplorer/>
</template>

<script>
// import FileList from '@/components/FileList.vue';

import FileExplorer from '@/components/FileExplorer/FileExplorer.vue';

export default {
    name: "WebFtp",
    components: { FileExplorer }
};
</script>