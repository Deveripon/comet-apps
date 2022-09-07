@extends('backend.layouts.app')

@section('main')


{{-- @php
   $slider_item = App\Models\Slider::latest()->get()
@endphp --}}


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Slides</h4>
            </div>
            @include('validate-main')
            <div class="card-body">             
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($slider_item as $item)
                           <tr>
                            <td>{{$loop -> index +1}}</td>
                            <td>{{$item -> title}}</td>
                            <td>
                                <img style="width:80px; height:80px;" src="{{url('storage/slider_image/'.$item->photo)}}" alt="">
                            </td>
                            <td>{{$item -> created_at->diffForHumans()}}</td>
                            <td>  
                                <a class="btn btn-sm btn-info" href="{{route('home.page')}}"><i class="fa-solid fa-eye"></i></a>

                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('slider.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
  
  
                                <form action="{{route('slider.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
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
                <h4 class="card-title">Add New Slide</h4>
             
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:bold">Slides Title</label>
                        <input name="title" value="" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Slides subtitle</label>
                        <input name="subtitle" value="" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="slider_image_preview_section">
                            <img class="slider_image_preview" style="max-width:100%"src="" alt="">
                        </div>


                        <label for="photo" style="font-weight:bold">
                           Upload image
                           <br>
                           <i style="font-size:40px;color: green; cursor:pointer" class="fa-solid fa-image"></i>
                        </label>                       
                        <input class="slider_image" style="display:none" id="photo" name="photo" type="file" class="form-control">
                    </div>
                    <div class="form-group"> 
                        <div class="slider_button_area" >
                                                
                             
                            
                        </div> 
                        

                        <a Class="btn btn-primary text-light" id="add_button">Add New Slider Button</a>                        
                    </div>




                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Slide</h4>
                <a class="btn btn-outline-primary" href="{{route('slider.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('slider.update',$slide -> id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   
                    <div class="form-group">
                        <label style="font-weight:bold">Slides Title</label>
                        <input name="title" value="{{$slide -> title}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Slides subtitle</label>
                        <input name="subtitle" value="{{$slide -> subtile}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="slider_image_preview_section">
                            <img class="slider_image_preview" style="max-width:100%"src="{{url('storage/slider_image/',$slide -> photo)}}" alt="">
                        </div>


                        <label for="photo" style="font-weight:bold">
                           Upload image
                           <br>
                           <i style="font-size:40px;color: green; cursor:pointer" class="fa-solid fa-image"></i>
                        </label>                       
                        <input class="slider_image" style="display:none" id="photo" name="photo" type="file" class="form-control">
                    </div>
                    <div class="form-group"> 
                        <div class="slider_button_area" >
                                                
                        @foreach(json_decode($slide -> buttons) as $btn)
                        <div class="btn-opt-area">
                            <label class="" for="btn">Button : </label>
                            <span class="close-btn d-inline bg-danger" style="color:#fff;padding:3px; cursor:pointer;border-radius:3px;float:right"> Remove </span> 
                            <div class="form-group" style="outline:1px solid #ddd;padding:10px; border-radius:5px;">
                                <input name="btn_name[]" id="btn" value="{{$btn -> btn_name}}" class="form-control" type="text" placeholder="Button Title">
                                <input name="btn_link[]" id="btn" value="{{$btn -> btn_link}}" class="form-control" type="text" placeholder="Button Link">
                                <br>
                                <label for="btn-color">Select Button Style</label>
                                <select name="btn_type[]" id="" class="form-control">
                                    <option @if($btn -> btn_type === 'btn btn-light-out' ) selected @endif value="btn btn-light-out">default</option>
                                    <option @if($btn -> btn_type === 'btn btn-color btn-full' ) selected @endif  value="btn btn-color btn-full">red</option>
                                </select>
                            </div>
                         </div>
                        @endforeach
                            
                        </div> 
                        

                        <a Class="btn btn-primary text-light" id="add_button">Add New Slider Button</a>                        
                    </div>




                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>

            @endif
        </div>
    </div>
</div>
</div>

@endsection