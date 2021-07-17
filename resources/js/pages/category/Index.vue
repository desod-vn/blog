<template>
    <div id="category">
		<Header />
        <div class="container">
	        <div class="row">
    	        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 col-xxl-8">
					<router-view :key="$route.fullPath" />
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
				</div>
			</div>
		</div>
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