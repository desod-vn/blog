<template>
    <div>
        <Loading :loadTime="loadTime" />
        <router-view :key="$route.fullPath" />
    </div>
</template>

<script>
import Loading from './components/Loading'

export default {
    data() {
        return {
            loadTime: 600,
        }
    },
    
    components: {
        Loading,
    }
}
</script>


