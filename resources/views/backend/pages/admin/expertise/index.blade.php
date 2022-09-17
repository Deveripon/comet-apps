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
                            <td>{{$item -> icon}}</td>                    
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
                        <input name="title" value="" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Description</label>
                        <input name="description" value="" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold"> Select Icon</label>
                        <input data-toggle="modal" data-target="#exampleModalLong" name="icon" value="" type="text" class="form-control expertise-icon">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="title center mb-50">
                                      <h3 class="fw-400">Select Icons</h3>
                                      <hr>
                                    </div>
                                    <div class="row">
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wand"></i><code class="hidden">ti-wand</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-volume"></i><code class="hidden">ti-volume</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-user"></i><code class="hidden">ti-user</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlock"></i><code class="hidden">ti-unlock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-unlink"></i><code class="hidden">ti-unlink</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trash"></i><code class="hidden">ti-trash</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thought"></i><code class="hidden">ti-thought</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-target"></i><code class="hidden">ti-target</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tag"></i><code class="hidden">ti-tag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tablet"></i><code class="hidden">ti-tablet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-star"></i><code class="hidden">ti-star</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-spray"></i><code class="hidden">ti-spray</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-signal"></i><code class="hidden">ti-signal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart"></i><code class="hidden">ti-shopping-cart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shopping-cart-full"></i><code class="hidden">ti-shopping-cart-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-settings"></i><code class="hidden">ti-settings</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-search"></i><code class="hidden">ti-search</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-in"></i><code class="hidden">ti-zoom-in</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zoom-out"></i><code class="hidden">ti-zoom-out</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cut"></i><code class="hidden">ti-cut</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler"></i><code class="hidden">ti-ruler</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-pencil"></i><code class="hidden">ti-ruler-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt"></i><code class="hidden">ti-ruler-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark"></i><code class="hidden">ti-bookmark</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bookmark-alt"></i><code class="hidden">ti-bookmark-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reload"></i><code class="hidden">ti-reload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plus"></i><code class="hidden">ti-plus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin"></i><code class="hidden">ti-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil"></i><code class="hidden">ti-pencil</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt"></i><code class="hidden">ti-pencil-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-roller"></i><code class="hidden">ti-paint-roller</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paint-bucket"></i><code class="hidden">ti-paint-bucket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-na"></i><code class="hidden">ti-na</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mobile"></i><code class="hidden">ti-mobile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-minus"></i><code class="hidden">ti-minus</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall"></i><code class="hidden">ti-medall</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-medall-alt"></i><code class="hidden">ti-medall-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker"></i><code class="hidden">ti-marker</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-marker-alt"></i><code class="hidden">ti-marker-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-up"></i><code class="hidden">ti-arrow-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-right"></i><code class="hidden">ti-arrow-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-left"></i><code class="hidden">ti-arrow-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-down"></i><code class="hidden">ti-arrow-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-lock"></i><code class="hidden">ti-lock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-arrow"></i><code class="hidden">ti-location-arrow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-link"></i><code class="hidden">ti-link</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout"></i><code class="hidden">ti-layout</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers"></i><code class="hidden">ti-layers</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layers-alt"></i><code class="hidden">ti-layers-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-key"></i><code class="hidden">ti-key</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-import"></i><code class="hidden">ti-import</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-image"></i><code class="hidden">ti-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart"></i><code class="hidden">ti-heart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-heart-broken"></i><code class="hidden">ti-heart-broken</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-stop"></i><code class="hidden">ti-hand-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-open"></i><code class="hidden">ti-hand-open</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-drag"></i><code class="hidden">ti-hand-drag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-folder"></i><code class="hidden">ti-folder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag"></i><code class="hidden">ti-flag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt"></i><code class="hidden">ti-flag-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flag-alt-2"></i><code class="hidden">ti-flag-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eye"></i><code class="hidden">ti-eye</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-export"></i><code class="hidden">ti-export</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-exchange-vertical"></i><code class="hidden">ti-exchange-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-desktop"></i><code class="hidden">ti-desktop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cup"></i><code class="hidden">ti-cup</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-crown"></i><code class="hidden">ti-crown</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments"></i><code class="hidden">ti-comments</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment"></i><code class="hidden">ti-comment</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comment-alt"></i><code class="hidden">ti-comment-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-close"></i><code class="hidden">ti-close</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clip"></i><code class="hidden">ti-clip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-up"></i><code class="hidden">ti-angle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-right"></i><code class="hidden">ti-angle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-left"></i><code class="hidden">ti-angle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-down"></i><code class="hidden">ti-angle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check"></i><code class="hidden">ti-check</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-check-box"></i><code class="hidden">ti-check-box</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-camera"></i><code class="hidden">ti-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-announcement"></i><code class="hidden">ti-announcement</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush"></i><code class="hidden">ti-brush</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-briefcase"></i><code class="hidden">ti-briefcase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt"></i><code class="hidden">ti-bolt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bolt-alt"></i><code class="hidden">ti-bolt-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-blackboard"></i><code class="hidden">ti-blackboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bag"></i><code class="hidden">ti-bag</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-move"></i><code class="hidden">ti-move</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-vertical"></i><code class="hidden">ti-arrows-vertical</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-horizontal"></i><code class="hidden">ti-arrows-horizontal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-fullscreen"></i><code class="hidden">ti-fullscreen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-right"></i><code class="hidden">ti-arrow-top-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-top-left"></i><code class="hidden">ti-arrow-top-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-up"></i><code class="hidden">ti-arrow-circle-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-right"></i><code class="hidden">ti-arrow-circle-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-left"></i><code class="hidden">ti-arrow-circle-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrow-circle-down"></i><code class="hidden">ti-arrow-circle-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-up"></i><code class="hidden">ti-angle-double-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-right"></i><code class="hidden">ti-angle-double-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-left"></i><code class="hidden">ti-angle-double-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-angle-double-down"></i><code class="hidden">ti-angle-double-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-zip"></i><code class="hidden">ti-zip</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-world"></i><code class="hidden">ti-world</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wheelchair"></i><code class="hidden">ti-wheelchair</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list"></i><code class="hidden">ti-view-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-list-alt"></i><code class="hidden">ti-view-list-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-view-grid"></i><code class="hidden">ti-view-grid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-uppercase"></i><code class="hidden">ti-uppercase</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-upload"></i><code class="hidden">ti-upload</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-underline"></i><code class="hidden">ti-underline</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-truck"></i><code class="hidden">ti-truck</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-timer"></i><code class="hidden">ti-timer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ticket"></i><code class="hidden">ti-ticket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-up"></i><code class="hidden">ti-thumb-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-thumb-down"></i><code class="hidden">ti-thumb-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-text"></i><code class="hidden">ti-text</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-up"></i><code class="hidden">ti-stats-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stats-down"></i><code class="hidden">ti-stats-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v"></i><code class="hidden">ti-split-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-h"></i><code class="hidden">ti-split-h</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-smallcap"></i><code class="hidden">ti-smallcap</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shine"></i><code class="hidden">ti-shine</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right"></i><code class="hidden">ti-shift-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left"></i><code class="hidden">ti-shift-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shield"></i><code class="hidden">ti-shield</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-notepad"></i><code class="hidden">ti-notepad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-server"></i><code class="hidden">ti-server</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-right"></i><code class="hidden">ti-quote-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-quote-left"></i><code class="hidden">ti-quote-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pulse"></i><code class="hidden">ti-pulse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-printer"></i><code class="hidden">ti-printer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-power-off"></i><code class="hidden">ti-power-off</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-plug"></i><code class="hidden">ti-plug</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pie-chart"></i><code class="hidden">ti-pie-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-paragraph"></i><code class="hidden">ti-paragraph</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-panel"></i><code class="hidden">ti-panel</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-package"></i><code class="hidden">ti-package</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music"></i><code class="hidden">ti-music</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-music-alt"></i><code class="hidden">ti-music-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse"></i><code class="hidden">ti-mouse</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-mouse-alt"></i><code class="hidden">ti-mouse-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-money"></i><code class="hidden">ti-money</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone"></i><code class="hidden">ti-microphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu"></i><code class="hidden">ti-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-menu-alt"></i><code class="hidden">ti-menu-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map"></i><code class="hidden">ti-map</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-map-alt"></i><code class="hidden">ti-map-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-loop"></i><code class="hidden">ti-loop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-location-pin"></i><code class="hidden">ti-location-pin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list"></i><code class="hidden">ti-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-light-bulb"></i><code class="hidden">ti-light-bulb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-Italic"></i><code class="hidden">ti-Italic</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info"></i><code class="hidden">ti-info</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-infinite"></i><code class="hidden">ti-infinite</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-id-badge"></i><code class="hidden">ti-id-badge</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hummer"></i><code class="hidden">ti-hummer</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-home"></i><code class="hidden">ti-home</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help"></i><code class="hidden">ti-help</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone"></i><code class="hidden">ti-headphone</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrives"></i><code class="hidden">ti-harddrives</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-harddrive"></i><code class="hidden">ti-harddrive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gift"></i><code class="hidden">ti-gift</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-game"></i><code class="hidden">ti-game</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-filter"></i><code class="hidden">ti-filter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-files"></i><code class="hidden">ti-files</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-file"></i><code class="hidden">ti-file</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-eraser"></i><code class="hidden">ti-eraser</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-envelope"></i><code class="hidden">ti-envelope</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-download"></i><code class="hidden">ti-download</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction"></i><code class="hidden">ti-direction</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-direction-alt"></i><code class="hidden">ti-direction-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dashboard"></i><code class="hidden">ti-dashboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-stop"></i><code class="hidden">ti-control-stop</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-shuffle"></i><code class="hidden">ti-control-shuffle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-play"></i><code class="hidden">ti-control-play</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-pause"></i><code class="hidden">ti-control-pause</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-forward"></i><code class="hidden">ti-control-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-backward"></i><code class="hidden">ti-control-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud"></i><code class="hidden">ti-cloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-up"></i><code class="hidden">ti-cloud-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-cloud-down"></i><code class="hidden">ti-cloud-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-clipboard"></i><code class="hidden">ti-clipboard</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-car"></i><code class="hidden">ti-car</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-calendar"></i><code class="hidden">ti-calendar</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-book"></i><code class="hidden">ti-book</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bell"></i><code class="hidden">ti-bell</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-basketball"></i><code class="hidden">ti-basketball</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart"></i><code class="hidden">ti-bar-chart</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-bar-chart-alt"></i><code class="hidden">ti-bar-chart-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-right"></i><code class="hidden">ti-back-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-back-left"></i><code class="hidden">ti-back-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-arrows-corner"></i><code class="hidden">ti-arrows-corner</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-archive"></i><code class="hidden">ti-archive</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-anchor"></i><code class="hidden">ti-anchor</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-right"></i><code class="hidden">ti-align-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-left"></i><code class="hidden">ti-align-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-justify"></i><code class="hidden">ti-align-justify</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-align-center"></i><code class="hidden">ti-align-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alert"></i><code class="hidden">ti-alert</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-alarm-clock"></i><code class="hidden">ti-alarm-clock</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-agenda"></i><code class="hidden">ti-agenda</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-write"></i><code class="hidden">ti-write</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-window"></i><code class="hidden">ti-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widgetized"></i><code class="hidden">ti-widgetized</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget"></i><code class="hidden">ti-widget</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-widget-alt"></i><code class="hidden">ti-widget-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wallet"></i><code class="hidden">ti-wallet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-clapper"></i><code class="hidden">ti-video-clapper</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-video-camera"></i><code class="hidden">ti-video-camera</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vector"></i><code class="hidden">ti-vector</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-logo"></i><code class="hidden">ti-themify-logo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon"></i><code class="hidden">ti-themify-favicon</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-themify-favicon-alt"></i><code class="hidden">ti-themify-favicon-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-support"></i><code class="hidden">ti-support</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stamp"></i><code class="hidden">ti-stamp</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-split-v-alt"></i><code class="hidden">ti-split-v-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-slice"></i><code class="hidden">ti-slice</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shortcode"></i><code class="hidden">ti-shortcode</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-right-alt"></i><code class="hidden">ti-shift-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-shift-left-alt"></i><code class="hidden">ti-shift-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ruler-alt-2"></i><code class="hidden">ti-ruler-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-receipt"></i><code class="hidden">ti-receipt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin2"></i><code class="hidden">ti-pin2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pin-alt"></i><code class="hidden">ti-pin-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pencil-alt2"></i><code class="hidden">ti-pencil-alt2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-palette"></i><code class="hidden">ti-palette</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more"></i><code class="hidden">ti-more</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-more-alt"></i><code class="hidden">ti-more-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microphone-alt"></i><code class="hidden">ti-microphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-magnet"></i><code class="hidden">ti-magnet</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-double"></i><code class="hidden">ti-line-double</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dotted"></i><code class="hidden">ti-line-dotted</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-line-dashed"></i><code class="hidden">ti-line-dashed</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-full"></i><code class="hidden">ti-layout-width-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default"></i><code class="hidden">ti-layout-width-default</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-width-default-alt"></i><code class="hidden">ti-layout-width-default-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab"></i><code class="hidden">ti-layout-tab</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-window"></i><code class="hidden">ti-layout-tab-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-v"></i><code class="hidden">ti-layout-tab-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-tab-min"></i><code class="hidden">ti-layout-tab-min</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider"></i><code class="hidden">ti-layout-slider</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-slider-alt"></i><code class="hidden">ti-layout-slider-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-right"></i><code class="hidden">ti-layout-sidebar-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-none"></i><code class="hidden">ti-layout-sidebar-none</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-left"></i><code class="hidden">ti-layout-sidebar-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-placeholder"></i><code class="hidden">ti-layout-placeholder</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu"></i><code class="hidden">ti-layout-menu</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-v"></i><code class="hidden">ti-layout-menu-v</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-separated"></i><code class="hidden">ti-layout-menu-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-menu-full"></i><code class="hidden">ti-layout-menu-full</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right-alt"></i><code class="hidden">ti-layout-media-right-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-right"></i><code class="hidden">ti-layout-media-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay"></i><code class="hidden">ti-layout-media-overlay</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt"></i><code class="hidden">ti-layout-media-overlay-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-overlay-alt-2"></i><code class="hidden">ti-layout-media-overlay-alt-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left-alt"></i><code class="hidden">ti-layout-media-left-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-left"></i><code class="hidden">ti-layout-media-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center-alt"></i><code class="hidden">ti-layout-media-center-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-media-center"></i><code class="hidden">ti-layout-media-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb"></i><code class="hidden">ti-layout-list-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-thumb-alt"></i><code class="hidden">ti-layout-list-thumb-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-post"></i><code class="hidden">ti-layout-list-post</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-list-large-image"></i><code class="hidden">ti-layout-list-large-image</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-line-solid"></i><code class="hidden">ti-layout-line-solid</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4"></i><code class="hidden">ti-layout-grid4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3"></i><code class="hidden">ti-layout-grid3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2"></i><code class="hidden">ti-layout-grid2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-thumb"></i><code class="hidden">ti-layout-grid2-thumb</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-right"></i><code class="hidden">ti-layout-cta-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-left"></i><code class="hidden">ti-layout-cta-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-center"></i><code class="hidden">ti-layout-cta-center</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-right"></i><code class="hidden">ti-layout-cta-btn-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-cta-btn-left"></i><code class="hidden">ti-layout-cta-btn-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4"></i><code class="hidden">ti-layout-column4</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3"></i><code class="hidden">ti-layout-column3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2"></i><code class="hidden">ti-layout-column2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-separated"></i><code class="hidden">ti-layout-accordion-separated</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-merged"></i><code class="hidden">ti-layout-accordion-merged</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-accordion-list"></i><code class="hidden">ti-layout-accordion-list</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-ink-pen"></i><code class="hidden">ti-ink-pen</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-info-alt"></i><code class="hidden">ti-info-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-help-alt"></i><code class="hidden">ti-help-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-headphone-alt"></i><code class="hidden">ti-headphone-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-up"></i><code class="hidden">ti-hand-point-up</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-right"></i><code class="hidden">ti-hand-point-right</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-left"></i><code class="hidden">ti-hand-point-left</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-hand-point-down"></i><code class="hidden">ti-hand-point-down</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-gallery"></i><code class="hidden">ti-gallery</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-smile"></i><code class="hidden">ti-face-smile</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-face-sad"></i><code class="hidden">ti-face-sad</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-credit-card"></i><code class="hidden">ti-credit-card</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-forward"></i><code class="hidden">ti-control-skip-forward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-skip-backward"></i><code class="hidden">ti-control-skip-backward</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-record"></i><code class="hidden">ti-control-record</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-control-eject"></i><code class="hidden">ti-control-eject</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-comments-smiley"></i><code class="hidden">ti-comments-smiley</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-brush-alt"></i><code class="hidden">ti-brush-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-youtube"></i><code class="hidden">ti-youtube</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo"></i><code class="hidden">ti-vimeo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter"></i><code class="hidden">ti-twitter</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-time"></i><code class="hidden">ti-time</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr"></i><code class="hidden">ti-tumblr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-skype"></i><code class="hidden">ti-skype</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share"></i><code class="hidden">ti-share</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-share-alt"></i><code class="hidden">ti-share-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rocket"></i><code class="hidden">ti-rocket</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest"></i><code class="hidden">ti-pinterest</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-new-window"></i><code class="hidden">ti-new-window</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft"></i><code class="hidden">ti-microsoft</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-list-ol"></i><code class="hidden">ti-list-ol</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linkedin"></i><code class="hidden">ti-linkedin</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-sidebar-2"></i><code class="hidden">ti-layout-sidebar-2</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid4-alt"></i><code class="hidden">ti-layout-grid4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid3-alt"></i><code class="hidden">ti-layout-grid3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-grid2-alt"></i><code class="hidden">ti-layout-grid2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column4-alt"></i><code class="hidden">ti-layout-column4-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column3-alt"></i><code class="hidden">ti-layout-column3-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-layout-column2-alt"></i><code class="hidden">ti-layout-column2-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-instagram"></i><code class="hidden">ti-instagram</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-google"></i><code class="hidden">ti-google</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-github"></i><code class="hidden">ti-github</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr"></i><code class="hidden">ti-flickr</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-facebook"></i><code class="hidden">ti-facebook</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox"></i><code class="hidden">ti-dropbox</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dribbble"></i><code class="hidden">ti-dribbble</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-apple"></i><code class="hidden">ti-apple</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-android"></i><code class="hidden">ti-android</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save"></i><code class="hidden">ti-save</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-save-alt"></i><code class="hidden">ti-save-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-yahoo"></i><code class="hidden">ti-yahoo</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-wordpress"></i><code class="hidden">ti-wordpress</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-vimeo-alt"></i><code class="hidden">ti-vimeo-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-twitter-alt"></i><code class="hidden">ti-twitter-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-tumblr-alt"></i><code class="hidden">ti-tumblr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-trello"></i><code class="hidden">ti-trello</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-stack-overflow"></i><code class="hidden">ti-stack-overflow</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-soundcloud"></i><code class="hidden">ti-soundcloud</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis"></i><code class="hidden">ti-sharethis</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-sharethis-alt"></i><code class="hidden">ti-sharethis-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-reddit"></i><code class="hidden">ti-reddit</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-pinterest-alt"></i><code class="hidden">ti-pinterest-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-microsoft-alt"></i><code class="hidden">ti-microsoft-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-linux"></i><code class="hidden">ti-linux</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-jsfiddle"></i><code class="hidden">ti-jsfiddle</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-joomla"></i><code class="hidden">ti-joomla</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-html5"></i><code class="hidden">ti-html5</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-flickr-alt"></i><code class="hidden">ti-flickr-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-email"></i><code class="hidden">ti-email</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-drupal"></i><code class="hidden">ti-drupal</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-dropbox-alt"></i><code class="hidden">ti-dropbox-alt</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-css3"></i><code class="hidden">ti-css3</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss"></i><code class="hidden">ti-rss</code>
                                        </div>
                                      </div>
                                      <div class="icon-box">
                                        <div class="preview-icon"><i class="ti-rss-alt"></i><code class="hidden">ti-rss-alt</code>
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
                            <button type="button" class="btn btn-primary">Save changes</button>
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
            {{-- <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Clients</h4>
             
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('client.update',$client_data -> id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label style="font-weight:bold">Clients Name</label>
                        <input name="name" value="{{$client_data -> name}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Clients Company</label>
                        <input name="company" value="{{$client_data -> company}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="slider_image_preview_section">
                            <img class="slider_image_preview" style="max-width:100%"src="{{url('storage/client',$client_data -> logo)}}" alt="">
                        </div>


                        <label for="photo" style="font-weight:bold">
                           Client image Upload

                           <br>
                           <i style="font-size:40px;color: green; cursor:pointer" class="fa-solid fa-image"></i>

                        </label>                       
                        <input class="slider_image" style="display:none" id="photo" name="photo" type="file" class="form-control">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div> --}}

            @endif
        </div>
    </div>
</div>
</div>

@endsection