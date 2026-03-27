@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">

    <div class="breadcrumb-section careermobilebanner" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .55), rgba(0, 0, 0, 0.55) 101.02%), url(assets/img/career_banner.png);"> 
        {{-- <div class="company-name">SHREE agro</div> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>Careers</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Careers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="career-page pt-50 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row g-lg-4 gy-5 mb-70">
                        <div class="col-lg-12">
                            <div>
                                <h2 class="text-title">We’re Always Searching for Amazing People to Join Our Team.</h2>
                            </div>
                        </div>
                        <!--<div class="col-lg-5">-->
                        <!--    <div class="position-apply-area">-->
                        <!--        <div class="icon">-->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42">-->
                        <!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M35.6529 3.71829L0 39.3693L2.63069 42L38.2817 6.34713V30.9976H42V0H11.0024V3.71829H35.6529Z"/>-->
                        <!--            </svg>-->
                        <!--        </div>-->
                        <!--        <div class="content">-->
                        <!--            <p>Join us as we cultivate success and harvest a brighter future!</p>-->
                        <!--            <a href="{{url('/careers#JobOpenings')}}">-->
                        <!--                Job Openings-->
                        <!--                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">-->
                        <!--                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1865 1.06237L0 11.2484L0.751627 12L10.9376 1.81347V8.85645H12V0H3.14355V1.06237H10.1865Z"/>-->
                        <!--                </svg>   -->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-post-section" id="JobOpenings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-3">
                    @if($opportunities->isEmpty())
                        <div class="alert alert-warning text-center">
                            There are no vacancies at the moment. Keep an eye on this space for future career opportunities.
                        </div>
                    @else
                        @foreach($opportunities as $job)
                            <div class="single-job-card mb-30">
                                <div class="job-list-content">
                                    <div class="post-name">
                                        <h4>{{$job->designation_name}}</h4>
                                        <span>{{Str::limit($job->job_description, 100)}}</span>
                                    </div>
                                </div>
                                <div class="job-discription">
                                    <ul> 
                                        <li>{{$job->location}}</li> 
                                    </ul>
                                </div>
                                <a class="primary-btn1 btn-hover" href="{{url('careers/job-details/'.$job->id.'/'.Str::slug($job->designation_name))}}">
                                    Apply Position
                                    <img src="{{asset('assets/img/favicon.ico')}}" width="20">
                                    <span style="top: 240.594px; left: 153.5px;"></span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</main>

@endsection('content')