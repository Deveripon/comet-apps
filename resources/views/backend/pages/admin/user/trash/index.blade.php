@extends('backend.layouts.app')

@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">All Users</h4>
                <a class="btn btn-success" href="{{route('user.index')}}"><i class="fa-solid fa-eye"></i> See Published User</a>  
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
                           @if($user -> trash)

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
                                      <a class="btn btn-sm btn-success" href="{{route('user-trash-restore',$user -> id)}}"  data-toggle="tooltip" data-placement="bottom" title="restore"> <i class="fa-solid fa-window-restore"></i> Restore</a>
         
                                        <form class="d-inline" action="{{route('user.destroy',$user -> id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" data-placement="bottom" title="delete"><i class="fa-solid fa-trash"></i> Delete Permanently
                                            </button> 
                                        
                                        </form>                             
                                 </td>                        
                               

                             @endif

             @empty
                             <tr>
                                     <td colspan="6" class="text-danger text-center">No Record Found</td>
                                                       
                            </tr>
                      
           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection