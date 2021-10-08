@include('website.includes.header')
{{-- @section('title', 'HOME') --}}
@section('page-name', 'Page Title')

<div class="search-overlay">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="search-overlay-layer"></div>
			<div class="search-overlay-layer"></div>
			<div class="search-overlay-layer"></div>
			<div class="search-overlay-close">
				<span class="search-overlay-close-line"></span>
				<span class="search-overlay-close-line"></span>
			</div>
			<div class="search-overlay-form">
				<form>
					<input type="text" class="input-search" placeholder="Search here...">
						<button type="submit">
							<i class='bx bx-search-alt'></i>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<section class="home-slides owl-carousel owl-theme">
		<div class="main-banner item-bg1">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="main-banner-content">
							<span class="sub-title">Weapon is Education</span>
							<h1>Think out of the box and create a learning learner</h1>
							<p>Raque supports students by introducing collaborators outside R, internships and research experience abroad.</p>
							<div class="btn-box">
								<a href="courses-2-columns-style-1.html" class="default-btn">
									<i class='bx bx-move-horizontal icon-arrow before'></i>
									<span class="label">View Courses</span>
									<i class="bx bx-move-horizontal icon-arrow after"></i>
								</a>
								<a href="contact.html" class="optional-btn">Get Started Free</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-banner item-bg2">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="main-banner-content">
							<span class="sub-title">The Future</span>
							<h1>Transformative Courses for those who learn differently</h1>
							<p>Raque supports students by introducing collaborators outside R, internships and research experience abroad.</p>
							<div class="btn-box">
								<a href="courses-2-columns-style-2.html" class="default-btn">
									<i class='bx bx-move-horizontal icon-arrow before'></i>
									<span class="label">View Courses</span>
									<i class="bx bx-move-horizontal icon-arrow after"></i>
								</a>
								<a href="contact.html" class="optional-btn">Get Started Free</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-banner item-bg3">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="main-banner-content text-center">
							<span class="sub-title">Aim for Excellence</span>
							<h1>Learn a new skill from online courses</h1>
							<p>Raque supports students by introducing collaborators outside R, internships and research experience abroad.</p>
							<div class="btn-box">
								<a href="courses-2-columns-style-3.html" class="default-btn">
									<i class='bx bx-move-horizontal icon-arrow before'></i>
									<span class="label">View Courses</span>
									<i class="bx bx-move-horizontal icon-arrow after"></i>
								</a>
								<a href="contact.html" class="optional-btn">Get Started Free</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    {{-- THe second section --}}
    
	<section class="boxes-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single-boxes-item">
						<h3>Learn The Latest Skills</h3>
						<p>Like business analytics, CPAs, Entreprepeurship, and more.</p>
						<a href="{{ route('website.course') }}" class="boxes-btn">View Courses
							<i class="bx bx-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-boxes-item bg-image">
						<h3>100+ Online Courses/Units</h3>
						<p>In high-demand like KASNEB Courses, and KASNEB Revisions.</p>
						<a href="{{ route('website.course') }}" class="boxes-btn">View More
							<i class="bx bx-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-boxes-item bg-color">
						<h3>Certificate on completion</h3>
						<p>Earn a Certificate of completion as you await the final one.</p>
						<a href="{{ route('website.course') }}" class="boxes-btn">View Courses
							<i class="bx bx-plus"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-boxes-item">
						<h3>Soar Your Business Skill High</h3>
						<p>With on-demand training, business coaching, and development programs.</p>
						<a href="{{ route('website.course') }}" class="boxes-btn">View More
							<i class="bx bx-plus"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

        {{-- Our popular courses --}}
        
	<section class="courses-area ptb-100">
		<div class="container">
			<div class="section-title text-left">
				<span class="sub-title">Discover Courses</span>
				<h2>Our Popular Online Courses</h2>
				<a href="{{ route('website.course') }}" class="default-btn">
					<i class="bx bx-show-alt icon-arrow before"></i>
					<span class="label">All Courses</span>
					<i class="bx bx-show-alt icon-arrow after"></i>
				</a>
			</div>
			<div class="courses-slides owl-carousel owl-theme owl-loaded owl-drag">
				<div class="owl-stage-outer">
					<div class="owl-stage" style="transform: translate3d(-1440px, 0px, 0px); transition: all 0.25s ease 0s; width: 2160px;">
						

							
								@foreach ($trendingCourses as $tCourse)
                                <div class="owl-item" style="width: 330px; margin-right: 30px;">
                                    <div class="single-courses-box without-box-shadow mb-30">
                                        <div class="courses-image">
                                            <a href="{{ route('website.show-course',$tCourse->id) }}" class="d-block">
                                                <img src="{{ asset('images/'.$tCourse->image_url) }}" alt="image">
                                                </a>
                                                <div class="courses-tag">
                                                    <a href="#" class="d-block">Business</a>
                                                </div>
                                            </div>
                                            <div class="courses-content">
                                                <div class="course-author d-flex align-items-center">
                                                    <img src="{{ asset('assets/img/user1.jpg') }}" class="rounded-circle mr-2" alt="image">
                                                        <span>{{ $tCourse->user->name }}</span>
                                                    </div>
                                                    <h3>
                                                        <a href="{{ route('website.show-course',$tCourse->id) }}" class="d-inline-block">
                                                            {{ $tCourse->name }}
                                                        </a>
                                                    </h3>
                                                    <div class="courses-rating">
                                                        <div class="review-stars-rated">
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                            <i class="bx bxs-star"></i>
                                                        </div>
                                                        <div class="rating-total">5.0 (1 rating)</div>
                                                    </div>
                                                </div>
                                                <div class="courses-box-footer">
                                                    <ul>
                                                        <li class="students-number">
                                                            <i class="bx bx-timer"></i> {{ $tCourse->duration }} Months
                    
                                                        </li>
                                                        <li class="courses-lesson">
                                                            <i class="bx bx-book-open"></i> 3 Units
                    
                                                        </li>
                                                        <li class="courses-price">
															<i class="bx bx-book-open"></i>
															K.{{ $tCourse->cost }}
														</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
												
													
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev">
                                <i class="bx bx-left-arrow-alt"></i>
                            </button>
                            <button type="button" role="presentation" class="owl-next disabled">
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                        <div class="owl-dots">
                            <button role="button" class="owl-dot">
                                <span></span>
                            </button>
                            <button role="button" class="owl-dot">
                                <span></span>
                            </button>
                            <button role="button" class="owl-dot active">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>





            {{-- Trending courses --}}

			<section class="courses-area ptb-100">
				<div class="container">
					<div class="section-title">
						<span class="sub-title">Learn At Your Own Pace</span>
						<h2>Top Trending Courses</h2>
						<p>Explore all of our courses and pick your suitable ones to enroll and start learning with us! We ensure that you will never regret it!</p>
					</div>
					<div class="row">

						@foreach ($courses as $course)
						<div class="col-lg-4 col-md-6">
							<div class="courses-box">
								<div class="courses-image">
									<a href="{{ route('website.show-course',$tCourse->id) }}" class="d-block image">
										<img src="{{ asset('images/'.$course->image_url) }}" alt="image">
										</a>
										<a href="#" class="fav">
											<i class="bx bx-heart"></i>
										</a>
										<div class="price shadow">K{{ $course->cost }}</div>
									</div>
									<div class="courses-content">
										<div class="course-author d-flex align-items-center">
											<img src="{{ asset('images/users/default.png') }}" class="rounded-circle" alt="image">
												<span>{{ $course->user->name }}</span>
											</div>
											<h3>
												<a href="{{ route('website.show-course',$tCourse->id) }}">
													{{ $course->name }}
												</a>
											</h3>
											<p class="text-justify">
												{{ \Illuminate\Support\Str::limit($course->summary, 153) }}
											</p>
											<ul class="courses-box-footer d-flex justify-content-between align-items-center">
												<li>
													<i class="bx bx-book-bookmark"></i> 3 Units
												</li>
												<li>
													<i class="bx bx-group"></i> {{ $course->duration }} Months
												</li>
											</ul>
										</div>
									</div>
								</div>
						@endforeach
						
					<div class="col-lg-12 col-md-12">
						<div class="courses-info">
							<p>Enjoy the top notch learning methods and achieve next level skills! You are the creator of your own career &amp; we will guide you through that. 
								<a href="{{ route('register') }}">Register Free Now!</a>.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

