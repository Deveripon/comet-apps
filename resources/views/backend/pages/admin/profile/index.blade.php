@extends('backend.layouts.app')

@section('main')


            
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header" style="position:relative;height:300px">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image" style="margin:5px 0px">
                                                                               
                                    <img style="width: 120px;
                                    height: 120px;
                                    border-radius: 50%;" class=" rounded-circle user-image" alt="User Image" src="{{url('storage/admin_photo/',Auth::guard('admin')->user()->photo)}}">
                             
                                   
                            </div>

                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{Auth::guard('admin')->user()->name}}</h4>
                                <h6 class="text-muted">{{Auth::guard('admin')->user()->email}}</h6>
                                <div class="user-Location"><i class="fa fa-map-marker"></i>{{Auth::guard('admin')->user()->location}}</div>
                                <div class="about-text">{{Auth::guard('admin')->user()->bio}}</div>
                            </div>
                        </div>

                        <form action="{{route('profile.photo.update',Auth::guard('admin')-> user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label style="display:none" class="change_btn btn btn-outline-primary" for="change_photo" > <i class="fa fa-edit"> Change Photo</i>
                                <input name="photo" style="display:none" type="file" id="change_photo">
                            </label> 

                            <input style="
                                    position: absolute;
                                    right:10px;
                                    top:10px;
                                    display:none;
                            
                            "type="submit" class="btn btn-primary submit_button" value="Save Change">
                        </form>
                    </div>

                    {{-- <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                            </li>
                        </ul>
                    </div>	 --}}
                    <div class="">
                        
                        <!-- Personal Details Tab -->
                        <div class="tab-pane fade show active" id="per_details_tab">
                        
                            <!-- Personal Details -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span> 
                                                <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-10">{{Auth::guard('admin')->user()->name}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                <p class="col-sm-10">{{Auth::guard('admin')->user()->date_of_birth}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                <p class="col-sm-10">{{Auth::guard('admin')->user()->email}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                <p class="col-sm-10">{{Auth::guard('admin')->user()->cell}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                <p class="col-sm-10 mb-0">{{Auth::guard('admin')->user()->location}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0">Bio</p>
                                                <p class="col-sm-10 mb-0">{{Auth::guard('admin')->user()->bio}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Edit Details Modal -->
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">


                                                    <form method="POST" action="{{route('profile.update',Auth::guard('admin')-> user()->id)}}">
                                                        @csrf
                                                        <div class="row form-row">
                                                            <div class="col-12 ">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input name="name" type="text" class="form-control" value="{{Auth::guard('admin')->user()->name}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="cal-icon">
                                                                        <input name="date_of_birth"type="text" class="form-control" value="{{Auth::guard('admin')->user()->date_of_birth}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email ID</label>
                                                                    <input name="email" type="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Mobile</label>
                                                                    <input name="cell" type="text" value="{{Auth::guard('admin')->user()->cell}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title"><span>Address</span></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                <label>Address</label>
                                                                    <input name="location" type="text" class="form-control" value="{{Auth::guard('admin')->user()->location}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                <label>Bio</label>
                                                                    {{-- <input name="bio" type="textarea"  > --}}
                                                                    <textarea name="bio" class="form-control" value="{{Auth::guard('admin')->user()->bio}}" id="" cols="30" rows="10"></textarea>
                                                                </div>
                                                            <div>                                                       
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Details Modal -->
                                    
                                </div>

                            
                            </div>
                            <!-- /Personal Details -->

                        </div>
                        <!-- /Personal Details Tab -->

                        <!-- Change Password Tab -->
                            
                        
                    </div>
                </div>
            </div>
                               <div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
                                                    @include('validate')
													<form method="POST" action="{{route('change.password')}}">
                                                        @csrf
														<div class="form-group">
															<label>Old Password</label>
															<input name ="old_pass" type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input name="pass"  type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input name="pass_confirmation" type="password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>


@endsection


