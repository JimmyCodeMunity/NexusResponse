@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Update Medic </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div>
        <div class="items-center justify-center my-5">
                            <img class="img-xs rounded-circle" 
     src="{{ $getRecord->profile_pic ? asset($getRecord->profile_pic) : asset('images/happy.png') }}" 
     alt="">
                            </div>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Medic Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('name',$getRecord->name) }}" style="color:white"
                                            class="form-control" name="name" required id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('contact',$getRecord->contact) }}" style="color:white"
                                            class="form-control" name="contact" id="exampleInputUsername1"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                
                            </div>
                            
                            

                            
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Profile Pic<span class="text-danger">*</span>
                                        </label>
                                        <input type="file" value="{{ old('profile_pic') }}" style="color:white"
                                            class="form-control" name="profile_pic" id="exampleInputUsername1"
                                            placeholder="">
                                    </div>
                                </div>
                            
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Type <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('blood_type',$getRecord->blood_type) }}"
                                            style="color:white" class="form-control" name="blood_type"
                                            id="exampleInputUsername1" placeholder="Blood Type">
                                    </div>
                                </div>
                            </div>
                            
                            

                            
                            <hr>

                            

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ old('email',$getRecord->email) }}" style="color:white"
                                    class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" value="{{ old('password')}}" style="color:white"
                                    class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/medic/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
