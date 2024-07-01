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
                        <h4 class="card-title">Student Details</h4>
                        @include('message')

                        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('name') }}" style="color:white"
                                            class="form-control" name="name" required id="exampleInputUsername1"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Insurance <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('insurance') }}" style="color:white"
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
                                        <input type="text" value="{{ old('age') }}" style="color:white"
                                            class="form-control" name="age" required id="exampleInputUsername1"
                                            placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Allergies <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('allergies') }}" style="color:white"
                                            class="form-control" name="allergies" id="exampleInputUsername1"
                                            placeholder="Roll Number">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">DOB <span class="text-danger">*</span> </label>
                                        <input type="date" value="{{ old('date_of_birth') }}" style="color:white"
                                            class="form-control" name="date_of_birth" required id="exampleInputUsername1"
                                            placeholder="Date Of Birth">
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Pressure <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('blood_pressure') }}" style="color:white"
                                            class="form-control" name="blood_pressure" id="exampleInputUsername1"
                                            placeholder="Blood Pressure">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Address <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" value="{{ old('address') }}" style="color:white"
                                            class="form-control" name="address" required id="exampleInputUsername1"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('contact') }}"
                                            style="color:white" class="form-control" name="contact"
                                            id="exampleInputUsername1" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Profile Pic<span class="text-danger">*</span>
                                        </label>
                                        <input type="file" value="{{ old('profile_pic') }}" style="color:white"
                                            class="form-control" name="profile_pic" required id="exampleInputUsername1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Blood Type <span
                                                class="text-danger">*</span></label>
                                        <input type="text" required value="{{ old('blood_type') }}"
                                            style="color:white" class="form-control" name="blood_type"
                                            id="exampleInputUsername1" placeholder="Blood Group">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Height <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" value="{{ old('height') }}" style="color:white"
                                            class="form-control" name="height" required id="exampleInputUsername1"
                                            placeholder="Height">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Weight <span
                                                class="text-danger">*</span></label>
                                        <input type="number" required value="{{ old('weight') }}" style="color:white"
                                            class="form-control" name="weight" id="exampleInputUsername1"
                                            placeholder="Weight">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ old('email') }}" style="color:white"
                                    class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" value="{{ old('password') }}" style="color:white"
                                    class="form-control" name="password" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{ url('admin/admin/list') }}"
                                    class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
