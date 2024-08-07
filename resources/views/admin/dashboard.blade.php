@extends('layouts.app')


@section('content')
<div class="content-wrapper">

                    @if(Auth::user()->user_type == 1)
                    
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">{{Auth::user()->name}}</h3>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">{{Auth::user()->email}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">Medics</h3>
                                                <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-success">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-success font-weight-normal">{{$getMedics->total()}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h5 class="mb-0">Emergencies Solved</h5>
                                                
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            @if($getAllSolvedEmergencies->total() <= 0)
                                            <div class="icon icon-box-danger">
                                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                            </div>
                                            @else
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <h6 class="text-success font-weight-normal">{{$getAllSolvedEmergencies->total()}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">Users</h3>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{url('admin/user/list')}}">
                                            <div class="icon icon-box-success ">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="text-muted font-weight-normal">{{$getUsers->total()}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    
                    
                    @if(Auth::user()->user_type==2 )
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Account</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{Auth::user()->name}}</h2>
                                                <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal">{{Auth::user()->email}}</h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Served Emergencies</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{$getMyCompletedEmergencies->total()}}</h2>
                                                <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal"> <a href="" class="btn btn-primary my-2"> View</a></h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Incoming Emergencies</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{$getMyEmergencies->total()}}</h2>
                                                <p class="text-danger ms-2 mb-0 font-weight-medium"> </p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal"> <a href="" class="btn btn-primary my-2"> View</a></h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(Auth::user()->user_type == 3)
                    <div class="row">
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Account</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">{{Auth::user()->name}}</h2>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal">{{Auth::user()->email}}</h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Total Emergencies</h5>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                <h2 class="mb-0">2</h2>
                                                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                            </div>
                                            <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                                        </div>
                                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                            <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endif


                    @if(Auth::user()->user_type == 1)
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Emergencies</h4>
                                    <div class="table-responsive">
                                    <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th> Client Name </th>
                                                    <th> Contact </th>
                                                    <th> Country </th>
                                                    <th> Longitude </th>
                                                    <th>Latitude </th>
                                                    <th> Created </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($getAllEmergencies->total() >0)
                                                @foreach ($getAllEmergencies as $value)
                                                
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="../assets/images/faces/face1.jpg" alt="image" />
                                                        <span class="ps-2">{{$value->created_by_name}}</span>
                                                    </td>
                                                    <td> {{$value->contact}} </td>
                                                    <td> {{$value->country}} </td>
                                                    <td> {{$value->longitude}} </td>
                                                    <td> {{$value->latitude}} </td>
                                                    <td> {{$value->created_at}} </td>
                                                    <td>
                                                        @if($value->served == 1)
                                                        <div class="badge badge-outline-success">Approved</div>
                                                        @else
                                                        <div class="">
                                                            <a href="{{ url('admin/emergencies/assignmedic', $value->id) }}" class="badge badge-outline-danger nav-link">Assign</a>
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                                @endforeach
                                                @else
                                                
                                                    <p class="text-danger">No emergencies assigned yet.</p>
                                                
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="float:right;padding:10px;">
                                {!! $getAllEmergencies->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(Auth::user()->user_type == 2)
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">My Assigned Emergencies({{$getMyEmergencies->total()}})</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th> Client Name </th>
                                                    <th> Contact </th>
                                                    <th> Country </th>
                                                    <th> Longitude </th>
                                                    <th>Latitude </th>
                                                    <th> Created </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($getMyEmergencies->total() >0)
                                                @foreach ($getMyEmergencies as $value)
                                                
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="../assets/images/faces/face1.jpg" alt="image" />
                                                        <span class="ps-2">{{$value->created_by_name}}</span>
                                                    </td>
                                                    <td> {{$value->contact}} </td>
                                                    <td> {{$value->country}} </td>
                                                    <td> {{$value->longitude}} </td>
                                                    <td> {{$value->latitude}} </td>
                                                    <td> {{$value->created_at}} </td>
                                                    <td>
                                                        @if($value->served == 1)
                                                        <div class="badge badge-outline-success">Completed</div>
                                                        @else
                                                        <div class="">
                                                            <a href="{{ url('admin/medic/markcomplete', $value->id) }}" class="badge badge-outline-danger nav-link">Mark Complete</a>
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                                @endforeach
                                                @else
                                                
                                                    <p class="text-danger">No emergencies assigned yet.</p>
                                                
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">My  Emergency History</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th> Client Name </th>
                                                    <th> Contact </th>
                                                    <th> Country </th>
                                                    <th> Longitude </th>
                                                    <th>Latitude </th>
                                                    <th> Created </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($getEmergencyHistory->total() >0)
                                                @foreach ($getEmergencyHistory as $value)
                                                
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="../assets/images/faces/face1.jpg" alt="image" />
                                                        <span class="ps-2">{{$value->created_by_name}}</span>
                                                    </td>
                                                    <td> {{$value->contact}} </td>
                                                    <td> {{$value->country}} </td>
                                                    <td> {{$value->longitude}} </td>
                                                    <td> {{$value->latitude}} </td>
                                                    <td> {{$value->created_at}} </td>
                                                    
                                                </tr>
                                                
                                                @endforeach
                                                @else
                                                
                                                    <p class="text-danger">No emergencies assigned yet.</p>
                                                
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    
                </div>

@endsection