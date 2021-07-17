<template>
    <div id="post">
        <Loading :loadTime="loadTime" />
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