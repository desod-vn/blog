<template>
    <div v-if="load" id="loading">
    </div>
</template>

<script>
export default {
    props: ['loadTime'],
    data() {
        return {
            load: true,
        }
    },

    created() {
        let loading = this.loadTime || 500
        setTimeout(() => this.load = false, loading)
    }
};
</script>

<style scoped>
#loading {
    position: fixed;
    display: block;
    background-image: url(/images/load.gif);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255,255,255);
    z-index: 100;
    cursor: pointer;
}
</style>