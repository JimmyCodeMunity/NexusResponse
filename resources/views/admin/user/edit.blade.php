@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="items-center justify-center my-5">
                            <img class="img-xs rounded-circle" 
     src="{{ $getRecord->profile_pic ? asset($getRecord->profile_pic) : asset('images/happy.png') }}" 
     alt="">
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('name',$getRecord->name)}}" style="color:white"
                                            class="form-control" name="name"  id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Insurance <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('insurance',$getRecord->insurance)}}" style="color:white"
                                            class="form-control" name="insurance" id="exampleInputUsername1"
                                            placeholder="Insurance">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Age <span
                                                class="text-danger">*</span> </label>
                                        <input type="text" value="{{ old('age',$getRecord->age)}}" style="color:white"
                                            class="form-control" name="age" id="exampleInputUsername1"
                                            placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Allergies <span
                                                class="text-danger">*</span></label>
                                        <input type="text"  value="{{ old('allergies',$getRecord->allergies)}}" style="color:white"
                                            class="form-control" name="allergies" id="exampleInputUsername1"
                                            placeholder="Roll Number">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Address <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('address',$getRecord->address)}}" style="color:white"
                                            class="form-control" name="address"  id="exampleInputUsername1"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Pressure <span
                                                class="text-danger">*</span></label>
                                        <input type="text"  value="{{ old('blood_pressure',$getRecord->blood_pressure)}}" style="color:white"
                                            class="form-control" name="blood_pressure" id="exampleInputUsername1"
                                            placeholder="Blood Pressure">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text"  value="{{ old('contact',$getRecord->contact)}}"
                                            style="color:white" class="form-control" name="contact"
                                            id="exampleInputUsername1" placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Type <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('blood_type',$getRecord->blood_type)}}"
                                            style="color:white" class="form-control" name="blood_type"
                                            id="exampleInputUsername1" placeholder="Blood Group">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Height <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" value="{{ old('name',$getRecord->height)}}" style="color:white"
                                            class="form-control" name="height" required id="exampleInputUsername1"
                                            placeholder="Height">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Weight <span
                                                class="text-danger">*</span></label>
                                        <input type="number" required value="{{ old('weight',$getRecord->weight)}}" style="color:white"
                                            class="form-control" name="weight" id="exampleInputUsername1"
                                            placeholder="Weight">
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
                            </div>
                            <hr>

                            

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ old('email',$getRecord->email)}}" style="color:white"
                                    class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" value="{{ old('password')}}" style="color:white"
                                    class="form-control" name="password" id="exampleInputEmail1" placeholder="Password">
                                
                            </div>
                            


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/user/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
