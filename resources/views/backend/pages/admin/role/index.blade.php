@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Roles</h4>
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
                                <th>Permissions</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($role_data as $role)
                            <tr>                        
                                 <td>{{$loop -> index +1}}</td>
                                 <td>{{$role -> name}}</td>
                                 <td>{{$role -> slug}}</td>
                                 <td>
                                    <ul style="padding:0px; margin:0px">
                                        @forelse(json_decode($role-> permissions) as $permission)
                                        <li style="list-style-type:square;padding:0px; margin:0px">{{$permission}}</li>
                                        @empty
                                        <li>No Permission Assigned</li>
                                        @endforelse
                                    </ul>
                                 </td>
                                 <td>{{$role -> created_at -> diffForHumans()}}</td>
                                 <td >
                                     {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa-solid fa-eye"></i></a> --}}
                                      <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="edit" href="{{route('role.edit',$role -> id)}}"><i class="fa-solid fa-pen-to-square"></i></a>


                                     <form action="{{route('role.destroy',$role -> id)}}" method="POST" class="d-inline delete_form">
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
                <h4 class="card-title">Add New Role</h4>
                <a class="text-info btn btn-outline-info" href="">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('role.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label style="font-weight:bold">Role Name</label>
                        <input name="name" value="" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold">Permissions</label>
                        <ul style="margin:0px;padding:0px;">
                            @foreach(json_decode($permission_data) as $permission	)
                            <li style="list-style:none;margin:3px 0px;">
                                <input style="cursor:pointer" type="checkbox" name="permissions[]" id="{{$permission -> name}}" value="{{$permission -> name}}" >
                                <label style="cursor:pointer" for="{{$permission -> name}}">{{$permission -> name}}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>    
                                   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            @else
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Edit Role</h4>
                <a class="text-info btn btn-outline-info" href="{{route('role.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('role.update',$role_id -> id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Role Name</label>
                        <input name="name" value="{{$role_id -> name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Permissions</label>
                        <ul style="margin:0px;padding:0px">
                            @foreach(json_decode($permission_data) as $permission)
                            <li style="list-style:none;margin:3px 0px;">
                                
                                <input type="checkbox" name="permissions[]" id="{{$permission -> name}}" @if( in_array($permission -> name, json_decode($role_id -> permissions)))  checked @endif value="{{$permission -> name}}" >
                                <label for="{{$permission -> name}}">{{$permission -> name}}</label>
                          
                            </li>
                            @endforeach
                        </ul>
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