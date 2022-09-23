@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">All Categories</h4>
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
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($category as $item)
                            <tr>                        
                                <td>{{ $loop -> index +1}}</td>
                                <td>{{$item -> title}}</td>
                                <td>{{$item -> slug}}</td>
                                <td>{{$item -> created_at -> diffForHumans()}}</td>
                                <td >
                                    {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}

                                
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('port_category.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{route('port_category.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button data-toggle="tooltip" data-placement="bottom" title="delete" class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
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
                <form action="{{route('port_category.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Category Title</label>
                        <input name="title" type="text" class="form-control">
                    </div>                                     
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
                <a class="text-info btn btn-outline-info" href="{{route('port_category.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('port_category.update',$category_id -> id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Category Name</label>
                        <input name="title" value="{{$category_id -> title}}" type="text" class="form-control">
                    </div>                                     
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