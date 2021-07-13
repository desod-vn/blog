<template>
  	<footer class="mt-5 text-lg-start bg-light text-muted">
		<section class="container p-2">
			<section
				class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
			>
				<div class="me-5 d-none d-lg-block">
					<span>Liên hệ với chúng tôi thông qua mạng xã hội: </span>
				</div>
			
				<div>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-google"></i>
					</a>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-instagram"></i>
					</a>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-linkedin"></i>
					</a>
					<a href="" class="me-4 text-reset">
						<i class="fab fa-github"></i>
					</a>
				</div>
			</section>
			<div class="text-md-start mt-5">
				<div class="row mt-3">

					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 mx-auto">
						<h6 class="text-uppercase fw-bold mb-4">
							<i class="fas fa-gem me-3"></i> DESOD
						</h6>
						
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem reiciendis ut, id ipsum aperiam quas dolorum dolorem eligendi provident vero numquam itaque repudiandae minus quaerat quia sapiente suscipit, ad fugiat.</p>
					</div>

					<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mx-auto">
						<div class="ratio ratio-16x9">
							
						</div>
					</div>

					<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 mx-auto mt-sm-3">
						<h6 class="text-uppercase fw-bold mb-4">LIÊN HỆ</h6>
						<p>
							<i class="fas fa-home me-3"></i> 
							Cau Giay, Ha Noi, Viet Nam
						</p>

						<p>
							<i class="fas fa-envelope me-3"></i>
							thangdotpro@gmail.com
						</p>

						<p>
							<i class="fas fa-phone me-3"></i>
							+ 84 389 064 540
						</p>

						<p>
							<i class="fas fa-print me-3"></i>
							Công ty TNHH CP DESOD
						</p>
					</div>
				</div>
			</div>
		</section>
		
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05)">
			© 2021 COPYRIGHT
			  <router-link :to="{ name: 'home' }">
                <img src="/images/logo-main.png" alt=""/>
            </router-link>
		</div>
	</footer>
</template>