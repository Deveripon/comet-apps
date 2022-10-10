@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Posts</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Post Type</th>
                                <th>Post Media</th>
                                <th>Categories</th>
                                <th>Tag</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $item)
                            <tr>
                                <td>{{$loop -> index +1}}</td>
                                <td>{{$item -> title}}</td>
                                <td>{{$item -> slug}}</td>
                                <td>
                                    @php
                                    $featured = json_decode($item-> featured);
                                    echo $featured -> post_type;
                                    @endphp
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($item -> category as $cat )
                                        <li>{{$cat -> name}}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <ul>
                                        @foreach ($item -> tag as $tagss)
                                        @endforeach
                                        <li>{{$tagss -> name}}</li>
                                    </ul>
                                </td>

                                <td>{{$item -> created_at -> diffForHumans()}}</td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}
                                    <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom"
                                        title="edit" href="{{route('post.edit',$item -> id)}}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>


                                    <form action="{{route('post.destroy',$item -> id)}}" method="POST"
                                        class="d-inline delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-placement="bottom" title="delete" type="submit"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @empty
                            <tr>
                                <td colspan="6" class='text-danger text-center'>No records found.</td>
                            </tr>
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
                <h4 class="card-title">Create Post</h4>
                <a class="text-info btn btn-outline-info" href="">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label style="font-weight:bold">Title</label>
                        <input name="title" value="{{old('title')}}" type="text" class="form-control">
                    </div>

                    <!--Select Post Type-->
                    <label for="">Post Type</label>
                    <select class="form-control" name="post_type" id="post_type_selector">
                        <option value="standard">Standard</option>
                        <option value="gallery">Gallery</option>
                        <option value="audio">Audio</option>
                        <option value="video">Video</option>
                    </select>
                    <br>
                    <!--Select Post Type-->

                    {{-- For Standard Post Types --}}
                    {{-- ///////////////////////////////////////////////////////// --}}

                    <div class="standard_post" style="margin-top:-24px">
                        {{-- featured image preview section --}}
                        <div class="form-group">
                            <div class="featured_image_preview_section">
                                <img class="featured_image_preview" style="max-width:100%" src="" alt="">
                            </div>
                            {{-- featured image preview section --}}


                            {{-- Upload Featured Image --}}

                            <label for="featured_img" style="font-weight:600">
                                Featured image
                                <br>
                                <i style="font-size:40px;color: rgb(35, 155, 35); cursor:pointer"
                                    class="fa-solid fa-image"></i>
                            </label>
                            <input class="featured_image" style="display:none" id="featured_img" name="featured_img"
                                type="file" class="form-control">
                        </div>
                        {{-- Upload Featured Image --}}
                    </div>
                    {{-- For Standard Post Types --}}
                    {{-- ///////////////////////////////////////////////////////// --}}


                    {{-- for gallery post
                    ///////////////////////////////////////////////////////// --}}
                    <div class="gallery_post">
                        {{-- Gallery Image preview section --}}
                        <div class="gallery_img_preview_section">

                        </div>
                        {{-- Gallery Image preview section --}}


                        {{-- Upload Gallery Image --}}

                        <label for="gallery_img" style="font-weight:600">Upload Gallery
                            <br>
                            <i style="font-size:40px;color: rgb(35, 155, 35); cursor:pointer"
                                class="fa-solid fa-image"></i>
                        </label>
                        <input type="file" multiple hidden name="gallery_img[]" id="gallery_img">

                        {{-- Upload Gallery Image --}}
                    </div>
                    {{-- For Standard Post Types 
                     ///////////////////////////////////////////////////////// --}}

                    {{-- For Audio Post --}}
                    {{-- ///////////////////////////////////////////////////////// --}}
                    <div class="audio_post">
                        <div class="form-group">
                            <label for="">Audio Link</label>
                            <input class="form-control" type="text" name="audio" id="">
                        </div>
                    </div>
                    {{-- For Audio Post --}}
                    {{-- ///////////////////////////////////////////////////////// --}}

                    {{-- For video Post --}}
                    {{-- ///////////////////////////////////////////////////////// --}}
                    <div class="video_post">
                        <div class="form-group">
                            <label for="">video Link</label>
                            <input class="form-control" type="text" name="video" id="">
                        </div>
                    </div>
                    {{-- For video Post --}}
                    {{-- ///////////////////////////////////////////////////////// --}}

                    <br><br>
                    <div class="form-group">
                        <label style="font-weight:600">Content</label>
                        <textarea class="form-control" name="p_desc" id="editor" cols="30" rows="10"></textarea>
                    </div>

                    {{-- post Category Selector --}}
                    <br>
                    <label style="font-weight:600" for="category">Select Category</label>
                    <br>
                    <ul style="margin-left:-35px">
                        @foreach($post_category as $item)
                        <li style="list-style:none;">
                            <input type="checkbox" name="category_post[]" value="{{$item -> id}}"
                                id="{{$item -> id}}"><label style="margin-left:5px" for="{{$item -> id}}">
                                {{$item -> name}}</label>
                        </li>
                        @endforeach

                    </ul>
                    </select>
                    {{-- post Category Selector --}}

                    <!--Post tag selector -->
                    <label for="">Tags</label>
                    <select class="form-control select_tag_box" name="tags[]" id="" multiple="multiple">
                        @foreach ($tags as $item )
                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <!--Post tag selector -->

                    <br>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Post</button>
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