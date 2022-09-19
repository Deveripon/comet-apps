@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">All Permissions</h4>
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
                      @forelse($permission_data as $permission)
                            <tr>                        
                                 <td>{{ $loop -> index +1}}</td>
                                 <td>{{$permission -> name}}</td>
                                 <td>{{$permission -> slug}}</td>
                                 <td>{{ $permission -> created_at -> diffForHumans()}}</td>
                                 <td >
                                     {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}

                                
                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('permission.edit',$permission -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                                     <form action="{{route('permission.destroy',$permission -> id)}}" method="POST" class="d-inline delete_form">
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
                <h4 class="card-title">Add New Permission</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('permission.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Permission Name</label>
                        <input name="name" type="text" class="form-control">
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
                <h4 class="card-title">Edit Permission</h4>
                <a class="text-info btn btn-outline-info" href="{{route('permission.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('permission.update',$permissions_data -> id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Permission Name</label>
                        <input name="name" value="{{$permissions_data -> name}}" type="text" class="form-control">
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