{{-- How to apply for a course --}}

		<section class="information-area ptb-100">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						<div class="information-image text-center">
							<img src="{{ asset('assets/img/information-img.png') }}" alt="image">
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="information-content">
								<span class="sub-title">Information</span>
								<h2>How To Apply?</h2>
								<ul class="apply-details">
									<li>
										<div class="icon">
											<i class="flaticon-checkmark"></i>
										</div>
										<h3>Select Suitable Course</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</li>
									<li>
										<div class="icon">
											<i class="flaticon-login"></i>
										</div>
										<h3>Student Information</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</li>
									<li>
										<div class="icon">
											<i class="flaticon-credit-card"></i>
										</div>
										<h3>Payment Information</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</li>
									<li>
										<div class="icon">
											<i class="flaticon-verify"></i>
										</div>
										<h3>Register Now</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>

{{-- Meet our Instructors --}}

								<section class="team-area ptb-100">
									<div class="container">
										<div class="section-title">
											<span class="sub-title">Make Connections</span>
											<h2>Team of Instructors</h2>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
												eiusmod tempor incididunt ut labore et dolore magna aliqua. 
												Ut nisi ut aliquip ex ea.</p>
										</div>
										<div class="row">
											
											@foreach ($teachers as $teacher)
											<div class="col-lg-4 col-md-6 col-sm-6">
												<div class="single-instructor-member mb-30">
													<div class="member-image">
														<img src="{{ asset('images/users/'.$teacher->profile_picture) }}" alt="images">
														</div>
														<div class="member-content">
															<h3>
																<a href="single-instructor.html">{{ $teacher->name }}</a>
															</h3>
															<span>INSTRUCTOR</span>
															<ul class="social">
																<li>
																	<a href="mailto:{{ $teacher->email }}" target="_blank" class="google" target="_blank">
																		<i class="bx bxl-google"></i>
																	</a>
																</li>
																<li>
																	<a href="#" class="twitter" target="_blank">
																		<i class="bx bxl-twitter"></i>
																	</a>
																</li>
																<li>
																	<a href="#" class="instagram" target="_blank">
																		<i class="bx bxl-instagram"></i>
																	</a>
																</li>
																<li>
																	<a href="#" class="linkedin" target="_blank">
																		<i class="bx bxl-linkedin"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											@endforeach
													
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="team-btn-box text-center">
													<a href="{{ route('website.instructors') }}" class="default-btn">
														<i class="bx bx-show-alt icon-arrow before"></i>
														<span class="label">Meet All Instructor</span>
														<i class="bx bx-show-alt icon-arrow after"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div id="particles-js-circle-bubble-3">
										<canvas class="particles-js-canvas-el" width="1556" height="978" style="width: 100%; height: 100%;"></canvas>
									</div>
								</section>

