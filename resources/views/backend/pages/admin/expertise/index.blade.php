@extends('backend.layouts.app')

@section('main')


{{-- @php
   $slider_item = App\Models\Slider::latest()->get()
@endphp --}}


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Expertise</h4>
            </div>
            @include('validate-main')
            <div class="card-body">             
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expertise as $item)
                           <tr>
                            <td>{{$loop -> index +1}}</td>
                            <td>{{$item -> title}}</td>
                            <td><i class="{{$item -> icon}}"></i></td>                    
                            <td>{{$item -> desc}}</td>                    
                            <td>{{$item -> created_at->diffForHumans()}}</td>
                            <td>  
                                <a class="btn btn-sm btn-info" href="{{route('home.page')}}"><i class="fa-solid fa-eye"></i></a>

                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('expertise.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
  
  
                                <form action="{{route('expertise.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="delete" type="submit"><i class="fa-solid fa-trash"></i>
                                   </button>
                               </form> 
                             </td>
                            
                           </tr>
                           @empty
                           <tr>
                            <td>No data available</td>
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
                <h4 class="card-title">Add Expertise</h4>
             
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('expertise.store')}}" method="post">
                    @csrf
                   
                    <div class="form-group">
                        <label style="font-weight:bold">Title</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Description</label>
                        <input name="description" value="{{old('description')}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold"> Select Icon</label>
                        <input data-toggle="modal" data-target="#exampleModalLong" name="icon" value="{{old('icon')}}" type="text" class="form-control expertise-icon">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden-code="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                              <div class="button-group">
                              <button data-dismiss="modal" type="button" class="btn btn-primary"><i class="fa-solid fa-window-restore"></i> Save changes</button>
                              <button data-dismiss="modal" type="button" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> Close</button>
     <!--                          <button type="button" class="close btn btn-danger" data-dismiss="modal">Close</button> -->
                              </div>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="title center mb-50">
                                      <h3 class="fw-400">Select Icons</h3>
                                      <hr>
                                    </div>
                                    <div class="row">
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wand"></i><code class="hidden-code">ti-wand</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-volume"></i><code class="hidden-code">ti-volume</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-user"></i><code class="hidden-code">ti-user</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlock"></i><code class="hidden-code">ti-unlock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlink"></i><code class="hidden-code">ti-unlink</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trash"></i><code class="hidden-code">ti-trash</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thought"></i><code class="hidden-code">ti-thought</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-target"></i><code class="hidden-code">ti-target</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tag"></i><code class="hidden-code">ti-tag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tablet"></i><code class="hidden-code">ti-tablet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-star"></i><code class="hidden-code">ti-star</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-spray"></i><code class="hidden-code">ti-spray</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-signal"></i><code class="hidden-code">ti-signal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart"></i><code class="hidden-code">ti-shopping-cart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart-full"></i><code class="hidden-code">ti-shopping-cart-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-settings"></i><code class="hidden-code">ti-settings</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-search"></i><code class="hidden-code">ti-search</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-in"></i><code class="hidden-code">ti-zoom-in</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-out"></i><code class="hidden-code">ti-zoom-out</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cut"></i><code class="hidden-code">ti-cut</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler"></i><code class="hidden-code">ti-ruler</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-pencil"></i><code class="hidden-code">ti-ruler-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt"></i><code class="hidden-code">ti-ruler-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark"></i><code class="hidden-code">ti-bookmark</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark-alt"></i><code class="hidden-code">ti-bookmark-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reload"></i><code class="hidden-code">ti-reload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plus"></i><code class="hidden-code">ti-plus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin"></i><code class="hidden-code">ti-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil"></i><code class="hidden-code">ti-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt"></i><code class="hidden-code">ti-pencil-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-roller"></i><code class="hidden-code">ti-paint-roller</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-bucket"></i><code class="hidden-code">ti-paint-bucket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-na"></i><code class="hidden-code">ti-na</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mobile"></i><code class="hidden-code">ti-mobile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-minus"></i><code class="hidden-code">ti-minus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall"></i><code class="hidden-code">ti-medall</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall-alt"></i><code class="hidden-code">ti-medall-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker"></i><code class="hidden-code">ti-marker</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker-alt"></i><code class="hidden-code">ti-marker-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-up"></i><code class="hidden-code">ti-arrow-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-right"></i><code class="hidden-code">ti-arrow-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-left"></i><code class="hidden-code">ti-arrow-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-down"></i><code class="hidden-code">ti-arrow-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-lock"></i><code class="hidden-code">ti-lock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-arrow"></i><code class="hidden-code">ti-location-arrow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-link"></i><code class="hidden-code">ti-link</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout"></i><code class="hidden-code">ti-layout</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers"></i><code class="hidden-code">ti-layers</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers-alt"></i><code class="hidden-code">ti-layers-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-key"></i><code class="hidden-code">ti-key</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-import"></i><code class="hidden-code">ti-import</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-image"></i><code class="hidden-code">ti-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart"></i><code class="hidden-code">ti-heart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart-broken"></i><code class="hidden-code">ti-heart-broken</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-stop"></i><code class="hidden-code">ti-hand-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-open"></i><code class="hidden-code">ti-hand-open</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-drag"></i><code class="hidden-code">ti-hand-drag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-folder"></i><code class="hidden-code">ti-folder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag"></i><code class="hidden-code">ti-flag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt"></i><code class="hidden-code">ti-flag-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt-2"></i><code class="hidden-code">ti-flag-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eye"></i><code class="hidden-code">ti-eye</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-export"></i><code class="hidden-code">ti-export</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-exchange-vertical"></i><code class="hidden-code">ti-exchange-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-desktop"></i><code class="hidden-code">ti-desktop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cup"></i><code class="hidden-code">ti-cup</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-crown"></i><code class="hidden-code">ti-crown</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments"></i><code class="hidden-code">ti-comments</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment"></i><code class="hidden-code">ti-comment</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment-alt"></i><code class="hidden-code">ti-comment-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-close"></i><code class="hidden-code">ti-close</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clip"></i><code class="hidden-code">ti-clip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-up"></i><code class="hidden-code">ti-angle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-right"></i><code class="hidden-code">ti-angle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-left"></i><code class="hidden-code">ti-angle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-down"></i><code class="hidden-code">ti-angle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check"></i><code class="hidden-code">ti-check</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check-box"></i><code class="hidden-code">ti-check-box</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-camera"></i><code class="hidden-code">ti-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-announcement"></i><code class="hidden-code">ti-announcement</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush"></i><code class="hidden-code">ti-brush</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-briefcase"></i><code class="hidden-code">ti-briefcase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt"></i><code class="hidden-code">ti-bolt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt-alt"></i><code class="hidden-code">ti-bolt-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-blackboard"></i><code class="hidden-code">ti-blackboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bag"></i><code class="hidden-code">ti-bag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-move"></i><code class="hidden-code">ti-move</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-vertical"></i><code class="hidden-code">ti-arrows-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-horizontal"></i><code class="hidden-code">ti-arrows-horizontal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-fullscreen"></i><code class="hidden-code">ti-fullscreen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-right"></i><code class="hidden-code">ti-arrow-top-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-left"></i><code class="hidden-code">ti-arrow-top-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-up"></i><code class="hidden-code">ti-arrow-circle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-right"></i><code class="hidden-code">ti-arrow-circle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-left"></i><code class="hidden-code">ti-arrow-circle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-down"></i><code class="hidden-code">ti-arrow-circle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-up"></i><code class="hidden-code">ti-angle-double-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-right"></i><code class="hidden-code">ti-angle-double-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-left"></i><code class="hidden-code">ti-angle-double-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-down"></i><code class="hidden-code">ti-angle-double-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zip"></i><code class="hidden-code">ti-zip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-world"></i><code class="hidden-code">ti-world</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wheelchair"></i><code class="hidden-code">ti-wheelchair</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list"></i><code class="hidden-code">ti-view-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list-alt"></i><code class="hidden-code">ti-view-list-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-grid"></i><code class="hidden-code">ti-view-grid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-uppercase"></i><code class="hidden-code">ti-uppercase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-upload"></i><code class="hidden-code">ti-upload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-underline"></i><code class="hidden-code">ti-underline</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-truck"></i><code class="hidden-code">ti-truck</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-timer"></i><code class="hidden-code">ti-timer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ticket"></i><code class="hidden-code">ti-ticket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-up"></i><code class="hidden-code">ti-thumb-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-down"></i><code class="hidden-code">ti-thumb-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-text"></i><code class="hidden-code">ti-text</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-up"></i><code class="hidden-code">ti-stats-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-down"></i><code class="hidden-code">ti-stats-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v"></i><code class="hidden-code">ti-split-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-h"></i><code class="hidden-code">ti-split-h</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-smallcap"></i><code class="hidden-code">ti-smallcap</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shine"></i><code class="hidden-code">ti-shine</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right"></i><code class="hidden-code">ti-shift-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left"></i><code class="hidden-code">ti-shift-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shield"></i><code class="hidden-code">ti-shield</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-notepad"></i><code class="hidden-code">ti-notepad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-server"></i><code class="hidden-code">ti-server</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-right"></i><code class="hidden-code">ti-quote-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-left"></i><code class="hidden-code">ti-quote-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pulse"></i><code class="hidden-code">ti-pulse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-printer"></i><code class="hidden-code">ti-printer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-power-off"></i><code class="hidden-code">ti-power-off</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plug"></i><code class="hidden-code">ti-plug</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pie-chart"></i><code class="hidden-code">ti-pie-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paragraph"></i><code class="hidden-code">ti-paragraph</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-panel"></i><code class="hidden-code">ti-panel</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-package"></i><code class="hidden-code">ti-package</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music"></i><code class="hidden-code">ti-music</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music-alt"></i><code class="hidden-code">ti-music-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse"></i><code class="hidden-code">ti-mouse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse-alt"></i><code class="hidden-code">ti-mouse-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-money"></i><code class="hidden-code">ti-money</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone"></i><code class="hidden-code">ti-microphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu"></i><code class="hidden-code">ti-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu-alt"></i><code class="hidden-code">ti-menu-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map"></i><code class="hidden-code">ti-map</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map-alt"></i><code class="hidden-code">ti-map-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-loop"></i><code class="hidden-code">ti-loop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-pin"></i><code class="hidden-code">ti-location-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list"></i><code class="hidden-code">ti-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-light-bulb"></i><code class="hidden-code">ti-light-bulb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-Italic"></i><code class="hidden-code">ti-Italic</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info"></i><code class="hidden-code">ti-info</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-infinite"></i><code class="hidden-code">ti-infinite</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-id-badge"></i><code class="hidden-code">ti-id-badge</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hummer"></i><code class="hidden-code">ti-hummer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-home"></i><code class="hidden-code">ti-home</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help"></i><code class="hidden-code">ti-help</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone"></i><code class="hidden-code">ti-headphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrives"></i><code class="hidden-code">ti-harddrives</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrive"></i><code class="hidden-code">ti-harddrive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gift"></i><code class="hidden-code">ti-gift</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-game"></i><code class="hidden-code">ti-game</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-filter"></i><code class="hidden-code">ti-filter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-files"></i><code class="hidden-code">ti-files</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-file"></i><code class="hidden-code">ti-file</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eraser"></i><code class="hidden-code">ti-eraser</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-envelope"></i><code class="hidden-code">ti-envelope</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-download"></i><code class="hidden-code">ti-download</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction"></i><code class="hidden-code">ti-direction</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction-alt"></i><code class="hidden-code">ti-direction-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dashboard"></i><code class="hidden-code">ti-dashboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-stop"></i><code class="hidden-code">ti-control-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-shuffle"></i><code class="hidden-code">ti-control-shuffle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-play"></i><code class="hidden-code">ti-control-play</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-pause"></i><code class="hidden-code">ti-control-pause</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-forward"></i><code class="hidden-code">ti-control-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-backward"></i><code class="hidden-code">ti-control-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud"></i><code class="hidden-code">ti-cloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-up"></i><code class="hidden-code">ti-cloud-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-down"></i><code class="hidden-code">ti-cloud-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clipboard"></i><code class="hidden-code">ti-clipboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-car"></i><code class="hidden-code">ti-car</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-calendar"></i><code class="hidden-code">ti-calendar</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-book"></i><code class="hidden-code">ti-book</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bell"></i><code class="hidden-code">ti-bell</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-basketball"></i><code class="hidden-code">ti-basketball</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart"></i><code class="hidden-code">ti-bar-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart-alt"></i><code class="hidden-code">ti-bar-chart-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-right"></i><code class="hidden-code">ti-back-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-left"></i><code class="hidden-code">ti-back-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-corner"></i><code class="hidden-code">ti-arrows-corner</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-archive"></i><code class="hidden-code">ti-archive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-anchor"></i><code class="hidden-code">ti-anchor</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-right"></i><code class="hidden-code">ti-align-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-left"></i><code class="hidden-code">ti-align-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-justify"></i><code class="hidden-code">ti-align-justify</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-center"></i><code class="hidden-code">ti-align-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alert"></i><code class="hidden-code">ti-alert</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alarm-clock"></i><code class="hidden-code">ti-alarm-clock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-agenda"></i><code class="hidden-code">ti-agenda</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-write"></i><code class="hidden-code">ti-write</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-window"></i><code class="hidden-code">ti-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widgetized"></i><code class="hidden-code">ti-widgetized</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget"></i><code class="hidden-code">ti-widget</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget-alt"></i><code class="hidden-code">ti-widget-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wallet"></i><code class="hidden-code">ti-wallet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-clapper"></i><code class="hidden-code">ti-video-clapper</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-camera"></i><code class="hidden-code">ti-video-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vector"></i><code class="hidden-code">ti-vector</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-logo"></i><code class="hidden-code">ti-themify-logo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon"></i><code class="hidden-code">ti-themify-favicon</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon-alt"></i><code class="hidden-code">ti-themify-favicon-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-support"></i><code class="hidden-code">ti-support</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stamp"></i><code class="hidden-code">ti-stamp</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v-alt"></i><code class="hidden-code">ti-split-v-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-slice"></i><code class="hidden-code">ti-slice</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shortcode"></i><code class="hidden-code">ti-shortcode</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right-alt"></i><code class="hidden-code">ti-shift-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left-alt"></i><code class="hidden-code">ti-shift-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt-2"></i><code class="hidden-code">ti-ruler-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-receipt"></i><code class="hidden-code">ti-receipt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin2"></i><code class="hidden-code">ti-pin2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin-alt"></i><code class="hidden-code">ti-pin-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt2"></i><code class="hidden-code">ti-pencil-alt2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-palette"></i><code class="hidden-code">ti-palette</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more"></i><code class="hidden-code">ti-more</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more-alt"></i><code class="hidden-code">ti-more-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone-alt"></i><code class="hidden-code">ti-microphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-magnet"></i><code class="hidden-code">ti-magnet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-double"></i><code class="hidden-code">ti-line-double</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dotted"></i><code class="hidden-code">ti-line-dotted</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dashed"></i><code class="hidden-code">ti-line-dashed</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-full"></i><code class="hidden-code">ti-layout-width-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default"></i><code class="hidden-code">ti-layout-width-default</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default-alt"></i><code class="hidden-code">ti-layout-width-default-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab"></i><code class="hidden-code">ti-layout-tab</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-window"></i><code class="hidden-code">ti-layout-tab-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-v"></i><code class="hidden-code">ti-layout-tab-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-min"></i><code class="hidden-code">ti-layout-tab-min</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider"></i><code class="hidden-code">ti-layout-slider</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider-alt"></i><code class="hidden-code">ti-layout-slider-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-right"></i><code class="hidden-code">ti-layout-sidebar-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-none"></i><code class="hidden-code">ti-layout-sidebar-none</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-left"></i><code class="hidden-code">ti-layout-sidebar-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-placeholder"></i><code class="hidden-code">ti-layout-placeholder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu"></i><code class="hidden-code">ti-layout-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-v"></i><code class="hidden-code">ti-layout-menu-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-separated"></i><code class="hidden-code">ti-layout-menu-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-full"></i><code class="hidden-code">ti-layout-menu-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right-alt"></i><code class="hidden-code">ti-layout-media-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right"></i><code class="hidden-code">ti-layout-media-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay"></i><code class="hidden-code">ti-layout-media-overlay</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt"></i><code class="hidden-code">ti-layout-media-overlay-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt-2"></i><code class="hidden-code">ti-layout-media-overlay-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left-alt"></i><code class="hidden-code">ti-layout-media-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left"></i><code class="hidden-code">ti-layout-media-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center-alt"></i><code class="hidden-code">ti-layout-media-center-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center"></i><code class="hidden-code">ti-layout-media-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb"></i><code class="hidden-code">ti-layout-list-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb-alt"></i><code class="hidden-code">ti-layout-list-thumb-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-post"></i><code class="hidden-code">ti-layout-list-post</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-large-image"></i><code class="hidden-code">ti-layout-list-large-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-line-solid"></i><code class="hidden-code">ti-layout-line-solid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4"></i><code class="hidden-code">ti-layout-grid4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3"></i><code class="hidden-code">ti-layout-grid3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2"></i><code class="hidden-code">ti-layout-grid2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-thumb"></i><code class="hidden-code">ti-layout-grid2-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-right"></i><code class="hidden-code">ti-layout-cta-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-left"></i><code class="hidden-code">ti-layout-cta-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-center"></i><code class="hidden-code">ti-layout-cta-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-right"></i><code class="hidden-code">ti-layout-cta-btn-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-left"></i><code class="hidden-code">ti-layout-cta-btn-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4"></i><code class="hidden-code">ti-layout-column4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3"></i><code class="hidden-code">ti-layout-column3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2"></i><code class="hidden-code">ti-layout-column2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-separated"></i><code class="hidden-code">ti-layout-accordion-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-merged"></i><code class="hidden-code">ti-layout-accordion-merged</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-list"></i><code class="hidden-code">ti-layout-accordion-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ink-pen"></i><code class="hidden-code">ti-ink-pen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info-alt"></i><code class="hidden-code">ti-info-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help-alt"></i><code class="hidden-code">ti-help-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone-alt"></i><code class="hidden-code">ti-headphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-up"></i><code class="hidden-code">ti-hand-point-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-right"></i><code class="hidden-code">ti-hand-point-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-left"></i><code class="hidden-code">ti-hand-point-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-down"></i><code class="hidden-code">ti-hand-point-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gallery"></i><code class="hidden-code">ti-gallery</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-smile"></i><code class="hidden-code">ti-face-smile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-sad"></i><code class="hidden-code">ti-face-sad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-credit-card"></i><code class="hidden-code">ti-credit-card</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-forward"></i><code class="hidden-code">ti-control-skip-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-backward"></i><code class="hidden-code">ti-control-skip-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-record"></i><code class="hidden-code">ti-control-record</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-eject"></i><code class="hidden-code">ti-control-eject</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments-smiley"></i><code class="hidden-code">ti-comments-smiley</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush-alt"></i><code class="hidden-code">ti-brush-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-youtube"></i><code class="hidden-code">ti-youtube</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo"></i><code class="hidden-code">ti-vimeo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter"></i><code class="hidden-code">ti-twitter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-time"></i><code class="hidden-code">ti-time</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr"></i><code class="hidden-code">ti-tumblr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-skype"></i><code class="hidden-code">ti-skype</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share"></i><code class="hidden-code">ti-share</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share-alt"></i><code class="hidden-code">ti-share-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rocket"></i><code class="hidden-code">ti-rocket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest"></i><code class="hidden-code">ti-pinterest</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-new-window"></i><code class="hidden-code">ti-new-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft"></i><code class="hidden-code">ti-microsoft</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list-ol"></i><code class="hidden-code">ti-list-ol</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linkedin"></i><code class="hidden-code">ti-linkedin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-2"></i><code class="hidden-code">ti-layout-sidebar-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4-alt"></i><code class="hidden-code">ti-layout-grid4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3-alt"></i><code class="hidden-code">ti-layout-grid3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-alt"></i><code class="hidden-code">ti-layout-grid2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4-alt"></i><code class="hidden-code">ti-layout-column4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3-alt"></i><code class="hidden-code">ti-layout-column3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2-alt"></i><code class="hidden-code">ti-layout-column2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-instagram"></i><code class="hidden-code">ti-instagram</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-google"></i><code class="hidden-code">ti-google</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-github"></i><code class="hidden-code">ti-github</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr"></i><code class="hidden-code">ti-flickr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-facebook"></i><code class="hidden-code">ti-facebook</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox"></i><code class="hidden-code">ti-dropbox</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dribbble"></i><code class="hidden-code">ti-dribbble</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-apple"></i><code class="hidden-code">ti-apple</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-android"></i><code class="hidden-code">ti-android</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save"></i><code class="hidden-code">ti-save</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save-alt"></i><code class="hidden-code">ti-save-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-yahoo"></i><code class="hidden-code">ti-yahoo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wordpress"></i><code class="hidden-code">ti-wordpress</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo-alt"></i><code class="hidden-code">ti-vimeo-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter-alt"></i><code class="hidden-code">ti-twitter-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr-alt"></i><code class="hidden-code">ti-tumblr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trello"></i><code class="hidden-code">ti-trello</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stack-overflow"></i><code class="hidden-code">ti-stack-overflow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-soundcloud"></i><code class="hidden-code">ti-soundcloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis"></i><code class="hidden-code">ti-sharethis</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis-alt"></i><code class="hidden-code">ti-sharethis-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reddit"></i><code class="hidden-code">ti-reddit</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest-alt"></i><code class="hidden-code">ti-pinterest-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft-alt"></i><code class="hidden-code">ti-microsoft-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linux"></i><code class="hidden-code">ti-linux</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-jsfiddle"></i><code class="hidden-code">ti-jsfiddle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-joomla"></i><code class="hidden-code">ti-joomla</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-html5"></i><code class="hidden-code">ti-html5</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr-alt"></i><code class="hidden-code">ti-flickr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-email"></i><code class="hidden-code">ti-email</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-drupal"></i><code class="hidden-code">ti-drupal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox-alt"></i><code class="hidden-code">ti-dropbox-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-css3"></i><code class="hidden-code">ti-css3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss"></i><code class="hidden-code">ti-rss</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss-alt"></i><code class="hidden-code">ti-rss-alt</code>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- enf of row-->
                                  </div>
                          </div>
                                    <!-- enf of row-->
                         </div>
                     </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button data-dismiss="modal" type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Modal -->

                   <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Expertise</h4>
                <a href="{{route('expertise.index')}}" type="submit" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('expertise.store')}}" method="post">
                    @csrf
                   
                    <div class="form-group">
                        <label style="font-weight:bold">Title</label>
                        <input name="title" value="{{$expertise_id -> title}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Description</label>
                        <input name="description" value="{{$expertise_id -> desc}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold"> Select Icon</label>
                        <input data-toggle="modal" data-target="#exampleModalLong" name="icon" value="{{$expertise_id -> icon}}" type="text" class="form-control expertise-icon">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden-code="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                              <div class="button-group">
                              <button data-dismiss="modal" type="button" class="btn btn-primary"><i class="fa-solid fa-window-restore"></i> Save changes</button>
                              <button data-dismiss="modal" type="button" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> Close</button>
     <!--                          <button type="button" class="close btn btn-danger" data-dismiss="modal">Close</button> -->
                              </div>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="title center mb-50">
                                      <h3 class="fw-400">Select Icons</h3>
                                      <hr>
                                    </div>
                                    <div class="row">
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wand"></i><code class="hidden-code">ti-wand</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-volume"></i><code class="hidden-code">ti-volume</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-user"></i><code class="hidden-code">ti-user</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlock"></i><code class="hidden-code">ti-unlock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlink"></i><code class="hidden-code">ti-unlink</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trash"></i><code class="hidden-code">ti-trash</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thought"></i><code class="hidden-code">ti-thought</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-target"></i><code class="hidden-code">ti-target</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tag"></i><code class="hidden-code">ti-tag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tablet"></i><code class="hidden-code">ti-tablet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-star"></i><code class="hidden-code">ti-star</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-spray"></i><code class="hidden-code">ti-spray</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-signal"></i><code class="hidden-code">ti-signal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart"></i><code class="hidden-code">ti-shopping-cart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart-full"></i><code class="hidden-code">ti-shopping-cart-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-settings"></i><code class="hidden-code">ti-settings</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-search"></i><code class="hidden-code">ti-search</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-in"></i><code class="hidden-code">ti-zoom-in</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-out"></i><code class="hidden-code">ti-zoom-out</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cut"></i><code class="hidden-code">ti-cut</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler"></i><code class="hidden-code">ti-ruler</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-pencil"></i><code class="hidden-code">ti-ruler-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt"></i><code class="hidden-code">ti-ruler-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark"></i><code class="hidden-code">ti-bookmark</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark-alt"></i><code class="hidden-code">ti-bookmark-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reload"></i><code class="hidden-code">ti-reload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plus"></i><code class="hidden-code">ti-plus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin"></i><code class="hidden-code">ti-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil"></i><code class="hidden-code">ti-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt"></i><code class="hidden-code">ti-pencil-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-roller"></i><code class="hidden-code">ti-paint-roller</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-bucket"></i><code class="hidden-code">ti-paint-bucket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-na"></i><code class="hidden-code">ti-na</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mobile"></i><code class="hidden-code">ti-mobile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-minus"></i><code class="hidden-code">ti-minus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall"></i><code class="hidden-code">ti-medall</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall-alt"></i><code class="hidden-code">ti-medall-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker"></i><code class="hidden-code">ti-marker</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker-alt"></i><code class="hidden-code">ti-marker-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-up"></i><code class="hidden-code">ti-arrow-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-right"></i><code class="hidden-code">ti-arrow-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-left"></i><code class="hidden-code">ti-arrow-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-down"></i><code class="hidden-code">ti-arrow-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-lock"></i><code class="hidden-code">ti-lock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-arrow"></i><code class="hidden-code">ti-location-arrow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-link"></i><code class="hidden-code">ti-link</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout"></i><code class="hidden-code">ti-layout</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers"></i><code class="hidden-code">ti-layers</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers-alt"></i><code class="hidden-code">ti-layers-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-key"></i><code class="hidden-code">ti-key</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-import"></i><code class="hidden-code">ti-import</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-image"></i><code class="hidden-code">ti-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart"></i><code class="hidden-code">ti-heart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart-broken"></i><code class="hidden-code">ti-heart-broken</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-stop"></i><code class="hidden-code">ti-hand-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-open"></i><code class="hidden-code">ti-hand-open</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-drag"></i><code class="hidden-code">ti-hand-drag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-folder"></i><code class="hidden-code">ti-folder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag"></i><code class="hidden-code">ti-flag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt"></i><code class="hidden-code">ti-flag-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt-2"></i><code class="hidden-code">ti-flag-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eye"></i><code class="hidden-code">ti-eye</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-export"></i><code class="hidden-code">ti-export</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-exchange-vertical"></i><code class="hidden-code">ti-exchange-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-desktop"></i><code class="hidden-code">ti-desktop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cup"></i><code class="hidden-code">ti-cup</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-crown"></i><code class="hidden-code">ti-crown</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments"></i><code class="hidden-code">ti-comments</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment"></i><code class="hidden-code">ti-comment</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment-alt"></i><code class="hidden-code">ti-comment-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-close"></i><code class="hidden-code">ti-close</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clip"></i><code class="hidden-code">ti-clip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-up"></i><code class="hidden-code">ti-angle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-right"></i><code class="hidden-code">ti-angle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-left"></i><code class="hidden-code">ti-angle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-down"></i><code class="hidden-code">ti-angle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check"></i><code class="hidden-code">ti-check</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check-box"></i><code class="hidden-code">ti-check-box</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-camera"></i><code class="hidden-code">ti-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-announcement"></i><code class="hidden-code">ti-announcement</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush"></i><code class="hidden-code">ti-brush</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-briefcase"></i><code class="hidden-code">ti-briefcase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt"></i><code class="hidden-code">ti-bolt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt-alt"></i><code class="hidden-code">ti-bolt-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-blackboard"></i><code class="hidden-code">ti-blackboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bag"></i><code class="hidden-code">ti-bag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-move"></i><code class="hidden-code">ti-move</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-vertical"></i><code class="hidden-code">ti-arrows-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-horizontal"></i><code class="hidden-code">ti-arrows-horizontal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-fullscreen"></i><code class="hidden-code">ti-fullscreen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-right"></i><code class="hidden-code">ti-arrow-top-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-left"></i><code class="hidden-code">ti-arrow-top-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-up"></i><code class="hidden-code">ti-arrow-circle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-right"></i><code class="hidden-code">ti-arrow-circle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-left"></i><code class="hidden-code">ti-arrow-circle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-down"></i><code class="hidden-code">ti-arrow-circle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-up"></i><code class="hidden-code">ti-angle-double-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-right"></i><code class="hidden-code">ti-angle-double-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-left"></i><code class="hidden-code">ti-angle-double-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-down"></i><code class="hidden-code">ti-angle-double-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zip"></i><code class="hidden-code">ti-zip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-world"></i><code class="hidden-code">ti-world</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wheelchair"></i><code class="hidden-code">ti-wheelchair</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list"></i><code class="hidden-code">ti-view-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list-alt"></i><code class="hidden-code">ti-view-list-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-grid"></i><code class="hidden-code">ti-view-grid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-uppercase"></i><code class="hidden-code">ti-uppercase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-upload"></i><code class="hidden-code">ti-upload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-underline"></i><code class="hidden-code">ti-underline</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-truck"></i><code class="hidden-code">ti-truck</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-timer"></i><code class="hidden-code">ti-timer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ticket"></i><code class="hidden-code">ti-ticket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-up"></i><code class="hidden-code">ti-thumb-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-down"></i><code class="hidden-code">ti-thumb-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-text"></i><code class="hidden-code">ti-text</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-up"></i><code class="hidden-code">ti-stats-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-down"></i><code class="hidden-code">ti-stats-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v"></i><code class="hidden-code">ti-split-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-h"></i><code class="hidden-code">ti-split-h</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-smallcap"></i><code class="hidden-code">ti-smallcap</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shine"></i><code class="hidden-code">ti-shine</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right"></i><code class="hidden-code">ti-shift-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left"></i><code class="hidden-code">ti-shift-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shield"></i><code class="hidden-code">ti-shield</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-notepad"></i><code class="hidden-code">ti-notepad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-server"></i><code class="hidden-code">ti-server</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-right"></i><code class="hidden-code">ti-quote-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-left"></i><code class="hidden-code">ti-quote-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pulse"></i><code class="hidden-code">ti-pulse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-printer"></i><code class="hidden-code">ti-printer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-power-off"></i><code class="hidden-code">ti-power-off</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plug"></i><code class="hidden-code">ti-plug</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pie-chart"></i><code class="hidden-code">ti-pie-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paragraph"></i><code class="hidden-code">ti-paragraph</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-panel"></i><code class="hidden-code">ti-panel</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-package"></i><code class="hidden-code">ti-package</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music"></i><code class="hidden-code">ti-music</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music-alt"></i><code class="hidden-code">ti-music-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse"></i><code class="hidden-code">ti-mouse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse-alt"></i><code class="hidden-code">ti-mouse-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-money"></i><code class="hidden-code">ti-money</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone"></i><code class="hidden-code">ti-microphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu"></i><code class="hidden-code">ti-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu-alt"></i><code class="hidden-code">ti-menu-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map"></i><code class="hidden-code">ti-map</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map-alt"></i><code class="hidden-code">ti-map-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-loop"></i><code class="hidden-code">ti-loop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-pin"></i><code class="hidden-code">ti-location-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list"></i><code class="hidden-code">ti-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-light-bulb"></i><code class="hidden-code">ti-light-bulb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-Italic"></i><code class="hidden-code">ti-Italic</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info"></i><code class="hidden-code">ti-info</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-infinite"></i><code class="hidden-code">ti-infinite</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-id-badge"></i><code class="hidden-code">ti-id-badge</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hummer"></i><code class="hidden-code">ti-hummer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-home"></i><code class="hidden-code">ti-home</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help"></i><code class="hidden-code">ti-help</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone"></i><code class="hidden-code">ti-headphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrives"></i><code class="hidden-code">ti-harddrives</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrive"></i><code class="hidden-code">ti-harddrive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gift"></i><code class="hidden-code">ti-gift</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-game"></i><code class="hidden-code">ti-game</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-filter"></i><code class="hidden-code">ti-filter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-files"></i><code class="hidden-code">ti-files</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-file"></i><code class="hidden-code">ti-file</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eraser"></i><code class="hidden-code">ti-eraser</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-envelope"></i><code class="hidden-code">ti-envelope</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-download"></i><code class="hidden-code">ti-download</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction"></i><code class="hidden-code">ti-direction</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction-alt"></i><code class="hidden-code">ti-direction-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dashboard"></i><code class="hidden-code">ti-dashboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-stop"></i><code class="hidden-code">ti-control-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-shuffle"></i><code class="hidden-code">ti-control-shuffle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-play"></i><code class="hidden-code">ti-control-play</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-pause"></i><code class="hidden-code">ti-control-pause</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-forward"></i><code class="hidden-code">ti-control-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-backward"></i><code class="hidden-code">ti-control-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud"></i><code class="hidden-code">ti-cloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-up"></i><code class="hidden-code">ti-cloud-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-down"></i><code class="hidden-code">ti-cloud-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clipboard"></i><code class="hidden-code">ti-clipboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-car"></i><code class="hidden-code">ti-car</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-calendar"></i><code class="hidden-code">ti-calendar</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-book"></i><code class="hidden-code">ti-book</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bell"></i><code class="hidden-code">ti-bell</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-basketball"></i><code class="hidden-code">ti-basketball</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart"></i><code class="hidden-code">ti-bar-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart-alt"></i><code class="hidden-code">ti-bar-chart-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-right"></i><code class="hidden-code">ti-back-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-left"></i><code class="hidden-code">ti-back-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-corner"></i><code class="hidden-code">ti-arrows-corner</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-archive"></i><code class="hidden-code">ti-archive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-anchor"></i><code class="hidden-code">ti-anchor</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-right"></i><code class="hidden-code">ti-align-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-left"></i><code class="hidden-code">ti-align-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-justify"></i><code class="hidden-code">ti-align-justify</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-center"></i><code class="hidden-code">ti-align-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alert"></i><code class="hidden-code">ti-alert</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alarm-clock"></i><code class="hidden-code">ti-alarm-clock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-agenda"></i><code class="hidden-code">ti-agenda</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-write"></i><code class="hidden-code">ti-write</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-window"></i><code class="hidden-code">ti-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widgetized"></i><code class="hidden-code">ti-widgetized</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget"></i><code class="hidden-code">ti-widget</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget-alt"></i><code class="hidden-code">ti-widget-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wallet"></i><code class="hidden-code">ti-wallet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-clapper"></i><code class="hidden-code">ti-video-clapper</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-camera"></i><code class="hidden-code">ti-video-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vector"></i><code class="hidden-code">ti-vector</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-logo"></i><code class="hidden-code">ti-themify-logo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon"></i><code class="hidden-code">ti-themify-favicon</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon-alt"></i><code class="hidden-code">ti-themify-favicon-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-support"></i><code class="hidden-code">ti-support</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stamp"></i><code class="hidden-code">ti-stamp</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v-alt"></i><code class="hidden-code">ti-split-v-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-slice"></i><code class="hidden-code">ti-slice</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shortcode"></i><code class="hidden-code">ti-shortcode</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right-alt"></i><code class="hidden-code">ti-shift-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left-alt"></i><code class="hidden-code">ti-shift-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt-2"></i><code class="hidden-code">ti-ruler-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-receipt"></i><code class="hidden-code">ti-receipt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin2"></i><code class="hidden-code">ti-pin2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin-alt"></i><code class="hidden-code">ti-pin-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt2"></i><code class="hidden-code">ti-pencil-alt2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-palette"></i><code class="hidden-code">ti-palette</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more"></i><code class="hidden-code">ti-more</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more-alt"></i><code class="hidden-code">ti-more-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone-alt"></i><code class="hidden-code">ti-microphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-magnet"></i><code class="hidden-code">ti-magnet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-double"></i><code class="hidden-code">ti-line-double</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dotted"></i><code class="hidden-code">ti-line-dotted</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dashed"></i><code class="hidden-code">ti-line-dashed</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-full"></i><code class="hidden-code">ti-layout-width-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default"></i><code class="hidden-code">ti-layout-width-default</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default-alt"></i><code class="hidden-code">ti-layout-width-default-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab"></i><code class="hidden-code">ti-layout-tab</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-window"></i><code class="hidden-code">ti-layout-tab-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-v"></i><code class="hidden-code">ti-layout-tab-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-min"></i><code class="hidden-code">ti-layout-tab-min</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider"></i><code class="hidden-code">ti-layout-slider</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider-alt"></i><code class="hidden-code">ti-layout-slider-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-right"></i><code class="hidden-code">ti-layout-sidebar-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-none"></i><code class="hidden-code">ti-layout-sidebar-none</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-left"></i><code class="hidden-code">ti-layout-sidebar-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-placeholder"></i><code class="hidden-code">ti-layout-placeholder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu"></i><code class="hidden-code">ti-layout-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-v"></i><code class="hidden-code">ti-layout-menu-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-separated"></i><code class="hidden-code">ti-layout-menu-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-full"></i><code class="hidden-code">ti-layout-menu-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right-alt"></i><code class="hidden-code">ti-layout-media-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right"></i><code class="hidden-code">ti-layout-media-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay"></i><code class="hidden-code">ti-layout-media-overlay</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt"></i><code class="hidden-code">ti-layout-media-overlay-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt-2"></i><code class="hidden-code">ti-layout-media-overlay-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left-alt"></i><code class="hidden-code">ti-layout-media-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left"></i><code class="hidden-code">ti-layout-media-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center-alt"></i><code class="hidden-code">ti-layout-media-center-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center"></i><code class="hidden-code">ti-layout-media-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb"></i><code class="hidden-code">ti-layout-list-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb-alt"></i><code class="hidden-code">ti-layout-list-thumb-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-post"></i><code class="hidden-code">ti-layout-list-post</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-large-image"></i><code class="hidden-code">ti-layout-list-large-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-line-solid"></i><code class="hidden-code">ti-layout-line-solid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4"></i><code class="hidden-code">ti-layout-grid4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3"></i><code class="hidden-code">ti-layout-grid3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2"></i><code class="hidden-code">ti-layout-grid2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-thumb"></i><code class="hidden-code">ti-layout-grid2-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-right"></i><code class="hidden-code">ti-layout-cta-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-left"></i><code class="hidden-code">ti-layout-cta-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-center"></i><code class="hidden-code">ti-layout-cta-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-right"></i><code class="hidden-code">ti-layout-cta-btn-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-left"></i><code class="hidden-code">ti-layout-cta-btn-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4"></i><code class="hidden-code">ti-layout-column4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3"></i><code class="hidden-code">ti-layout-column3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2"></i><code class="hidden-code">ti-layout-column2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-separated"></i><code class="hidden-code">ti-layout-accordion-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-merged"></i><code class="hidden-code">ti-layout-accordion-merged</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-list"></i><code class="hidden-code">ti-layout-accordion-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ink-pen"></i><code class="hidden-code">ti-ink-pen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info-alt"></i><code class="hidden-code">ti-info-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help-alt"></i><code class="hidden-code">ti-help-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone-alt"></i><code class="hidden-code">ti-headphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-up"></i><code class="hidden-code">ti-hand-point-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-right"></i><code class="hidden-code">ti-hand-point-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-left"></i><code class="hidden-code">ti-hand-point-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-down"></i><code class="hidden-code">ti-hand-point-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gallery"></i><code class="hidden-code">ti-gallery</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-smile"></i><code class="hidden-code">ti-face-smile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-sad"></i><code class="hidden-code">ti-face-sad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-credit-card"></i><code class="hidden-code">ti-credit-card</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-forward"></i><code class="hidden-code">ti-control-skip-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-backward"></i><code class="hidden-code">ti-control-skip-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-record"></i><code class="hidden-code">ti-control-record</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-eject"></i><code class="hidden-code">ti-control-eject</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments-smiley"></i><code class="hidden-code">ti-comments-smiley</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush-alt"></i><code class="hidden-code">ti-brush-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-youtube"></i><code class="hidden-code">ti-youtube</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo"></i><code class="hidden-code">ti-vimeo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter"></i><code class="hidden-code">ti-twitter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-time"></i><code class="hidden-code">ti-time</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr"></i><code class="hidden-code">ti-tumblr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-skype"></i><code class="hidden-code">ti-skype</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share"></i><code class="hidden-code">ti-share</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share-alt"></i><code class="hidden-code">ti-share-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rocket"></i><code class="hidden-code">ti-rocket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest"></i><code class="hidden-code">ti-pinterest</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-new-window"></i><code class="hidden-code">ti-new-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft"></i><code class="hidden-code">ti-microsoft</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list-ol"></i><code class="hidden-code">ti-list-ol</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linkedin"></i><code class="hidden-code">ti-linkedin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-2"></i><code class="hidden-code">ti-layout-sidebar-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4-alt"></i><code class="hidden-code">ti-layout-grid4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3-alt"></i><code class="hidden-code">ti-layout-grid3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-alt"></i><code class="hidden-code">ti-layout-grid2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4-alt"></i><code class="hidden-code">ti-layout-column4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3-alt"></i><code class="hidden-code">ti-layout-column3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2-alt"></i><code class="hidden-code">ti-layout-column2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-instagram"></i><code class="hidden-code">ti-instagram</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-google"></i><code class="hidden-code">ti-google</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-github"></i><code class="hidden-code">ti-github</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr"></i><code class="hidden-code">ti-flickr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-facebook"></i><code class="hidden-code">ti-facebook</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox"></i><code class="hidden-code">ti-dropbox</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dribbble"></i><code class="hidden-code">ti-dribbble</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-apple"></i><code class="hidden-code">ti-apple</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-android"></i><code class="hidden-code">ti-android</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save"></i><code class="hidden-code">ti-save</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save-alt"></i><code class="hidden-code">ti-save-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-yahoo"></i><code class="hidden-code">ti-yahoo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wordpress"></i><code class="hidden-code">ti-wordpress</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo-alt"></i><code class="hidden-code">ti-vimeo-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter-alt"></i><code class="hidden-code">ti-twitter-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr-alt"></i><code class="hidden-code">ti-tumblr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trello"></i><code class="hidden-code">ti-trello</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stack-overflow"></i><code class="hidden-code">ti-stack-overflow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-soundcloud"></i><code class="hidden-code">ti-soundcloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis"></i><code class="hidden-code">ti-sharethis</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis-alt"></i><code class="hidden-code">ti-sharethis-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reddit"></i><code class="hidden-code">ti-reddit</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest-alt"></i><code class="hidden-code">ti-pinterest-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft-alt"></i><code class="hidden-code">ti-microsoft-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linux"></i><code class="hidden-code">ti-linux</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-jsfiddle"></i><code class="hidden-code">ti-jsfiddle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-joomla"></i><code class="hidden-code">ti-joomla</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-html5"></i><code class="hidden-code">ti-html5</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr-alt"></i><code class="hidden-code">ti-flickr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-email"></i><code class="hidden-code">ti-email</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-drupal"></i><code class="hidden-code">ti-drupal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox-alt"></i><code class="hidden-code">ti-dropbox-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-css3"></i><code class="hidden-code">ti-css3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss"></i><code class="hidden-code">ti-rss</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss-alt"></i><code class="hidden-code">ti-rss-alt</code>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- enf of row-->
                                  </div>
                          </div>
                                    <!-- enf of row-->
                         </div>
                     </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button data-dismiss="modal" type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Modal -->

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