@include('website.includes.header')

{{-- Header part --}}
<div class="page-title-area item-bg1 jarallax" data-jarallax="{speed:0.3}" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="container">
    <div class="page-title-content">
    <ul>
    <li><a href="index.html">Home</a></li>
    </ul>
    <h2 class="text-uppercase">our team of Instructors</h2>
    </div>
    </div>
</div>

{{-- All Instructors --}}

<section class="team-area pt-100 pb-70">
        <div class="container">
            <div class="row"> 
                @foreach ($instructors as $instructor)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-team-member mb-30">
                        <div class="member-image">
                            <img src="{{ asset('assets/img/team/1.jpg') }}" alt="images">
                            </div>
                            <div class="member-content">
                                <h3>
                                    <a href="#">{{ $instructor->name }}</a>
                                </h3>
                                <span>OOP Developer</span>
                                    <p>Jonkin Jullinor holds three degrees from MIT and an MBA from Harvard.</p>
                                <ul class="social">
                                    <li>
                                        <a href="mailto:{{ $instructor->email }}" class="google" target="_blank">
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

            </div>
        </div>
        <div id="particles-js-circle-bubble-3">
            <canvas class="particles-js-canvas-el" width="1246" height="966" style="width: 100%; height: 100%;"></canvas>
        </div>
    </section>

@include('website.includes.footer')