{{-- What wwe offer for growth --}}
                        
					<section class="offer-area pt-100 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
						<div class="container">
							<div class="section-title">
								<span class="sub-title">Make Connections</span>
								<h2>What We Offer For Growth</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nisi ut aliquip ex ea.</p>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="single-offer-box">
										<div class="icon">
											<i class="bx bx-book-reader"></i>
										</div>
										<h3>Exclusive Advisor</h3>
										<p>Lorem ipsum dolor sit amet cons ecttu adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="single-offer-box">
										<div class="icon">
											<i class="bx bx-target-lock"></i>
										</div>
										<h3>Reached Your Goals</h3>
										<p>Lorem ipsum dolor sit amet cons ecttu adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
									<div class="single-offer-box">
										<div class="icon">
											<i class="bx bxs-thermometer"></i>
										</div>
										<h3>Digital Laboratory</h3>
										<p>Lorem ipsum dolor sit amet cons ecttu adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
									</div>
								</div>
							</div>
						</div>
					</section>
                        

{{-- Become an instructor --}}
                            
		<section class="become-instructor-partner-area">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="become-instructor-partner-content bg-color">
							<h2>Become an Instructor</h2>
							<p>Choose from hundreds of free courses, or get a degree or certificate at a breakthrough price. Learn at your own pace.</p>
							<a href="{{ route('website.contact') }}" class="default-btn">
								<i class="bx bx-plus-circle icon-arrow before"></i>
								<span class="label">Apply Now</span>
								<i class="bx bx-plus-circle icon-arrow after"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="become-instructor-partner-image bg-image1 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}" data-jarallax-original-styles="null" style="position: relative; z-index: 0; background-image: none; background-attachment: scroll; background-size: auto;">
							<img src="{{ asset('assets/img/become-instructor.jpg') }}" alt="image">
								<div id="jarallax-container-1" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
									<div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;file:///D:/Elearning/Elearning2/templates.envytheme.com/raque/default/assets/img/become-instructor.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1222.53px; height: 800.2px; overflow: hidden; pointer-events: none; margin-left: 555.736px; margin-top: 89.4px; visibility: visible; transform: translateY(16.575px) translateZ(0px);"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="become-instructor-partner-image bg-image2 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}" data-jarallax-original-styles="null" style="position: relative; z-index: 0; background-image: none; background-attachment: scroll; background-size: auto;">
								<img src="{{ asset('assets/img/become-partner.jpg') }}" alt="image">
									<div id="jarallax-container-2" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;">
										<div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;file:///D:/Elearning/Elearning2/templates.envytheme.com/raque/default/assets/img/become-partner.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 1222.53px; height: 800.2px; overflow: hidden; pointer-events: none; margin-left: -222.264px; margin-top: 89.4px; visibility: visible; transform: translateY(131.475px) translateZ(0px);"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="become-instructor-partner-content">
									<h2>Become a Partner</h2>
									<p>Choose from hundreds of free courses, or get a degree or certificate at a breakthrough price. Learn at your own pace.</p>
									<a href="{{ route('website.contact') }}" class="default-btn">
										<i class="bx bx-plus-circle icon-arrow before"></i>
										<span class="label">Contact Us</span>
										<i class="bx bx-plus-circle icon-arrow after"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

@include('website.includes.footer')