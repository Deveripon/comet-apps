@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Tags</h4>
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
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $item)
                            <tr>                        
                                 <td>{{$loop -> index +1}}</td>
                                 <td>{{$item -> name}}</td>
                                 <td>{{$item -> slug}}</td>                 
                                 <td>{{$item -> created_at -> diffForHumans()}}</td>
                                 <td >
                                     {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}
                                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('tags.edit',$item -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>


                                     <form action="{{route('tags.destroy',$item -> id)}}" method="POST" class="d-inline delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="delete" type="submit"><i class="fa-solid fa-trash"></i>
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
                <h4 class="card-title">Add New Tag</h4>
                <a class="text-info btn btn-outline-info" href="">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('tags.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:bold">Tag Name</label>
                        <input name="name" value="{{old('name')}}" type="text" class="form-control">
                    </div> 
                                   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Tags</h4>
                <a class="text-info btn btn-outline-info" href="{{route('tags.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('tags.update',$tags_id -> id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tag Name</label>
                        <input name="name" value="{{$tags_id -> name}}" type="text" class="form-control">
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