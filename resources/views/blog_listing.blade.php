@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">

    <div class="dz-bnr-inr dz-banner-dark overlay-secondary-middle dz-bnr-inr-md" style="background-image:url('../../assets/images/media_banner.jpg');">
        <div class="container">
            <div class="dz-bnr-inr-entry d-table-cell">
                <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s">Blogs</h1>
                <div class="d-flex mt-4">
                    <div>
                        <a href="{{url('contact-us')}}" class="btn btn-sm btn-primary btn-shadow wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.8s">
                            <span class="w-100">Get Appointment</span>
                            <span class="right-icon">
                                <i class="feather icon-arrow-right"></i>
                            </span>
                        </a>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="info-widget style-5">
                        <div class="widget-media text-primary">
                            <i class="feather icon-phone-call dz-ring-effect text-white"></i>
                        </div>
                        <div class="widget-content">
                            <h6 class="title text-white">Contact us?</h6>
                            <a href="tel:+919321993651" class="text-secondary text-white">+91 9321993651</a>
                        </div>
                    </div>
                </div>
                <nav aria-label="breadcrumb" class="breadcrumb-row wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.8s">
                </nav>
            </div>
        </div>
    </div>

    <section class="content-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 m-b30">
                    <div class="row loadmore-content">
                        @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                        <div class="col-md-6 m-b30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s">
                            <div class="dz-card style-4">
                                <div class="dz-media">
                                    <img src="{{asset('assets/images/blogs/Add-a-heading.png')}}" alt="">
                                </div>
                                <div class="dz-info">
                                    <div class="dz-meta">
                                        <ul>
                                            <li class="post-date">{{date('d M Y', strtotime($blog->date))}}</li>
                                        </ul>
                                    </div>
                                    <h3 class="dz-title">
                                        <a href="{{url('blog-detail/'.$blog->id.'/'.Str::slug($blog->title))}}">{{Str::limit($blog->title, 70)}}</a>
                                    </h3>
                                    <a href="{{url('blog-detail/'.$blog->id.'/'.Str::slug($blog->title))}}" class="btn-link icon-link-hover-end"> Read more <i class="feather icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-info alert-icon alert-dismissible fade show" role="alert">
                            <i class="uil uil-exclamation-circle"></i> No blogs available
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection('content')