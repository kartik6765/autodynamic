<?php $email = session('adminSession'); ?>
@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job Applications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Applications </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block w-50">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block w-50">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">About  Details</h3> --}}
                            
                        </div>
                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12"> 

                        <div class="card">                          
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                              <thead>
                              <tr>
                                <th>ID</th>
                                <th>Applicant Details</th>                    
                                <th>Qualification</th>
                                <th>Experience</th>
                                <th>CTC</th>
                                <th>Ref By & Source</th>                                        
                                <th>Date</th>                                     
                                <th>Resume</th>
                              </tr>
                              </thead>
                              <tbody>

                            @foreach($applications as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td class="text-left">Name: {{$row->name}} <br>
                                        Email: {{$row->email}}<br>
                                        Phone: {{$row->phone}}<br>
                                        Address: {{$row->address}}
                                    </td>
                                    <td>{{$row->qualification}}</td>
                                    <td>{{$row->experience}}</td>
                                    <td class="text-left">Current CTC: {{$row->current_ctc}} <br>
                                        Expected  CTC: {{$row->expect_ctc}}<br>
                                    </td>
                                    <td class="text-left">Ref By: {{$row->ref_by}} <br>
                                        Source: {{$row->source}}<br>
                                    </td>
                                    <td>{{date('d F Y', strtotime($row->created_at)) }}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{ url('/assets/applications/'.$row->resume) }}" download=""><i class="fa fa-paperclip"></i> Download</a>
                                    </td>
                                </tr>

                            @endforeach

                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
  @endsection