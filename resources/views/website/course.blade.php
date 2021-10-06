@include('website.includes.header')

<div class="page-title-area item-bg1 jarallax" data-jarallax="{speed:0.3}" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
	<div class="container">
		<div class="page-title-content">
			<ul>
				<li>
					<a href="index.html">Home</a>
				</li>
			</ul>
			<h2 class="text-uppercase">Courses</h2>
		</div>
	</div>
</div>
<section class="courses-area ptb-100">
	<div class="container">
		<div class="courses-topbar">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-4">
					<div class="topbar-result-count">
						<p>Showing {{ $courses->links() }} of {{ $allCourses }}</p>
					</div>
				</div>
				<div class="col-lg-8 col-md-8">
					<div class="topbar-ordering-and-search">
						<div class="row align-items-center">
							<div class="col-lg-3 col-md-5 offset-lg-4 offset-md-1 col-sm-6">
								<div class="topbar-ordering">
									<select style="display: none;">
										<option>Sort by popularity</option>
										<option>Sort by latest</option>
										<option>Default sorting</option>
										<option>Sort by rating</option>
										<option>Sort by new</option>
									</select>
									<div class="nice-select" tabindex="0">
										<span class="current">Sort by popularity</span>
										<ul class="list">
											<li data-value="Sort by popularity" class="option selected">Sort by popularity</li>
											<li data-value="Sort by latest" class="option">Sort by latest</li>
											<li data-value="Default sorting" class="option">Default sorting</li>
											<li data-value="Sort by rating" class="option">Sort by rating</li>
											<li data-value="Sort by new" class="option">Sort by new</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="topbar-search">
									<form>
										<label>
											<i class="bx bx-search"></i>
										</label>
										<input type="text" class="input-search" placeholder="Search here...">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

            @foreach ($courses as $course)
            
				<div class="col-lg-4 col-md-6">
					<div class="single-courses-box without-box-shadow mb-30">
						<div class="courses-image">
							<a href="{{ route('website.show-course', $course->id) }}" class="d-block">
								<img src="{{ asset('images/'.$course->image_url) }}" alt="image">
								</a>
								<div class="courses-tag">
									<a href="#" class="d-block">Business</a>
								</div>
							</div>
							<div class="courses-content">
								<div class="course-author text-capitalize d-flex align-items-center">
									<img src="{{ asset('assets/img/user1.jpg') }}" class="rounded-circle mr-2" alt="image">
										<span>{{ $course->user->name }}</span>
									</div>
									<h3>
										<a href="{{ route('website.show-course', $course->id) }}" class="d-inline-block">
                    {{ $course->name }}
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
										<div class="rating-total">5.0 (1 rating)
										</div>
									</div>
								</div>
								<div class="courses-box-footer">
									<ul>
										<li class="students-number">
											<i class="bx bx-timer"></i> {{ $course->duration }} Months
                
										</li>
										<li class="courses-lesson">
											<i class="bx bx-book-open"></i> 4 Units
                
										</li>
										<li class="courses-price"><i class="bx bx-money"></i> {{ $course->cost }}</li>
									</ul>
								</div>
							</div>
						</div>
            		 @endforeach
					</div>
				</div>
			</section>

@include('website.includes.footer')