@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
/* pages hero section */
    .breadcrumb a {
        text-decoration: none;
        color: #1f3c6b;
    }

    .works-hero {
        background: linear-gradient(90deg, #eef2f6, #f5f7fa);
        border-radius: 200px;
        padding: 40px 60px;
        position: relative;
        overflow: hidden;
    }

    .bg-text {
        position: absolute;
        bottom: -10px;
        left: 80px;
        font-size: 110px;
        font-weight: 700;
        color: #ffffff;
        opacity: .35;
        pointer-events: none;
    }

    .works-title {
        font-size: 42px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .works-desc {
        color: #000;
        margin-bottom: 20px;
    }

    .btn-talk {
        background: #174f8a;
        color: #fff;
        padding: 10px 26px;
        border-radius: 40px;
        font-weight: 500;
    }

    .btn-talk:hover {
        background: #bbe9ff;
    }

    .hero-image img {
        width: 100%;
        border-radius: 120px;
    }

    .icon-box {
        position: absolute;
        bottom: -15px;
        right: 180px;
        background: #ff6a21;
        width: 80px;
        height: 80px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .icon-box img {
        width: 40px;
    }

    @media(max-width:992px) {
        .works-hero {
            border-radius: 40px;
            padding: 30px;
        }

        .bg-text {
            font-size: 60px;
            left: 20px;
        }

        .hero-image {
            margin-top: 20px;
        }
    }
</style>
@endsection('styles')

<main class="main">

   <section>
        <div class="container pb-80 pt-5">
            
            <div class="works-hero logo-shape">
                <div class="row align-items-center">
                    <div class="breadcrumb mb-4">
                        <a href="#">Home</a>
                        <span class="mx-2">/</span>
                        <a href="#">About Us</a>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="works-title text-auto">About Us</h1>
                        <p class="works-desc"> Delivering innovative lightweight composite solutions for the automotive industry since over 25 years </p>
                        <a href="#" class="btn btn-talk"> Let's Talk → </a>
                    </div>
                    <div class="col-lg-6 hero-image">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692">
                    </div>
                </div>
                {{-- <div class="bg-text">Our Works</div> --}}
                <div class="icon-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
                </div>
            </div>
        </div>
   </section>

</main>

@endsection('content')