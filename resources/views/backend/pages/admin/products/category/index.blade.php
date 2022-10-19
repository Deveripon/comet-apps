@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Product Categories</h4>
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
                                <th>Featured Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($product_category as $item)
                            <tr>
                                <td>{{$loop -> index +1}}</td>
                                <td>{{$item -> name}}</td>
                                <td>{{$item -> slug}}</td>
                                <td>
                                    <img style="height:100px;"
                                        src="{{url('storage/category_photo/',$item -> featured_Photo)}}" alt="">
                                </td>
                                <td>{{$item -> created_at -> diffForHumans()}}</td>
                                <td>
                                    {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}


                                    <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom"
                                        title="edit" href="{{route('product-category.edit',$item -> id)}}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{route('product-category.destroy',$item -> id)}}" method="POST"
                                        class="d-inline delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button data-toggle="tooltip" data-placement="bottom" title="delete"
                                            class="btn btn-sm btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                @empty
                            <tr>
                                <td colspan="5" class='text-danger text-center'>No records found.</td>
                            </tr>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @if($form_type == 'create_form')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Category</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('product-category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Title</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    {{-- featured image preview section --}}
                    <div class="form-group">
                        <div class="featured_image_preview_section">
                            <img class="featured_image_preview" style="max-width:100%;max-height:250px" src="" alt="">
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @else()
        <div class="card">
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Category</h4>
                <a class="text-info btn btn-outline-info" href="{{route('product-category.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('product-category.update',$category -> id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Category Name</label>
                        <input name="name" value="{{$category -> name}}" type="text" class="form-control">
                    </div>
                    {{-- featured image preview section --}}
                    <div class="form-group">


                        <div class="featured_image_preview_section">
                            <img class="featured_image_preview" style="max-width:100%;max-height:250px;"
                                src="{{url('storage/category_photo',$category -> featured_Photo)}}" alt="">
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
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection