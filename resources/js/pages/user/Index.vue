<template>
    <div id="user">
		<Header />
        <router-view :key="$route.fullPath" />
    </div>
</template>

<script>


/*****COMPONENTS*****/

import Header from '../../layouts/Header'

export default {
	components: {
		Header,
	},
}
</script>