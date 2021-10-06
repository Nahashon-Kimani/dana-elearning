@include('website.includes.header')
@section('page-name', 'Page Title')

<div class="page-title-area item-bg1 jarallax" data-jarallax="{speed:0.3}" data-jarallax-original-styles="null" style="background-image: none; background-attachment: scroll; background-size: auto;">
    <div class="container">
    <div class="page-title-content">
    <ul>
    <li><a href="index.html">Home</a></li>
    </ul>
    <h2>ABOUT US</h2>
    </div>
    </div>
</div>
    {{-- <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;"><div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;file:///D:/Elearning/Elearning2/templates.envytheme.com/raque/default/assets/img/page-title/1.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 2705.6px; height: 845.5px; overflow: hidden; pointer-events: none; margin-left: -653.8px; margin-top: 66.75px; visibility: visible; transform: translateY(-66.75px) translateZ(0px);"></div></div></div> --}}


    {{-- First Section --}}
    <section class="about-area ptb-100">
        <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-6 col-md-12">
        <div class="about-image">
        <img src="{{ asset('assets/img/about/1.jpg') }}" class="shadow" alt="image">
        <img src="{{ asset('assets/img/about/2.jpg') }}" class="shadow" alt="image">
        </div>
        </div>
        <div class="col-lg-6 col-md-12">
        <div class="about-content">
        <span class="sub-title">About Us</span>
        <h2>Learn New Skills to go ahead for Your Career</h2>
        <h6>We can support student forum 24/7 for national and international students.</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nisi ut aliquip ex ea commodo consequat.</p>
        <p>Education encompasses both the teaching and learning of knowledge, proper conduct, and technical competency.</p>
        <div class="features-text">
        <h5><i class="bx bx-planet"></i>A place where you can achieve</h5>
        <p>Education encompasses both the teaching and learning of knowledge, proper conduct, and technical competency.</p>
        </div>
        </div>
        </div>
        </div>
        <div class="about-inner-area">
        <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="about-text">
        <h3>100,000 online courses</h3>
        <p>Real innovations and a positive customer experience are the heart of successful communication.</p>
        <ul class="features-list">
        <li><i class="bx bx-check"></i> Activate Listening</li>
        <li><i class="bx bx-check"></i> Brilliant minds</li>
        <li><i class="bx bx-check"></i> Better. Best. Wow!</li>
        <li><i class="bx bx-check"></i> Branding it better!</li>
        </ul>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="about-text">
        <h3>Expert instruction</h3>
        <p>Real innovations and a positive customer experience are the heart of successful communication.</p>
        <ul class="features-list">
        <li><i class="bx bx-check"></i> Creating. Results.</li>
        <li><i class="bx bx-check"></i> Expect more</li>
        <li><i class="bx bx-check"></i> Good thinking</li>
        <li><i class="bx bx-check"></i> In real we trust</li>
        </ul>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
        <div class="about-text">
        <h3>Lifetime access</h3>
        <p>Real innovations and a positive customer experience are the heart of successful communication.</p>
        <ul class="features-list">
        <li><i class="bx bx-check"></i> Stay real. Always.</li>
        <li><i class="bx bx-check"></i> We have you covered</li>
        <li><i class="bx bx-check"></i> We turn heads</li>
        <li><i class="bx bx-check"></i> Your brand, promoted</li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>


        {{-- Why us --}}
        <section class="about-area pt-100">
            <div class="container-fluid">
            <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
            <div class="about-content left-content">
            <span class="sub-title">About Us</span>
            <h2>Learn New Skills to go ahead for Your Career</h2>
            <h6>We can support student forum 24/7 for national and international students.</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nisi ut aliquip ex ea commodo consequat.</p>
            <div class="features-text">
            <h5><i class="bx bx-planet"></i>A place where you can achieve</h5>
            <p>Education encompasses both the teaching and learning of knowledge, proper conduct, and technical competency.</p>
            </div>
            <div class="signature">
            <img src="{{ asset('assets/img/signature.png') }}" alt="image">
            </div>
            </div>
            </div>
            <div class="col-lg-6 col-md-12">
            <div class="about-right-image">
            <img src="{{ asset('assets/img/about/4.jpg') }}" alt="image">
            <img src="{{ asset('assets/img/about/3.jpg') }}" alt="image">
            <div class="text-box">
            <div class="inner">
            Trusted By
            <span>75K+</span>
            </div>
            </div>
             </div>
            </div>
            </div>
            </div>
            <div id="particles-js-circle-bubble-4"><canvas class="particles-js-canvas-el" width="1398" height="599" style="width: 100%; height: 100%;"></canvas></div>
            </section>


            {{-- Red Part with values, testimonials, enrollment rates --}}
            <section class="funfacts-and-feedback-area bg-f8e8e9 ptb-100">
                <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                <div class="feedback-slides-content">
                <span class="sub-title">Distance learning</span>
                <h2>Flexible Study at Your Own Pace, According to Your Own Needs</h2>
                <p>With the Raque, you can study whenever and wherever you choose. We have students in over 175 countries and a global reputation as a pioneer in the field of flexible learning. Our teaching also means, if you travel often or need to relocate, you can continue to study wherever you go.</p>
                <div class="feedback-slides-two owl-carousel owl-theme owl-loaded owl-drag">
                
                
                
                <div class="owl-stage-outer owl-height" style="height: 342px;"><div class="owl-stage" style="transform: translate3d(-2160px, 0px, 0px); transition: all 0s ease 0s; width: 3780px;"><div class="owl-item cloned" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user2.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>Sarah Taylor</h3>
                <span>PHP Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item cloned" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>David Warner</h3>
                <span>QA Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>John Smith</h3>
                <span>Python Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item animated owl-animated-out fadeOut" style="width: 540px; left: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user2.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>Sarah Taylor</h3>
                <span>PHP Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item active" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>David Warner</h3>
                <span>QA Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item cloned" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user1.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>John Smith</h3>
                <span>Python Developer</span>
                </div>
                </div>
                </div></div><div class="owl-item cloned" style="width: 540px;"><div class="single-feedback-slides-item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur rr adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="client-info d-flex align-items-center">
                <img src="assets/img/user2.jpg" class="rounded-circle" alt="image">
                <div class="title">
                <h3>Sarah Taylor</h3>
                <span>PHP Developer</span>
                </div>
                </div>
                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="flaticon-arrows"></i></button><button type="button" role="presentation" class="owl-next"><i class="flaticon-right-arrow"></i></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div></div>
                <div class="feedback-info">
                <p>Not a member yet?​ <a href="{{ route('register') }}">Register now</a></p>
                </div>
                </div>
                </div>
                <div class="col-lg-6 col-md-12">
                <div class="funfacts-list">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-funfacts-box">
                <h3><span class="odometer odometer-auto-theme" data-count="1926"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-formatting-mark">,</span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">9</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">6</span></span></span></span></span></div></span></h3>
                <p>Finished Sessions</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-funfacts-box">
                <h3><span class="odometer odometer-auto-theme" data-count="3279"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">3</span></span></span></span></span><span class="odometer-formatting-mark">,</span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">7</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">9</span></span></span></span></span></div></span></h3>
                <p>Enrolled Learners</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-funfacts-box">
                <h3><span class="odometer odometer-auto-theme" data-count="250"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span></h3>
                <p>Online Instructors</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-funfacts-box">
                <h3><span class="odometer odometer-auto-theme" data-count="100"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>%</h3>
                <p>Satisfaction Rate</p>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="business-shape6"><img src="assets/img/business-coaching/business-shape5.png" alt="image"></div>
                </section>
@include('website.includes.footer')