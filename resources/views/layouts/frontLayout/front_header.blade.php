@php 
    $url = url()->current(); 
@endphp
<style>
    a.active {
        color: #0b73c0 !important;
        text-decoration: none !important;
        font-weight: bold !important;
        display: inline-block; 
        position: relative;
        padding-bottom: 5px; 
    }

    .marquee-wrapper {
        width: 70%;
        overflow: hidden;
        white-space: nowrap;
        background: linear-gradient(135deg, #073764, #0b73c0);
        color: #fff;
        font-weight: 600;
        position: relative;
    }

    .marquee-content {
        display: inline-block;
        /*padding-left: 100%;*/
        animation: scroll-left 20s linear infinite;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-100%);
        }
    }


</style>

<div id="wrapper">

    <header class="main-header header-style-four">
        <div class="header-lower">
            <div class="container">
                <!-- Main box -->
                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('assets/images/auto_dynamic_logo.png')}}" alt="Logo" /></a>
                        </div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer">
                        <nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="dropdown">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{url('about-us')}}">About Us </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Technology</a>
                                </li>
                                <li class="dropdown"><a href="#">Capabilities</a>
                                </li>
                                <li class="dropdown"><a href="#">Products</a>
                                    <ul>
                                        <li><a href="#">Interior</a></li>
                                        <li><a href="#">Exterior</a></li>
                                        <li><a href="#">Under Bonnet</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Media</a>
                                    <ul>
                                        <li><a href="#">News</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Career</a>
                                </li>
                                <li class="dropdown"><a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                    <!-- Main Menu End-->

                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>

            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo">
                        <a href="{{url('/')}}"><img src="{{asset('assets/images/auto_dynamic_logo.png')}}" alt="" title="" /></a>
                    </div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>

                <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
                <ul class="contact-list-one">
                    <li>
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <div class="text"><a href="tel:+92880098670">+92 (8800) - 98670</a></div>
                    </li>
                    <li>
                        <i class="icon lnr-icon-envelope1"></i>
                        <span class="title">Send Email</span>
                        <div class="text"><a href="mailto:help@company.com">help@company.com</a></div>
                    </li>
                    <li>
                        <i class="icon lnr-icon-map-marker"></i>
                        <span class="title">Address</span>
                        <div class="text">66 Broklyant, New York India 3269</div>
                    </li>
                </ul>

                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>

            <div class="search-inner">
                <form method="post" action="https://html.kodesolution.com/2025/agencyo-html/index.html">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="Search..." required="" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('assets/images/auto_dynamic_logo.png')}}" alt="" title="" /></a>
                    </div>

                    <!--Right Col-->
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">
                                    <!--Keep This Empty / Menu will come through Javascript-->
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sticky Menu -->
    </header>

</div>