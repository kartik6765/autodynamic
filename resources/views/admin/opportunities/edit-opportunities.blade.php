<?php $email = session('adminSession'); ?>
@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Career Opportunities Section</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Career Opportunities Section</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
<<<<<<< HEAD
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="post" action="{{ url('admin/edit-opportunities/'.$opportunities->id) }}" enctype="multipart/form-data" role="form" id="editBanner">@csrf 
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="required">Designation Name</label>
                                        <input type="text" name="designation_name" class="form-control" id="title" value="{{ $opportunities->designation_name }}" placeholder="Enter Designation Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label class="required">Job Description</label>
                                            <small>(Note: Text maximum length should be 100 words)</small>
                                            <textarea name="job_description" class="textarea form-control" placeholder="Enter Job Description" valve="{!! $opportunities->job_description !!}" required>{!! $opportunities->job_description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1" class="required">Location</label>
                                        <input type="text" name="location" class="form-control" id="title" value="{{ $opportunities->location }}" placeholder="Enter Location" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="exampleInputEmail1" class="required">Experience</label>
                                        <input type="text" name="experience" class="form-control" id="title" value="{{ $opportunities->experience }}" placeholder="Enter Experience" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail1" class="required">Qualification</label>
                                        <input type="text" name="qualification" class="form-control" id="title" value="{{ $opportunities->qualification }}" placeholder="Enter Qualification" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1" class="required">Job Application Receipt Email</label>
                                        <input type="text" name="email" class="form-control" id="title" value="{{ $opportunities->email }}" placeholder="Enter Job Application Receipt Email" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" @if($opportunities->status == 1) checked @endif >
                                            <label class="form-check-label" for="status">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary submit">
                                    <i class="fa fa-check-circle"></i> Update </button>
                            </div>
                        </form>
=======
      <div class="container-fluid">
        <div class="row">
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
            <div class="col-md-12">
            
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Edit Career Opportunities</h3>
              </div>
              <form method="post" action="{{ url('admin/edit-opportunities/'.$opportunities->id) }}" enctype="multipart/form-data" role="form" id="editBanner">@csrf

                <div class="card-body form-row"> 
                    
                    <div class="form-group col-md-4">
                        <label class="required">Designation</label>
                        <input type="text" name="designation_name" class="form-control" value="{{ $opportunities->designation_name }}" placeholder="Enter Designation" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="required">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ $opportunities->location }}" placeholder="Enter Location" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="required">Qualification</label>
                        <input type="text" name="qualification" class="form-control" value="{{ $opportunities->qualification }}" placeholder="Enter Qualification" required>
                    </div> 

                    <div class="form-group col-md-4">
                        <label class="required">Experience</label>
                        <input type="text" name="experience" class="form-control" value="{{ $opportunities->experience }}" placeholder="Enter Experience" required>
                    </div>

                    <div class="form-group col-md-8">
                        <label class="required">Job Application Receive Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $opportunities->email }}" placeholder="Enter Job Application Receipt Email" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="required">Description</label>
                        <textarea name="job_description" class="textarea form-control" placeholder="Enter Job Description" valve="{!! $opportunities->job_description !!}" required>{!! $opportunities->job_description !!}</textarea>
>>>>>>> b9a1e6484a5ec69a27e6d37b6ee8f9f8ce85488d
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary submit">
                        <i class="fa fa-check-circle"></i> Update </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </section>
</div>
  

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editBanner').validate({
            ignore: [],
            debug: false,
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required: false,
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
