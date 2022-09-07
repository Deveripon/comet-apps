@extends('backend.layouts.app')

@section('main')

<div class="row">
						
    <div class="col-12">
        
        <!-- General -->
        
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-6">
                            <label>Website Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label>Tagline</label>
                            <input name="tagline" type="text" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label>Website Logo</label>
                            <input name="logo" id="logo_upload" type="file" style="box-sizing:border-box" class="form-control">
                            <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                            <br>
                            <br>
                          
                           <div class="logo_area" style="position:relative;">
                            <img style="width:120px;height:90px;"  class="logo_preview" src="{{url('storage/admin_photo/avater.png')}}" alt="">
                           </div>
                           <span class="remove_logo btn-sm btn-outline-danger" style="cursor:pointer;color:red;font-size:25px;margin:0px;padding:0px">&times;</span>
                        </div>
                        <div class="form-group col-6 mb-0">
                            <label>Favicon</label>
                            <input name="favicon" id="fav_upload" type="file" class="form-control">
                            <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                            <small class="text-secondary">Accepted formats : only png and ico</small>
                            <br>
                            <br>                          
                            <div class="fav_area" style="position:relative;">
                                <img style="width:120px;height:90px;"  class="fav_preview" src="{{url('storage/admin_photo/avater.png')}}" alt="">
                            </div>
                            <span class="remove_fav btn-sm btn-outline-danger" style="cursor:pointer;color:red;font-size:25px;margin:0px;padding:0px">&times;</span>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label>Social Links</label>
                            <br>

                            <div class="form-group">
                                <label style="padding:5px" for="facebook"> <i class=" m-2 fa fa-facebook"></i>  Facebook                            
                                </label>
                                <input name="facebook" class="form-control col-6" id="facebook" type="text">
                                
                            </div>
                            <div class="form-group">
                                <label  style="padding:5px" for="twitter"> <i class=" m-2 fa fa-twitter"></i>  twitter                            
                                </label>
                                <input name="twitter" class="form-control col-6" id="twitter" type="text">
                                
                            </div>
                           
                            <div class="form-group">
                                <label style="padding:5px" for="instagram"> <i class=" m-2 fa fa-instagram"></i>  instagram                            
                                </label>
                                <input name="instagram" class="form-control col-6" id="instagram" type="text">
                              
                            </div> 
                            
                            <div class="form-group">
                                <label style="padding:5px" for="github"> <i class=" m-2 fa fa-github"></i>  github                            
                                </label>
                                <input name="github" class="form-control col-6" id="github" type="text">
                               
                            </div>
  
                            <div class="form-group">
                                <label style="padding:5px" for="dribble"> <i class=" m-2 fa-brands fa-dribbble"></i> dribble                            
                                </label>
                                <input name="dribble" class="form-control col-6" id="dribble" type="text">
                          
                            </div>

                            <div class="form-group">
                                <label style="padding:5px" for="behance"> <i class=" m-2 fa fa-behance"></i>  behance                            
                                </label>
                                <input name="behance" class="form-control col-6" id="behance" type="text">
                
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" style="float:right"value="Save Change">
                    </form>
                </div>
            </div>
        
        <!-- /General -->
            
    </div>
</div>

@endsection