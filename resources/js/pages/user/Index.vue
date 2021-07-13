<template>
    <div id="user">
		<Header />
        <Loading :loadTime="loadTime" />
        <router-view :key="$route.fullPath" />
		<Footer />
    </div>
</template>

<script>


/*****COMPONENTS*****/
import Loading from '../../components/Loading'

import Header from '../../layouts/Header'
import Footer from '../../layouts/Footer'

export default {
	data() {
        return {
            loadTime: 600,
        }
    },
    
	components: {
		Header,
		Footer,
        Loading,
	},
}
</script>