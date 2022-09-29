@extends('backend.layouts.app')

@section('main')

@php
    $category = App\Models\Category::latest()->get();
    $portfolio = App\Models\portfolio::latest()->get()->where('status',true)->where('trash',false);
@endphp
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Portfolios</h4>
            </div>
            @include('validate-main')
            <div class="card-body">             
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Featured Image</th>                       
                                <th>Category</th>                       
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($portfolio as $item)
                           <tr>
                            <td>{{$loop -> index +1}}</td>
                            <td>{{$item -> title}}</td>
                            <td>{{$item -> slug}}</td>
                            <td>{{$item -> type}}</td>
                            <td>
                                <img style="width:80px; height:80px;" src="{{url('storage/portfolio_img/featured_img/'.$item-> featured_img)}}" alt="">
                            </td>
                            <td><ul>
                                @foreach(json_decode($item -> category) as $category_item)
                                <li>{{$category_item -> title}}</li>
                                @endforeach
                            </ul></td>
                            <td>{{$item -> created_at->diffForHumans()}}</td>
                            <td>  
                                <a class="btn btn-sm btn-info" href="{{route('home.page')}}"><i class="fa-solid fa-eye"></i></a>

                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('portfolio.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
  
  
                                <form action="{{route('portfolio.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="delete" type="submit"><i class="fa-solid fa-trash"></i>
                                   </button>
                               </form> 
                             </td>
                            
                           </tr>
                           @empty
                           <tr>
                            <td></td>
                           </tr>
                           @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            @if($form_type == 'create_form')
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Add New Portfolio</h4>            
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:600">Portfolio Title</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control">
                    </div>


                    {{-- featured image preview section --}}
                    <div class="form-group">
                        <div class="featured_image_preview_section">
                            <img class="featured_image_preview" style="max-width:100%"src="" alt="">
                        </div>
                    {{-- featured image preview section --}}
           

                    {{-- Upload Featured Image --}}

                        <label for="featured_img" style="font-weight:600">
                        Featured image
                        <br>
                        <i style="font-size:40px;color: rgb(35, 155, 35); cursor:pointer" class="fa-solid fa-image"></i>
                        </label>                       
                        <input class="featured_image" style="display:none" id="featured_img" name="featured_img" type="file" class="form-control">
                    </div>
                    {{-- Upload Featured Image --}}

                 {{--   Gallery Image preview section --}}
                    <div class="gallery_img_preview_section">

                    </div>
                 {{--   Gallery Image preview section --}}
                    

                 {{--    Upload Gallery Image --}}

                 <label for="gallery_img" style="font-weight:600">Upload Gallery
                    <br>
                    <i style="font-size:40px;color: rgb(35, 155, 35); cursor:pointer" class="fa-solid fa-image"></i>
                 </label>
                        <input type="file" multiple hidden name="gallery_img[]" id="gallery_img">

                 {{--    Upload Gallery Image --}}
                 {{-- Postfolio Category Selector --}}
                 <br>
                 <label  style="font-weight:600"  for="category">Select Category</label>
                 <br>
                 
                 <ul style="margin-left:-35px">
                    @foreach($category as $item)
                     <li style="list-style:none;">
                        <input type="checkbox" name="p_category[]" value="{{$item -> id}}" id="{{$item -> id}}"><label for="{{$item -> id}}">{{$item -> title}}</label></li> 
                    @endforeach
                   
                 </ul>
                    

                 </select>
                 {{-- Postfolio Category Selector --}}

                 {{-- Project Steps accordion --}}

             <br>
             <br>
             <label style="font-weight: 600" for="#">Project Steps</label>
             <br>
             <br>
             <div class="accordion" id="accordionExample">
              <div class="card shadow-sm step_accordion">
                <div class="card-header" id="headingOne">
                  <h6 style="cursor: pointer;" class="mb-0" data-toggle="collapse" data-target="#collapseOne">
  
                      Step 1
                
                  </h6>
                </div>
            
                <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                  <div class="card-body">
                        <div class="title">
                            <input class="form-control" name="step_title[]" type="text" placeholder="Title">
                        </div>
                        <br>
                        <div class="desc">
                           <textarea placeholder="Description" class="form-control" name="step_desc[]" id="" cols="30" rows="10"></textarea>
                        </div>
                  </div>
                </div>
              </div>
               <div class="card shadow-sm step_accordion">
                <div class="card-header" id="headingTwo">
                  <h6 style="cursor: pointer;" class="mb-0" data-toggle="collapse" data-target="#collapseTwo">
  
                      Step 2
                
                  </h6>
                </div>
            
                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                  <div class="card-body">
                        <div class="title">
                            <input class="form-control" name="step_title[]" type="text" placeholder="Title">
                        </div>
                        <br>
                        <div class="desc">
                           <textarea placeholder="Description" class="form-control" name="step_desc[]" id="" cols="30" rows="10"></textarea>
                        </div>
                  </div>
                </div>
              </div>
               <div class="card shadow-sm step_accordion">
                <div class="card-header" id="headingThree">
                  <h6 style="cursor: pointer;" class="mb-0" data-toggle="collapse" data-target="#collapseThree">
  
                      Step 3
                
                  </h6>
                </div>
            
                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                  <div class="card-body">
                        <div class="title">
                            <input class="form-control" name="step_title[]" type="text" placeholder="Title">
                        </div>
                        <br>
                        <div class="desc">
                           <textarea placeholder="Description" class="form-control" name="step_desc[]" id="" cols="30" rows="10"></textarea>
                        </div>
                  </div>
                </div>
              </div>
            </div>
                             {{-- Project Steps accordion --}}

                
                 <br><br>
                  <div class="form-group">
                  <label style="font-weight:600">Project Description</label>
                    <textarea class="form-control" name="p_desc" id="editor" cols="30" rows="10"></textarea>
              </div>
              

              <div class="form-group">
                  <label style="font-weight:600">Client</label>
                  <input name="client" value="{{old('client')}}" type="text" class="form-control">
              </div>
              
              <div class="form-group">
                  <label style="font-weight:600">Completation Date</label>
                  <input name="sub_date" value="{{old('sub_date')}}" type="date" class="form-control">
              </div>

               <div class="form-group">
                  <label style="font-weight:600">Portfolio Link</label>
                  <input name="p_link" value="{{old('p_link')}}" type="link" class="form-control">
              </div>

               <div class="form-group">
                  <label style="font-weight:600">Project Type</label>
                  <input name="type" value="{{old('type')}}" type="text" class="form-control">
              </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
            @else
         
            @endif
        </div>
    </div>
</div>
</div>

@endsection