@include('website.includes.header')
<div class="page-title-area item-bg1 jarallax" data-jarallax="{speed:0.3}" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="container">
    <div class="page-title-content">
    <ul>
    <li><a href="index.html">Home</a></li>
    </ul>
    <h2 class="text-uppercase">{{ $course->name }}</h2>
    </div>
    </div>
</div>



<section class="courses-details-area pt-100 pb-70">
	<div class="container">
		<div class="courses-details-header">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<div class="courses-title">
						<h2>{{ $course->name }}</h2>
						<p>{{ $course->summary }}</p>
					</div>
					<div class="courses-meta">
						<ul>
							<li>
								<i class="bx bx-folder-open"></i>
								<span>Category</span>
								<a href="#">Business</a>
							</li>
							<li>
								<i class="bx bx-group"></i>
								<span>Students Enrolled</span>
								<a href="#">{{ $studentsEnrolled + 10 }}</a>
							</li>
							<li>
								<i class="bx bx-calendar"></i>
								<span>Last Updated</span>
								<a href="#">{{ date('dS-M-Y', strtotime($course->updated_at)) }}</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="courses-price">
						<div class="courses-review">
							<div class="review-stars">
								<i class="bx bxs-star"></i>
								<i class="bx bxs-star"></i>
								<i class="bx bxs-star"></i>
								<i class="bx bxs-star"></i>
								<i class="bx bxs-star"></i>
							</div>
							<span class="reviews-total d-inline-block">(3 reviews)</span>
						</div>
						<div class="price">Ksh {{ $course->cost }}</div>
						<a href="{{ route('register') }}" class="default-btn">
							<i class="bx bx-paper-plane icon-arrow before"></i>
							<span class="label">Enroll Now</span>
							<i class="bx bx-paper-plane icon-arrow after"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="courses-details-image text-center">
					<img src="{{ asset('images/'.$course->image_url) }}" alt="image">
					</div>
					<div class="courses-details-desc">
						<h3>{{ $course->name }} Description</h3>
						{!! $course->desc !!}
					</div>
					
					<h3>Meet Your Instructors</h3>
					<div class="courses-author">
						<div class="author-profile-header"></div>
						<div class="author-profile">
							<div class="author-profile-title">
								<img src="{{ asset('images/users/'.$course->user->profile_picture) }}" 
									class="shadow-sm rounded-circle" alt="image">
									<div class="author-profile-title-details d-flex justify-content-between">
										<div class="author-profile-details">
											<h4>{{ $course->user->name }}</h4>
											<span class="d-block">{{ $course->name }} Instructor</span>
										</div>
										<div class="author-profile-raque-profile">
											<a href="#" class="d-inline-block">View Profile</a>
										</div>
									</div>
								</div>
								<p>{{ $course->user->name }} is 
									{{ $course->user->about }}
								</p>
							</div>
						</div>
			</div>
			<div class="col-lg-4">
				<div class="courses-sidebar-information">
					<ul>
						<li>
							<span>
								<i class="bx bx-text"></i> Units:
							</span> {{ $units }}
						</li>
						{{-- <li>
							<span>
								<i class="bx bx-video-recording"></i> Video:
							</span> {{ $units }}
						</li> --}}
						<li>
							<span>
								<i class="bx bx-time"></i> Duration:
							</span> {{ $course->duration }} Months
						</li>
						{{-- <li>
							<span>
								<i class="bx bx-atom"></i> Exercises:
							</span> {{ $units }}
						</li> --}}
						<li>
							<span>
								<i class="bx bx-group"></i> Main Instructors:
							</span>
							{{ $course->user->name }}
						</li>
						<li>
							<span>
								<i class="bx bx-support"></i> Language:
							</span>English
						</li>
						<li>
							<span>
								<i class="bx bx-certification"></i> Certificate:
							</span> Yes
						</li>
					</ul>
				</div>
				<div class="courses-sidebar-syllabus">
					<h3>Course Syllabus</h3>
					<h4>Lessons</h4>
						@if ($course->course_outline == NULL)
							<p>No Course outline attached</p>
						@else
							{!! $course->syllabus->desc !!}
						@endif
					<h4>Final Quiz</h4>
					<div class="courses-list">
						<ul>
							<li>Final Quiz</li>
						</ul>
					</div>
				</div>
				<div class="courses-purchase-info">
					<h4>Interested in this course for your Business or Team?</h4>
					<p>Train your employees in the most in-demand topics, with edX for Business.</p>
					<a href="#" class="d-inline-block">Purchase now</a>
					<a href="{{ route('website.contact') }}" class="d-inline-block">Request Information</a>
				</div>
			</div>
		</div>
	</div>
</section>
@include('website.includes.footer')