@extends('backend.layouts.app')

@section('main')


{{-- @php
   $slider_item = App\Models\Slider::latest()->get()
@endphp --}}


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Testimonials</h4>
            </div>
            @include('validate-main')
            <div class="card-body">             
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Testimonial</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($testimonial_item as $item)
                           <tr>
                            <td>{{$loop -> index +1}}</td>
                            <td style="white-space: nowrap;
                            overflow: hidden;max-width:300px">{{$item -> testimonial}}</td>
                            <td>{{$item -> name}}</td>
                            <td>{{$item -> company}}</td>
                            <td>{{$item -> created_at->diffForHumans()}}</td>
                            <td>  
                                <a class="btn btn-sm btn-info" href="{{route('home.page')}}"><i class="fa-solid fa-eye"></i></a>

                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('testimonial.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
  
  
                                <form action="{{route('testimonial.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="delete" type="submit"><i class="fa-solid fa-trash"></i>
                                   </button>
                               </form> 
                             </td>
                            
                           </tr>
                           @empty
                           <tr>
                            <td class="text-center text-danger" colspan="6">No records found</td>
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
                <h4 class="card-title">Add New Testimonial</h4>
             
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:bold">Testimonial</label>
                        <textarea class="form-control" name="testimonial" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Name</label>
                        <input name="name" value="" type="text" class="form-control">
                    </div>

                     <div class="form-group">
                            <label style="font-weight:bold">Company</label>
                            <input name="company" value="" type="text" class="form-control">
                     </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Testimonial</h4>
                <a class="btn btn-outline-primary" href="{{route('testimonial.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('testimonial.update',$testimonial -> id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   
                    <div class="form-group">
                        <label style="font-weight:bold">Testimonial</label>
                        <textarea class="form-control" value="" name="testimonial" id="" cols="30" rows="10">{{$testimonial -> testimonial}}</textarea>
                    </div>  
                    
                    <div class="form-group">
                        <label style="font-weight:bold">Name</label>
                        <input name="name" value="{{$testimonial -> name}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Company</label>
                        <input name="company" value="{{$testimonial -> company}}" type="text" class="form-control">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </div>
                </form>
            </div>

            @endif
        </div>
    </div>
</div>
</div>

@endsection