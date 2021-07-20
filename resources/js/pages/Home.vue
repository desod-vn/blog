<template>
	<div id="home">
		<Header />
		<div class="container">
			<HotPost />
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-8">
					<LatestPost />
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4">
					something...
				</div>
			</div>
			<Carousel />
		</div>
		<Footer />
	</div>
</template>

<script>
import Header from '../layouts/Header'
import Carousel from '../components/home/Carousel'
import HotPost from '../components/home/Hot'
import LatestPost from '../components/home/Latest'
import Footer from '../layouts/Footer'

export default {
	components: {
		Header,
		Carousel,
		HotPost,
		LatestPost,
		Footer,
	}
};
</script>