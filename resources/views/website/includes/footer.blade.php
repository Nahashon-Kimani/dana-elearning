

<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="single-footer-widget mb-30">
					<h3>Contact Us</h3>
					<ul class="contact-us-link">
						<li>
							<i class='bx bx-map'></i>
							<a href="#" target="_blank">
								7<sup>th</sup> Floor Elimu House along Elimu Street. 
							</a>
						</li>
						<li>
							<i class='bx bx-phone-call'></i>
							<a href="#">+1 (123) 456 7890</a>
						</li>
						<li>
							<i class='bx bx-envelope'></i>
							<a href="#">
								<span><a href="mailto:info@danaschool.co.ke">Dana School</a></span>
							</a>
						</li>
					</ul>
					<ul class="social-link">
						<li>
							<a href="#" class="d-block" target="_blank">
								<i class='bx bxl-facebook'></i>
							</a>
						</li>
						<li>
							<a href="#" class="d-block" target="_blank">
								<i class='bx bxl-twitter'></i>
							</a>
						</li>
						<li>
							<a href="#" class="d-block" target="_blank">
								<i class='bx bxl-instagram'></i>
							</a>
						</li>
						<li>
							<a href="#" class="d-block" target="_blank">
								<i class='bx bxl-linkedin'></i>
							</a>
						</li>
						<li>
							<a href="#" class="d-block" target="_blank">
								<i class='bx bxl-pinterest-alt'></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget mb-30">
					<h3>Support</h3>
					<ul class="support-link">
						<li>
							<a href="{{ route('website.course') }}">Courses</a>
						</li>
						<li>
							<a href="{{ route('website.about') }}">About Us</a>
						</li>
						<li>
							<a href="{{ route('website.contact') }}">Contact Us</a>
						</li>
						<li>
							<a href="#">Terms</a>
						</li>
						<li>
							<a href="#">Condition</a>
						</li>
						<li>
							<a href="#">Policy</a>
						</li>
					</ul>
				</div>
			</div>
			{{-- <div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget mb-30">
					<h3>Useful Link</h3>
					<ul class="useful-link">
						<li>
							<a href="#">Web Design</a>
						</li>
						<li>
							<a href="#">UI/UX Design</a>
						</li>
						<li>
							<a href="#">WP Development</a>
						</li>
						<li>
							<a href="#">App</a>
						</li>
						<li>
							<a href="#">Whitepaper</a>
						</li>
						<li>
							<a href="#">Web Development</a>
						</li>
					</ul>
				</div>
			</div> --}}
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget mb-30">
					<h3>Newsletter Sign-up</h3>
					<div class="newsletter-box">
						{{-- <p>To get the latest news and latest updates from us.</p> --}}
						<form action="{{ route('website.store') }}" method="POST">
              				@csrf
							<label>Nice Name:</label>
								<input type="text" class="input-newsletter text-capitalize" placeholder="Enter your nice name" name="name" required autocomplete="off">
              				<label>Your nice e-mail address:</label>
							<input type="email" class="input-newsletter" placeholder="Enter Your Nice Email" name="email" required autocomplete="off">
								<button type="submit">Subscribe</button>
								{{-- <div id="validator-newsletter" class="form-result"></div> --}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-area">
			<div class="container">
				<div class="logo">
					<a href="{{ route('website.index') }}" class="d-inline-block">
						<img src="{{ asset('assets/img/logo.png') }}" alt="image">
						</a>
					</div>
					<p>
						<i class='bx bx-copyright'></i>{{ date('Y') }} 
						<a href="mailto:nahashonmbuci@gmail.com" 
							target="_blank">Designed By Mbuci</a> | All rights reserved.
					</p>
				</div>
			</div>
		</footer>
		<div class="go-top">
			<i class='bx bx-up-arrow-alt'></i>
		</div>
		<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
		<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
		<script src="{{ asset('assets/js/particles.min.js') }}"></script>
		<script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets/js/viewer.min.js') }}"></script>
		<script src="{{ asset('assets/js/slick.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
		<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>