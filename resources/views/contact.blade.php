@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .error{
        font-size: 13.5px!important;
        color: red!important;
    }
    /*label.error {
        margin-top: 50px;
    }*/
    .required:after{
        content: ' *'!important;
        color: red!important;
    }
    
    /*sweeralert msg*/
    .swal-button:not([disabled]):hover {
        background-color: #142e41;
    }
    .swal-footer {
        text-align: center;
        padding-top: 13px;
        margin-top: 13px;
        padding: 13px 16px;
        border-radius: inherit;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .swal-button {
        background-color: #0b1725;
        color: #fff;
        border: none;
        box-shadow: none;
        border-radius: 5px;
        font-weight: 600;
        font-size: 14px;
        padding: 2px 20px;
        margin: 0;
        cursor: pointer;
    }
    .swal-icon--success__line {
        height: 5px;
        background-color: #70a850;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 2;
    }
    .swal-icon--success__ring {
        width: 80px;
        height: 80px;
        border: 4px solid hsl(98deg 87.85% 27.66% / 71%);
        border-radius: 50%;
        box-sizing: content-box;
        position: absolute;
        left: -4px;
        top: -4px;
        z-index: 2;
    }
    .swal-text {
        font-size: 16px;
        position: relative;
        float: none;
        line-height: normal;
        vertical-align: top;
        text-align: left;
        display: inline-block;
        margin: 0;
        padding: 0 10px;
        font-weight: 400;
        color: rgb(10 22 35);
        max-width: calc(100% - 20px);
        overflow-wrap: break-word;
        box-sizing: border-box;
    }
    .swal-title {
        color: rgb(20 46 65);
        font-weight: 600;
        text-transform: none;
        position: relative;
        display: block;
        padding: 13px 16px;
        font-size: 27px;
        line-height: normal;
        text-align: center;
        margin-bottom: 0;
    }
    
    .swal-button:not([disabled]):hover {
        background-color: #142e41;
    }
    .swal-footer {
        text-align: center;
        padding-top: 13px;
        margin-top: 13px;
        padding: 13px 16px;
        border-radius: inherit;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .swal-button {
        background-color: #0b1725;
        color: #fff;
        border: none;
        box-shadow: none;
        border-radius: 5px;
        font-weight: 600;
        font-size: 14px;
        padding: 2px 20px;
        margin: 0;
        cursor: pointer;
    }
    .swal-icon--success__line {
        height: 5px;
        background-color: #70a850;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 2;
    }
    .swal-icon--success__ring {
        width: 80px;
        height: 80px;
        border: 4px solid hsl(98deg 87.85% 27.66% / 71%);
        border-radius: 50%;
        box-sizing: content-box;
        position: absolute;
        left: -4px;
        top: -4px;
        z-index: 2;
    }
    .swal-text {
        font-size: 16px;
        position: relative;
        float: none;
        line-height: normal;
        vertical-align: top;
        text-align: left;
        display: inline-block;
        margin: 0;
        padding: 0 10px;
        font-weight: 400;
        color: rgb(10 22 35);
        max-width: calc(100% - 20px);
        overflow-wrap: break-word;
        box-sizing: border-box;
    }
    .swal-title {
        color: rgb(20 46 65);
        font-weight: 600;
        text-transform: none;
        position: relative;
        display: block;
        padding: 13px 16px;
        font-size: 27px;
        line-height: normal;
        text-align: center;
        margin-bottom: 0;
    }
</style>
@endsection('styles')

<main class="main">

    <div class="ttm-page-title-connect ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Contact Us</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
    </div>

    <section class="ttm-row conatct-section clearfix res-991-margin_top30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3>Get in Touch With Deep Dive Goa</h3>
                            <h2 class="title">Let’s Plan Your Perfect Goa Adventure</h2>
                        </div>
                        <div class="title-desc">
                            <p>We take great pride in everything we do. With complete control over our services, we ensure you receive the best experience every time you connect with us.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="ttm-bgcolor-white border-rad_5 p-30">
                        <form action="{{url('contact-us')}}" id="contactPage" class="request_qoute_form wrap-form clearfix" method="POST">@csrf 
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-input"><input name="name" type="text" placeholder="Your Name*" required="required"></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-input"><input name="email" type="email" placeholder="Your Email*" required="required"></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-input"><input name="phone" type="number" placeholder="Phone Number*" required="required"></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-input">
                                        <select name="service" required="required">
                                            <option value="" disabled selected>Select Adventure Activity*</option>
                                            <option value="Scuba Diving">Scuba Diving</option>
                                            <option value="Water Sports">Water Sports</option>
                                            <option value="Island Trip">Island Trip</option>
                                            <option value="Dinner Cruise">Dinner Cruise</option>
                                            <option value="Dudhsagar Safari">Dudhsagar Safari</option>
                                            <option value="Custom Package">Custom Package</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-lg-12">
                                    <span class="text-input">
                                        <textarea name="comment" rows="5" placeholder="Message" required="required"></textarea>
                                    </span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="g-recaptcha mb-3" id="feedback-recaptcha" data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                                    <button class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-skincolor w-100 margin_top5" type="submit">Send now!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ttm-bgcolor-white p-30 border-rad_5 margin_top15 card bg-base-dark">
                        <div class="featured-icon-box icon-align-top-content margin_top0 margin_bottom25">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg"> 
                                    <i class="flaticon-email"></i>
                                </div>
                            </div>
                            <div class="featured-content pt-2">
                                <div class="featured-title">
                                    <h3 class="margin_bottom0 fs-20">Email</h3>
                                </div>
                                <div class="featured-desc"><a href="mailto:goascubasafaris@gmail.com">goascubasafaris@gmail.com</a></div>
                            </div>
                        </div>
                        <div class="featured-icon-box icon-align-top-content margin_bottom25">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-lg"> 
                                    <i class="flaticon-address"></i>
                                </div>
                            </div>
                            <div class="featured-content pt-2">
                                <div class="featured-title">
                                    <h3 class="margin_bottom0 fs-20">Address</h3>
                                </div>
                                <div class="featured-desc">Shop No. 121, Park Avenue Building, Calangute Baga Road, Opp. McDonald’s, Umtav Vado, Calangute, Goa 403516</div>
                            </div>
                        </div>
                        <div class="featured-icon-box icon-align-top-content margin_bottom10 d-none">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                    <i class="flaticon flaticon-map-pointer"></i>
                                </div>
                            </div>
                            <div class="featured-content pt-2">
                                <div class="featured-title">
                                    <h3 class="margin_bottom0 fs-20">Call</h3>
                                </div>
                                <div class="featured-desc"><a href="tel:8882361935">+91 8882361935</a></div>
                            </div>
                        </div>
                        <div class="featured-icon-box icon-align-top-content margin_bottom10">
                            <div class="featured-icon">
                                <div class="ttm-icon ttm-icon_element-onlytxt ttm-icon_element-color-skincolor ttm-icon_element-size-md"> 
                                    <i class="flaticon flaticon-map-pointer"></i>
                                </div>
                            </div>
                            <div class="featured-content pt-2">
                                <div class="featured-title">
                                    <h3 class="margin_bottom0 fs-20">Office Number</h3>
                                </div>
                                <div class="featured-desc"><a href="tel:7744000498">+91 7744000498</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ttm-row conatact-section mb_20 clearfix pb-80">
        <div class="container">
            <div class="row ttm-boxes-spacing-30px justify-content-center">
                <div class="col-lg-10 ttm-box-col-wrapper">
                    <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Shop No. 121, Park Avenue Building, Calangute Baga Road, Opp. McDonald’s, Umtav Vado, Calangute, Goa 403516&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="740" height="405"></iframe>
                </div>
            </div>               
        </div>
    </section>

</main>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#0b1725'
        })
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#0b1725'
        })
    @endif
</script>
<!--<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>-->
<script src="{{ asset('backend_js/jquery.validate.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Letters only please *");
    $("#contactPage").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            treatment: {
                required: true,
            },
            email: {
                required: true,
            },

            comment: {
                required: true,
            },
           
            phone: {
                required: true,
                number: true,
                 maxlength: 10,
                 minlength: 10
            },
           
            
        },
        messages: {
            
            name: {
                required: "This field is required.",   
            },
            email: {
                required: "This field is required.",   
            },
            message: {
                required: "This field is required.",   
            },
            phone: {
                required: "This field is required.",   
                number: "Please enter valid number",
            },

        },
        submitHandler: function(form) {
            $(".cbtn").attr("disabled", true);
            $(".cbtn").html("<i class='fa fa-spinner fa-spin'></i> Please wait...");
            form.submit();
        }
    });
</script>
@endsection('scripts')
@endsection('content')