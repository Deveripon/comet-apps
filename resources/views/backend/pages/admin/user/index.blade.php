@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-9">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Users</h4>
                <a class="btn btn-danger" href="{{route('trash.page')}}"><i class="fa-solid fa-trash-can"></i> See Trash Can</a>  
            </div>
            @include('validate-main')
            <div class="card-body"> 
          
                <div class="table-responsive">
                    <table class="table mb-0 data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th style="overflow:auto">email</th>
                                <th>username</th>
                                <th>role</th>
                                <th>photo</th>                              
                                <th>Created at</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user_data as $user)

                            <tr>                             
                           @if(!$user -> trash)

                                <td>{{$loop -> index +1}}</td>
                                <td>{{$user -> name}}</td>
                                <td>{{$user -> email}}</td>
                                <td>{{$user -> username}}</td>
                                <td>{{$user ->user_role -> name}}</td>
                                <td>
                                   <img style="height:60px;width:60px;object-fit:cover" src="{{url('storage/admin_photo/'.$user -> photo)}}" alt=""> 
                                </td>                              
                                <td>{{$user -> created_at -> diffForHumans()}}</td>
                                <td>
                                    @if($user -> status)
                                    <h5 class='badge badge-success bg-success'>Active</h5>  
                                    @else
                                    <h5 class='badge badge-danger bg-danger'>Blocked</h5>  
                                    
                                    @endif
                                </td>
                                <td >

                              @if($user ->status)
                                    <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Block" href="{{route('user-status',$user -> id)}}"><i class="fa-solid fa-circle-check"></i></a>
                             @else
                                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="activate" href="{{route('user-status',$user -> id)}}"><i class="fa-solid fa-ban"></i></a>
                             @endif


                                      <a class="btn btn-sm btn-warning" href="{{route('user.edit',$user -> id)}}"  data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
         
                                        <a class="btn btn-sm btn-danger" href="{{route('user-trash',$user-> id)}}" data-toggle="tooltip" data-placement="bottom" title="Trash"><i class="fa-solid fa-circle-minus"></i>
                                        </a>                               
                                 </td>

                                @endif

                                @empty
                                     <tr>
                                        <td colspan="6" class="text-danger text-center">No Record Found</td>
                                    </tr>                             
                            </tr>
                      
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if($form_type == 'create_form')
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New User</h4>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label>User Email</label>
                        <input name="email" type="text" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label>User cell</label>
                        <input name="cell" type="text" class="form-control">
                    </div>   
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>User Role</label>
                            <select class="form-control" name="user_role" id="">
                                <option value="">Select</option>
                                @foreach($role_data as $role)
                                <option value="{{$role -> id}}">{{$role -> name}}</option>
                                @endforeach
                            </select>
                    </div>     
                                   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div>
    @else
    <div class="col-md-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit User Data</h4>
                <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
            </div>
            <div class="card-body">
                @include('validate')
                <form action="{{route('user.update',$user -> id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>User Name</label>
                        <input name="name" value="{{$edit_data -> name}}" type="text" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label>User Email</label>
                        <input name="email" value="{{$edit_data -> email}}" type="text" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label>User cell</label>
                        <input name="cell" value="{{$edit_data -> cell}}" type="text" class="form-control">
                    </div>   
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="{{$edit_data -> username}}" type="text" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>User Role</label>
                            <select class="form-control" name="user_role" id="">
                                <option value="">Select</option>
                                @foreach($role_data as $role)
                                <option @if($edit_data -> role_id == $role -> id)selected @endif value="{{$role -> id}}">{{$role -> name}}</option>
                                @endforeach
                            </select>
                    </div>     
                                   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </div>
                </form>
            </div>
        </div>
      
    </div>
    @endif
</div>

@endsection