@extends('backend.layouts.app')

@section('main')

@php
$product = App\Models\Product::latest() -> get();
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Products</h4>
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>featured image</th>
                                <th>Size</th>
                                <th>colors</th>
                                <th>regular price</th>
                                <th>sell price</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product as $item)
                            <tr>
                                <td> {{$loop -> index +1}} </td>
                                <td> {{$item -> name}} </td>
                                <td>
                                    <ul style="padding:0;">
                                        @foreach (json_decode($item -> category) as $category)
                                        @if(!$category -> name == null)
                                        <li>{{$category -> name}}</li>
                                        @endif
                                        @endforeach

                                    </ul>
                                </td>
                                <td><img style="width:100px" src="{{url('storage/product_image/',$item -> feat_image)}}"
                                        alt="">
                                </td>
                                <td>
                                    <ul style="padding:0;">
                                        @foreach (json_decode($item -> size) as $size )
                                        @if(!$size == null)
                                        <li>{{$size}}</li>
                                        @endif

                                        @endforeach

                                    </ul>
                                </td>
                                <td>
                                    <ul style="padding:0;">

                                        @foreach (json_decode($item -> color) as $color )
                                        @if(!$color == null)
                                        <li>{{$color}}</li>
                                        @endif

                                        @endforeach

                                    </ul>
                                </td>

                                <td> {{$item -> r_price}} </td>
                                <td> {{$item -> s_price}} </td>
                                <td> {{$item -> created_at ->diffForHumans()}} </td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}
                                    <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom"
                                        title="edit" href="{{route('product.edit',$item -> id)}}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>


                                    <form action="{{route('product.destroy',$item -> id)}}" method="POST"
                                        class="d-inline delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-placement="bottom" title="delete" type="submit"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty


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
                <h4 class="card-title">Add New Product</h4>
                <a class="text-info btn btn-outline-info" href="">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:bold">Product Name</label>
                        <input name="name" value="{{old('name')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Short Description</label>
                        <input name="s_desc" value="{{old('s_desc')}}" type="text" class="form-control">
                    </div>
                    @php
                    $category = App\Models\CategoryProduct::get();
                    @endphp
                    <div class="form-group">
                        <label style="font-weight:600" for="category">Select Category</label>
                        <br>
                        <ul style="margin-left:-35px">
                            @foreach($category as $item)
                            <li style="list-style:none;">
                                <input type="checkbox" name="product_category[]" value="{{$item -> id}}"
                                    id="{{$item -> name}}"><label style="margin-left:5px" for="{{$item -> name}}">
                                    {{$item -> name}} </label>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="form-group">
                        <label style="font-weight:bold">Reguler Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" name="r_price" class="form-control" placeholder="Reguler Price"
                                aria-label="Username" value="{{old('r_price')}}"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Sale Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" name="sell_price" class="form-control" placeholder="Sale Price"
                                aria-label="Username" value="{{old('sell_price')}}"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold"> Description</label>
                        <textarea class="form-control" name="p_desc" id="editor" cols="30" rows="10"></textarea>
                    </div>
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

                    <div class="gallery_img_preview_section">

                    </div>
                    <div class="form-group">
                        <label for="gallery_img" style="font-weight:600"> Gallery Image
                            <br>
                            <i style="font-size:40px;color: rgb(35, 155, 35); cursor:pointer"
                                class="fa-solid fa-image"></i>
                        </label>
                        <input type="file" multiple hidden name="gallery_img[]" id="gallery_img">
                    </div>

                    <label style="font-weight:bold" for="">Add Size</label>
                    <div class="form-group size-block ">

                        <div class=" form-group add-size-block d-flex">
                            <input class="form-control" type="text" name="size[]" placeholder="size">

                        </div>

                        <img style="width:50px;" src="{{asset('backend/assets/img/size.jpg')}}" alt=""><input
                            id="add-size-button"
                            class="btn btn-outline-info"
                            type="button"
                            value=" Add New Size">
                    </div>


                    @php
                    $tags = App\Models\TagProduct::get();
                    @endphp
                    <div class="form-group">
                        <label style="font-weight:bold" for="">Tags</label>
                        <select class="form-control select_tag_box" name="tags[]" id="" multiple="multiple">
                            @foreach ($tags as $item)
                            <option value="{{$item -> id}}">{{$item -> name}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Add Color</label>
                        <div class="form-group">
                            <div class="form-group add-color-field d-flex">
                                <input id="color" name="color[]" class="form-control" type="text">
                            </div>
                            <input class="btn btn-info addd_color mt-2" type="button" value="Add new color">

                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Tags</h4>
                <a class="text-info btn btn-outline-info" href="{{route('product.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('product.update',$product_id -> id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tag Name</label>
                        <input name="name" value="{{$product_id -> name}}" type="text" class="form-control">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            @endif
        </div>
    </div>
</div>
</div>

@endsection