@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Career Opportunities Section</h4> 
                    @if(Session::has('flash_message_error')) 
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div> 
                    @endif 
                    @if(Session::has('flash_message_success')) 
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div> 
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Career Opportunities Section</li>
                    </ol>
                </div>
            </div>
<<<<<<< HEAD
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/add-opportunities') }}" enctype="multipart/form-data" id="addBanner">@csrf <div class="card-body">
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Designation Name</label>
                                        <input name="designation_name" class="form-control" placeholder="Enter Designation Name" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Job Description</label>
                                        <textarea name="job_description" class="textarea form-control" placeholder="Enter Job Description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Job Application Receipt Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Job Application Receipt Email" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Location</label>
                                        <input name="location" class="form-control" placeholder="Enter Location" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Qualification</label>
                                        <input name="qualification" class="form-control" placeholder="Enter Qualification" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <div class="form-group col-md-10">
                                        <label class="required">Experience</label>
                                        <input name="experience" class="form-control" placeholder="Enter Experience" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-10 ml-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                        <label class="form-check-label" for="status">Publish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary submit">
                                    <i class="fa fa-check-circle"></i> Add </button>
                            </div>
                        </form>
                    </div>
=======
            <form method="POST" action="{{ url('admin/add-opportunities') }}" enctype="multipart/form-data" id="addBanner">@csrf
                <div class="card-body form-row">
                    <div class="form-group col-md-4">
                        <label class="required">Designation</label>
                        <input name="designation_name" class="form-control" placeholder="Enter Job Designation" required>
                    </div>  

                    <div class="form-group col-md-4">
                        <label class="required">Location</label>
                        <input name="location" class="form-control" placeholder="Enter Job Location" required>
                    </div>  

                    <div class="form-group col-md-4">
                        <label class="required">Qualification</label>
                        <input name="qualification" class="form-control" placeholder="Enter Job Qualification" required>
                    </div>  

                    <div class="form-group col-md-4">
                        <label class="required">Experience</label>
                        <input name="experience" class="form-control" placeholder="Enter Job Experience" required>
                    </div>  

                    <div class="form-group col-md-8">
                        <label class="required">Job Application Receive Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>  

                    <div class="form-group col-md-12">
                        <label class="required">Description</label>
                        <textarea name="job_description" class="textarea form-control" placeholder="Enter Job Description" required></textarea>
                    </div>  
>>>>>>> b9a1e6484a5ec69a27e6d37b6ee8f9f8ce85488d
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Add </button>
                </div>
            </form>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#addBanner').validate({
            ignore: [],
            debug: false,
            rules: {
                content: {
                    required: true,
                },
                image: {
                    required: true,
                    accept: 'png|jpg|jpeg',
                },
                
            },
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection