	@extends('layouts/frontLayout/front_design')
	@section('content')

	@section('styles')
	<style>
	/* case studios */
		.case-wrapper {
			display: flex;
			gap: 20px;
			height: 420px;
		}

		.case-card {
			flex: 1;
			border-radius: 30px;
			overflow: hidden;
			position: relative;
			cursor: pointer;
			transition: all .5s ease;
			background: #000;
			display: flex;
			border: 1px solid #000;
		}

		.case-card.active {
			flex: 3;
			background: #fff;
		}

		.case-image {
			width: 100%;
			height: 100%;
			position: relative;
		}

		.case-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.overlay {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			padding: 25px;
			color: #fff;
			background: linear-gradient(to top, rgba(0, 0, 0, .7), transparent);
		}

		.case-badge {
			border: 1px solid #fff;
			padding: 0px 15px;
			border-radius: 20px;
			font-size: 12px;
			display: inline-block;
			margin-bottom: 8px;
		}

		.case-card:hover .case-badge {
			background: #fff;
			color: #000;
		}

		.case-details {
			display: none;
			width: 50%;
			padding: 40px;
			flex-direction: column;
			justify-content: center;
			background-color: #f3fbff;
		}

		.case-card.active .case-details {
			display: flex;
		}

		.case-card.active .case-image {
			width: 50%;
		}

		.case-details h3 {
			font-size: 26px;
			margin-bottom: 20px;
		}

		.case-details p {
			color: #000;
		}

		.know-more {
			margin-top: 20px;
			font-weight: 600;
			text-decoration: none;
			color: #0d3b66;
		}

		@media (max-width:991px) {
			.case-wrapper {
				flex-direction: column;
				height: auto;
			}

			.case-card {
				flex-direction: column;
				height: auto;
			}

			.case-card,
			.case-card.active {
				flex: unset;
			}

			.case-image {
				width: 100%;
				height: 260px;
			}

			.case-details {
				display: block;
				width: 100%;
				padding: 25px;
			}

			.case-card.active .case-image {
				width: 100%;
			}

			.overlay {
				display: none;
			}
		}

	/* news and blogs	 */
		.news-item {
			display: flex;
			align-items: center;
			gap: 40px;
			padding: 25px;
			border-top: 1px solid #ddd;
			transition: 0.4s;
			cursor: pointer;
			transform-origin: center;
		}

		.news-item:hover {
			transform: scale(1.07);
			background: #eef4ff;
			z-index: 2;
		}

		.news-image {
			width: 250px;
			height: 125px;
			overflow: hidden;
			border-radius: 6px;
		}

		.news-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.news-date {
			font-size: 34px;
			text-align: center;
			line-height: 1.2;
			min-width: 100px;
		}

		.news-content {
			flex: 1;
		}

		.news-title {
			font-size: 24px;
			margin-bottom: 10px;
		}

		.news-desc {
			color: #666;
		}

		.news-link {
			font-weight: 600;
			text-decoration: none;
			color: #1d2f5f;
		}

		@media(max-width:992px) {
			.news-item {
				flex-direction: column;
				align-items: flex-start;
			}

			.news-image {
				width: 100%;
				height: 220px;
			}

			.news-date {
				text-align: left;
			}
		}
	/* technolgies */
		.choose-block_one {
			position: relative;
			overflow: hidden;
		}

		.choose-block_one .inner {
			position: relative;
			padding: 30px;
			background: #fff;
			border-radius: 10px;
			z-index: 2;
		}

		.bg-circle{
			position: absolute;
			top: -30px;
			right: -30px;
			width: 130px;
			height: 130px;
			border-radius: 50%;
			background: rgba(0,123,255,0.05);
			transition: all 0.5s ease;
			z-index: 1;
		}

		.choose-block_one:hover .bg-circle{
			transform: scale(1.6);
			background: rgba(0,123,255,0.1);
		}

		.feature-card {
			display: inline-block;
		}

		.icon-box{
			display:flex;
			align-items:center;
			justify-content:center;
			width:56px;
			height:56px;
			border-radius:12px;
			background: rgba(0,123,255,0.1);
			color:#0d6efd;
			transition: all 0.3s ease;
		}

		.icon-svg{
			width:28px;
			height:28px;
		}

		.feature-card:hover .icon-box{
			background:#cfe5ff;
			color:#fff;
		}
		
	/* ctc	 */
		.cta-section {
			padding: 0px 0;
		}

		.cta-box {
			background: linear-gradient(135deg, #0c2f57, #021c3c);
			border-radius: 30px;
			padding: 70px;
			position: relative;
			overflow: hidden;
			color: white;
		}

		.cta-box::before {
			content: "";
			position: absolute;
			width: 300px;
			height: 300px;
			background: rgba(255, 255, 255, 0.05);
			border-radius: 50%;
			top: -120px;
			right: -120px;
		}

		.cta-box::after {
			content: "";
			position: absolute;
			width: 300px;
			height: 300px;
			background: rgba(255, 255, 255, 0.05);
			border-radius: 50%;
			bottom: -150px;
			left: -120px;
		}

		.cta-title {
			font-size: 48px;
			font-weight: 700;
			line-height: 1.2;
		}

		.cta-title span {
			background: linear-gradient(135deg, #0b73c0 0%, #0b73c0 50%, #ff5e6a 100%);
			-webkit-text-fill-color: transparent;
			-webkit-background-clip: text;
			background-clip: text;
		}

		.cta-text {
			margin-top: 20px;
			font-size: 18px;
			color: #cbd5e1;
			max-width: 500px;
		}

		.btn-touch {
			background: #0b73c0;
			color: white;
			padding: 14px 28px;
			border-radius: 12px;
			font-weight: 600;
			margin-right: 10px;
			box-shadow: 0 8px 20px #3a5e88;
		}

		.btn-touch:hover {
			background: #0b73c0;
			color: white;
		}

		.btn-call {
			border: 1px solid rgba(255, 255, 255, 0.4);
			color: white;
			padding: 14px 28px;
			border-radius: 12px;
			font-weight: 600;
		}

		.btn-call:hover {
			background: white;
			color: #021c3c;
		}

	/* video btn */
		.video-box{
			position:relative;
		}

		.video-box video{
			width:100%;
			border-radius:10px;
		}

		.play-btn{
			position:absolute;
			top:50%;
			left:50%;
			transform:translate(-50%,-50%);
			width:80px;
			height:80px;
			border-radius:50%;
			background:#0b73c0;
			color:#fff;
			font-size:26px;
			border:none;
			cursor:pointer;
			z-index:2;
		}

		.play-btn::before,
		.play-btn::after{
			content:'';
			position:absolute;
			width:80px;
			height:80px;
			border-radius:50%;
			background:rgb(11 115 192 / 43%);
			left:0;
			top:0;
			animation:ripple 2s infinite;
		}

		.play-btn::after{
			animation-delay:1s;
		}

		@keyframes ripple{
			0%{
				transform:scale(1);
				opacity:0.8;
			}
			100%{
				transform:scale(2.5);
				opacity:0;
			}
		}

		.stop-btn{
			position:absolute;
			bottom:20px;
			right:20px;
			width:45px;
			height:45px;
			border:none;
			background:#000;
			color:#fff;
			border-radius:50%;
			cursor:pointer;
		}

	/* circle animation css	 */
		.orbit-section {
			position: relative;
			height: 700px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.orbit {
			position: absolute;
			border: 2px solid #ff7a3d;
			border-radius: 50%;
			animation: rotate 30s linear infinite;
		}

		.orbit1 {
			width: 600px;
			height: 600px;
		}

		.orbit2 {
			width: 420px;
			height: 420px;
			animation-duration: 25s;
		}

		.orbit3 {
			width: 260px;
			height: 260px;
			animation-duration: 20s;
		}

		.orbit-item {
			position: absolute;
			top: -40px;
			left: 50%;
			transform: translateX(-50%);
		}

		.orbit-item img {
			width: 80px;
			height: 80px;
			border-radius: 50%;
			object-fit: cover;
			border: 4px solid #fff;
		}

		@keyframes rotate {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

	/* speed effect text */
		.speed-text {
			font-size: 48px;
			font-weight: 700;
			position: relative;
			display: inline-block;
			overflow: hidden;
		}

		.speed-text span {
			position: relative;
			color: #0b73c0;
			animation: speedMove 2s ease-out infinite;
		}

		.speed-text span::before,
		.speed-text span::after {
			content: '';
			position: absolute;
			top: 50%;
			left: -120px;
			width: 100px;
			height: 3px;
			background: linear-gradient(to right, transparent, #0b2c6a);
			animation: speedLine 1.2s linear infinite;
		}

		.speed-text span::after {
			top: 65%;
			width: 80px;
			animation-delay: .3s;
		}

		/* @keyframes speedMove {
			0% {
				transform: translateX(-40px);
				opacity: 0;
			}
			50% {
				transform: translateX(0);
				opacity: 1;
			}
			100% {
				transform: translateX(40px);
				opacity: 0;
			}
		} */

		@keyframes speedLine {
			0% {
				transform: translateX(0);
				opacity: 0;
			}
			50% {
				opacity: .7;
			}
			100% {
				transform: translateX(200px);
				opacity: 0;
			}
		}

	/* about effcet */
		.scroll-fill {
			background: linear-gradient(to right, #000 50%, #cfcfcf 50%);
			background-size: 200% 100%;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-position: 100% 0;
		}

		.gear {
			transform-origin: 50% 50%;
			animation: gearRotate 6s linear infinite;
		}

		@keyframes gearRotate {
			from {
				transform: rotate(0deg);
			}
			to {
				transform: rotate(360deg);
			}
		}

	/* clientele marquee */
		.clientele-section {
			padding: 70px 0 40px;
			background: linear-gradient(180deg, #f7fbff 0%, #ffffff 100%);
		}

		.clientele-subtitle {
			font-size: 13px;
			letter-spacing: 1.4px;
			text-transform: uppercase;
			color: #0b73c0;
			font-weight: 600;
		}

		.clientele-marquee {
			position: relative;
			overflow: hidden;
			margin-top: 24px;
			mask-image: linear-gradient(to right, transparent, #000 10%, #000 90%, transparent);
			-webkit-mask-image: linear-gradient(to right, transparent, #000 10%, #000 90%, transparent);
		}

		.clientele-track {
			display: flex;
			width: max-content;
			animation: clientScroll 28s linear infinite;
		}

		.clientele-marquee:hover .clientele-track {
			animation-play-state: paused;
		}

		.clientele-item {
			flex: 0 0 auto;
			min-width: 180px;
			height: 86px;
			margin-right: 18px;
			border: 1px solid #e7eef7;
			border-radius: 14px;
			background: #fff;
			box-shadow: 0 10px 20px rgba(11, 115, 192, 0.08);
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 12px 18px;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.clientele-item:hover {
			transform: translateY(-4px);
			box-shadow: 0 14px 26px rgba(11, 115, 192, 0.14);
		}

		.client-logo {
			font-size: 20px;
			font-weight: 700;
			color: #123b66;
			letter-spacing: 0.4px;
		}

		@keyframes clientScroll {
			from {
				transform: translateX(0);
			}
			to {
				transform: translateX(-50%);
			}
		}

		@media (max-width: 767px) {
			.clientele-section {
				padding: 55px 0 25px;
			}

			.clientele-item {
				min-width: 145px;
				height: 76px;
				margin-right: 12px;
			}

			.client-logo {
				font-size: 16px;
			}
		}

	</style>
	@endsection('styles')

	<main class="main page-wraper">
	<section>
			<div>
				@include('hero_section')
			</div>
		</section>
		<section>
			<div>
				@include('capabilities_details')
			</div>
		</section>

		<section class="about-two">
			<div class="auto-container">
				<div class="sec-title">
					<div class="left-box">
						<div class="sub-title">About Auto Dynamics</div>
						<h3 class="tx-split-text split-in-left text-auto fw-medium">Transforming Automotive Ideas <br>into Dynamic Solutions</h3>
					</div>
					<div class="right-box">
						<div class="text scroll-fill">Autodynamic is the story of a dream that brings uniqueness to products ahead of the times. We provide innovative lightweight composite solutions to the automotive industry, satisfying needs for safety, performance, and sustainability.</div>
						<div class="text scroll-fill">Our highly qualified team of professionals with more than 25 years of experience operates from our Technology and Research Centre in Pune, serving OEMs across India and global markets.</div>
						<a href="#" class="btn-accent d-inline-flex align-items-center gap-2">
							Read More
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="m5 15 6-6-6-6"></path>
							</svg>
						</a>
					</div>
				</div>
				<div class="row clearfix">
					<div class="column col-lg-7 col-md-12 col-sm-12">
						<div class="image img-reveal video-box">
							<video id="companyVideo" controls preload="metadata">
								<source src="assets/images/AutodynamicTechnologiesandSolutionsPvtLtd.mp4" type="video/mp4">
							</video>
							{{-- <button class="play-btn" id="playBtn">
								<i class="fa fa-play"></i>
							</button>
							<button class="stop-btn" id="stopBtn">
								<i class="fa fa-stop"></i>
							</button> --}}
						</div>
					</div>
					<div class="column col-lg-5 col-md-12 col-sm-12">
						<div class="about-content" style="background-image: url(images/background/about-2.png)">
							<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="28" cy="28" r="24" stroke="#fff" stroke-width="2" />
								<g class="gear" stroke="#fff" stroke-width="2" stroke-linecap="round">
									<circle cx="28" cy="28" r="8" />
									<line x1="28" y1="14" x2="28" y2="18" />
									<line x1="28" y1="38" x2="28" y2="42" />
									<line x1="14" y1="28" x2="18" y2="28" />
									<line x1="38" y1="28" x2="42" y2="28" />
									<line x1="18" y1="18" x2="21" y2="21" />
									<line x1="35" y1="35" x2="38" y2="38" />
									<line x1="35" y1="21" x2="38" y2="18" />
									<line x1="18" y1="38" x2="21" y2="35" />
								</g>
							</svg>
							<h4>Company Mission</h4>
							<div class="text">To be the leading provider of lightweight composite solutions for the automotive industry, delivering products that are safe, green, recyclable, and energy efficient.</div>
							<ul class="list">
								<li>
									<i class="fa-classic fa-solid fa-check"></i>Develop cost-effective lightweighting solutions
								</li>
								<li>
									<i class="fa-classic fa-solid fa-check"></i>Support India's transition to electric vehicles
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="column col-lg-4 col-md-6 col-sm-12">
						<div class="about-two-count count-box wow fadeInUp" data-wow-delay="150ms">
							<div class="count-outer">
								<span class="count-text" data-speed="3000" data-stop="30"></span>
								<sup>+</sup>
							</div>
							<div class="texts scroll-fill">Trusted by Automotive Industry Leaders</div>
						</div>
					</div>
					<div class="column col-lg-4 col-md-6 col-sm-12">
						<div class="about-two-count count-box wow fadeInUp" data-wow-delay="300ms">
							<div class="count-outer">
								<span class="count-text" data-speed="3000" data-stop="50"></span>
								<sup>%</sup>
							</div>
							<div class="texts scroll-fill">Successful Automotive Projects Delivered</div>
						</div>
					</div>
					<div class="column col-lg-4 col-md-6 col-sm-12">
						<div class="about-two-count count-box wow fadeInUp" data-wow-delay="450ms">
							<div class="count-outer">
								<span class="count-text" data-speed="3000" data-stop="25"></span>
								<sup>+</sup>
							</div>
							<div class="texts scroll-fill">Years of Excellence in Automotive Innovation</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="choose-section steps-one">
			<div class="steps-one_circle" style="background-image: url('../../assets/images/circle.png')"></div>
			<div class="auto-container">
			<div class="row">
				<div class="col-lg-6">
					<h3 class="mb-5 fw-medium text-auto">Our Technology</h3>
				</div>
				<div class="col-lg-6 text-end">
					<a href="#" class="news-link">KNOW MORE →</a>
				</div>
			</div>
			<div class="inner-container">
				<div class="row clearfix">
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="choose-block_one group-card">
							<div class="gradient-line"></div>
							<div class="inner wow fadeInUp" data-wow-delay="150ms">
								<div class="bg-circle"></div>
								<div class="feature-card">
									<div class="icon-box">
										<svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="#053164"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"></path>
											<path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"></path>
											<path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"></path>
										</svg>
									</div>
								</div>
								<div class="mt-4 fw-light">Lightweight Technology</div>
								<h4 class="title text-auto">Injection Molded Composites</h4>
								<div class="text">
									Achieve 20-52% weight reduction with injection molded composite solutions.
									Ideal for structural automotive components demanding high strength-to-weight ratio.
								</div>
								<ul class="list">
									<li>20-52% Weight Savings</li>
									<li>High Structural Integrity</li>
									<li>Cost-Effective Production</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="choose-block_one group-card">
							<div class="inner wow fadeInUp" data-wow-delay="150ms">
								<div class="bg-circle"></div>
								<div class="feature-card">
									<div class="icon-box">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="#053164"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
											class="combine-icon">
											<path class="p1" d="M14 3a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1"></path>
											<path class="p2" d="M19 3a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1"></path>
											<path class="p3" d="m7 15 3 3"></path>
											<path class="p4" d="m7 21 3-3H5a2 2 0 0 1-2-2v-2"></path>
											<rect class="box1" x="14" y="14" width="7" height="7" rx="1"></rect>
											<rect class="box2" x="3" y="3" width="7" height="7" rx="1"></rect>
										</svg>
									</div>
								</div>
								<div class="mt-4 fw-light">Hybrid Technology</div>
								<h4 class="title text-auto">Laminate Insert Molding</h4>
								<div class="text">
									Combining continuous fiber laminates with injection molding for superior mechanical performance. Perfect for load-bearing automotive structures.
								</div>
								<ul class="list">
									<li>Superior Stiffness</li>
									<li>Continuous Fiber Reinforcement</li>
									<li>Complex Geometries</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="choose-block_one group-card">
							<div class="inner wow fadeInUp" data-wow-delay="150ms">
								<div class="bg-circle"></div>
								<div class="feature-card">
									<div class="icon-box">
										<svg class="factory-icon" xmlns="http://www.w3.org/2000/svg"
											width="24" height="24" viewBox="0 0 24 24"
											fill="none" stroke="#053164" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path d="M12 16h.01"></path>
											<path d="M16 16h.01"></path>
											<path d="M3 19a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.5a.5.5 0 0 0-.769-.422l-4.462 2.844A.5.5 0 0 1 15 10.5v-2a.5.5 0 0 0-.769-.422L9.77 10.922A.5.5 0 0 1 9 10.5V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2z"></path>
											<path d="M8 16h.01"></path>
										</svg>
									</div>
								</div>
								<div class="mt-4 fw-light">Technical Components</div>
								<h4 class="title text-auto">Injection Molding</h4>
								<div class="text">High-precision injection molding for interior, exterior, and under-hood components. Scalable production with reliable, durable, and efficient consistent quality.</div>
								<ul class="list">
									<li>High Volume Production</li>
									<li>Tight Tolerances</li>
									<li>Multi-Material Capability</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>

		<section>
			<div class="auto-container">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-5 fw-medium text-auto">Capabilities</h3>
					</div>
					<div class="col-lg-6 text-end">
						<a href="#" class="news-link">KNOW MORE →</a>
					</div>
				</div>	
				<div class="case-wrapper">
					<div class="case-card active">
						<div class="case-details case-studio-bg">
							<h3 class="title text-auto">Smart Vehicle Inspection System</h3>
							<p> This case study highlights the development of a smart vehicle inspection system designed to improve accuracy and efficiency during vehicle assessments. </p>
							<a href="#" class="know-more">KNOW MORE →</a>
						</div>
						<div class="case-image">
							<img src="{{ asset('assets/images/InspectionSystem.png') }}">
							<div class="overlay">
								<div class="case-badge">CASE STUDY</div>
								<h5 class="text-white">Smart Vehicle Inspection System</h5>
							</div>
						</div>
					</div>
					<div class="case-card">
						<div class="case-details case-studio-bg">
							<h3 class="title text-auto">Digital Transformation in Automotive Service Centers</h3>
							<p> Many automotive service centers still rely on manual systems for managing customers, repairs, and vehicle records.
						</div>
						<div class="case-image">
							<img src="{{ asset('assets/images/Transformation.png') }}">
							<div class="overlay">
								<div class="case-badge">CASE STUDY</div>
								<h5 class="text-white">Digital Transformation in Automotive Service Centers</h5>
							</div>
						</div>
					</div>
					<div class="case-card">
						<div class="case-details case-studio-bg">
							<h3 class="title text-auto">Implementing Connected Vehicle Monitoring</h3>
							<p> This case study focuses on implementing a connected vehicle monitoring system that allows fleet managers to track vehicle performance, fuel usage, and driver behavior in real time. </p>
							<a href="#" class="know-more">KNOW MORE →</a>
						</div>
						<div class="case-image">
							<img src="{{ asset('assets/images/Implementing.png') }}">
							<div class="overlay">
								<div class="case-badge">CASE STUDY</div>
								<h5 class="text-white">Implementing Connected Vehicle Monitoring</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="clientele-section">
			<div class="auto-container">
				<div class="text-center">
					<div class="clientele-subtitle mb-2">Our Clientele</div>
					<h3 class="fw-medium text-auto mb-0">Trusted by Industry Leaders</h3>
				</div>

				<div class="clientele-marquee">
					<div class="clientele-track">
						<div class="clientele-item"><span class="client-logo">AUTOX</span></div>
						<div class="clientele-item"><span class="client-logo">DRIVON</span></div>
						<div class="clientele-item"><span class="client-logo">NEXWHEEL</span></div>
						<div class="clientele-item"><span class="client-logo">VOLTRO</span></div>
						<div class="clientele-item"><span class="client-logo">MOTIONIX</span></div>
						<div class="clientele-item"><span class="client-logo">GEARLAB</span></div>
						<div class="clientele-item"><span class="client-logo">RAPIDCAR</span></div>
						<div class="clientele-item"><span class="client-logo">EVTRON</span></div>
						<div class="clientele-item"><span class="client-logo">AUTOX</span></div>
						<div class="clientele-item"><span class="client-logo">DRIVON</span></div>
						<div class="clientele-item"><span class="client-logo">NEXWHEEL</span></div>
						<div class="clientele-item"><span class="client-logo">VOLTRO</span></div>
						<div class="clientele-item"><span class="client-logo">MOTIONIX</span></div>
						<div class="clientele-item"><span class="client-logo">GEARLAB</span></div>
						<div class="clientele-item"><span class="client-logo">RAPIDCAR</span></div>
						<div class="clientele-item"><span class="client-logo">EVTRON</span></div>
					</div>
				</div>
			</div>
		</section>

		<section class="cta-section pt-5 pb-5">
			<div class="auto-container">
				<div class="cta-box">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<h2 class="cta-title text-white"> Ready to Innovate <br>
								<h2 class="speed-text">
									<span>Your Products?</span>
								</h2>
							</h2>	
							<p class="cta-text"> From concept to mass production — let us help you develop lightweight, high-performance composite solutions for your vehicles. </p>
						</div>
						<div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
							<a href="#" class="btn btn-touch"> Get in Touch → </a>
							<a href="#" class="btn btn-call"> ☎ Call Us </a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="orbit-section d-none">
			<div class="orbit orbit1">
				<div class="orbit-item">
					<img src="images/tech1.jpg">		
				</div>
			</div>
			<div class="orbit orbit2">
				<div class="orbit-item">
					<img src="images/tech2.jpg">
				</div>
			</div>
			<div class="orbit orbit3">
				<div class="orbit-item">
					<img src="images/tech3.jpg">
				</div>
			</div>
		</section>

	</main>

	@section('scripts')
		<script>
			gsap.registerPlugin(ScrollTrigger);
			gsap.utils.toArray(".scroll-fill").forEach(function (el) {

				gsap.to(el, {
					backgroundPosition: "0% 0%",
					ease: "none",

					scrollTrigger: {
						trigger: el,
						start: "top 85%",
						end: "top 40%",
						scrub: true
					}
				});
			});
		</script>

		<script>
			document.querySelectorAll(".count-text").forEach(function (counter) {
				let target = counter.getAttribute("data-stop");
				gsap.fromTo(counter, {
					innerText: 0
				}, {
					innerText: target,
					duration: 2,
					ease: "power1.out",
					snap: {
						innerText: 1
					},

					scrollTrigger: {
						trigger: counter,
						start: "top 85%"
					},

					onUpdate: function () {
						counter.innerText = Math.ceil(counter.innerText);
					}
				});
			});
		</script>

		<script>
			gsap.registerPlugin(ScrollTrigger);
			gsap.utils.toArray(".scroll-fill").forEach(el => {
				gsap.to(el, {
					backgroundPosition: "0% 0%",
					scrollTrigger: {
						trigger: el,
						start: "top 80%",
						end: "top 40%",
						scrub: true
					}
				});
			});
			document.querySelectorAll(".counter").forEach(counter => {
				let target = +counter.getAttribute("data-target");
				gsap.fromTo(counter, {
					innerText: 0
				}, {
					innerText: target,
					duration: 2,
					ease: "power1.out",
					snap: {
						innerText: 1
					},
					scrollTrigger: {
						trigger: counter,
						start: "top 80%"
					},
					onUpdate: function() {
						counter.innerText = Math.ceil(counter.innerText);
					}
				});
			});
		</script>

		<script>
			const video = document.getElementById("companyVideo");
			const playBtn = document.getElementById("playBtn");
			const stopBtn = document.getElementById("stopBtn");

			playBtn.addEventListener("click", function () {
				video.play();
				playBtn.style.display = "none";
			});

			stopBtn.addEventListener("click", function () {
				video.pause();
				video.currentTime = 0;
				playBtn.style.display = "block";
			});
		</script>

		<script>
			const cards = document.querySelectorAll('.case-card');
			cards.forEach(card => {
				card.addEventListener('mouseenter', () => {
					if (window.innerWidth > 991) {
						cards.forEach(c => c.classList.remove('active'));
						card.classList.add('active');
					}
				})
			})
		</script>
	@endsection('scripts')

	@endsection('content')
