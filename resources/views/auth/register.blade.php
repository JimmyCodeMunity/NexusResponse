<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Account</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-8 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3 text-center">Create Account</h3>
                            <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('message')

                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control p_input text-white" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control p_input text-white" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" required class="form-control p_input text-white" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Insurance <span class="text-danger">*</span></label>
                                    <input type="text" name="insurance" value="{{ old('insurance') }}" required class="form-control p_input text-white" placeholder="Insurance">
                                </div>

                                <div class="form-group">
                                    <label>Age <span class="text-danger">*</span></label>
                                    <input type="text" name="age" value="{{ old('age') }}" required class="form-control p_input text-white" placeholder="Age">
                                </div>

                                <div class="form-group">
                                    <label>Allergies <span class="text-danger">*</span></label>
                                    <input type="text" name="allergies" value="{{ old('allergies') }}" required class="form-control p_input text-white" placeholder="Allergies">
                                </div>

                                <div class="form-group">
                                    <label>Blood Pressure <span class="text-danger">*</span></label>
                                    <input type="text" name="blood_pressure" value="{{ old('blood_pressure') }}" required class="form-control p_input text-white" placeholder="Blood Pressure">
                                </div>

                                <div class="form-group">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="{{ old('address') }}" required class="form-control p_input text-white" placeholder="Address">
                                </div>

                                <div class="form-group">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="contact" value="{{ old('contact') }}" required class="form-control p_input text-white" placeholder="Phone Number">
                                </div>

                                <div class="form-group">
                                    <label>Profile Pic <span class="text-danger">*</span></label>
                                    <input type="file" name="profile_pic" required class="form-control p_input text-white">
                                </div>

                                <div class="form-group">
                                    <label>Blood Type <span class="text-danger">*</span></label>
                                    <input type="text" name="blood_type" value="{{ old('blood_type') }}" required class="form-control p_input text-white" placeholder="Blood Type">
                                </div>

                                <div class="form-group">
                                    <label>Height <span class="text-danger">*</span></label>
                                    <input type="number" name="height" value="{{ old('height') }}" required class="form-control p_input text-white" placeholder="Height">
                                </div>

                                <div class="form-group">
                                    <label>Weight <span class="text-danger">*</span></label>
                                    <input type="number" name="weight" value="{{ old('weight') }}" required class="form-control p_input text-white" placeholder="Weight">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                                </div>

                                <p class="sign-up text-center">Already have an account? <a href="{{ url('login') }}">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
</body>
</html>
