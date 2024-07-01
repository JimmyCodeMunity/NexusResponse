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
                        <h4 class="card-title">Assign Medic</h4>
                        
                        <form class="forms-sample" action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input value="{{ old('name',$getRecord->userid)}}" type="text" style="color:white" class="form-control" name="name"" id="exampleInputUsername1"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" value="{{ old('email',$getRecord->type)}}" style="color:white" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input type="text" value="{{ old('email',$getRecord->type)}}" style="color:white" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input type="text" value="{{ old('email',$getRecord->type)}}" style="color:white" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country</label>
                                <input type="text" value="{{ old('email',$getRecord->country)}}" style="color:white" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputUsername1">Choose Medic</label>
                                <select name="medic" style="color:white" class="form-control" id="exampleInputUsername1">
                                    <option value="" class="form-control">Select medic</option>
                                    @foreach ($getMedics as $medic )
                                    <option value="{{$medic->id}}" class="form-control">{{$medic->email}},{{$medic->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            
                            
                            
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark"><a href="{{url('admin/admin/list')}}" class="nav-link">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
@endsection
