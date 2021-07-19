<template>
	<div id="home">
		<Header />
		<div class="container">
			<HotPost />
			<Carousel />
			<LatestPost />
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