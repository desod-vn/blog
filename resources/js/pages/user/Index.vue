<template>
    <div id="user">
		<Header />
        <router-view :key="$route.fullPath" />
		<Footer />
    </div>
</template>

<script>


/*****COMPONENTS*****/

import Header from '../../layouts/Header'
import Footer from '../../layouts/Footer'

export default {
	components: {
		Header,
		Footer,
	},
}
</script>