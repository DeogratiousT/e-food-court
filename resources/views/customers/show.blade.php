@extends('layouts.app')

@section('content')

    <div class="pull-right">
        <a href="{{ route('users.index') }}"><i class="mdi mdi-arrow-left"></i>back</a>
    </div>

     <div class="row">
         <div class="col-lg-6">
            <div class="mr-5" style="float:right">
                @if ($user->blocked == 0)
                    <span class="badge badge-success badge-pill">Active</span><br>
                    <span>Click below to block</span> <br>
                    
                    <form action="{{ route('block-user',$user) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Block User</button>
                    </form>
                @else
                    <span class="badge badge-danger badge-pill">Blocked</span><br>
                    <span>Click below to unblock</span> <br>
                    
                    <form action="{{ route('unblock-user',$user) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Unblock User</button>
                    </form>
                @endif
            </div>
            <h3>{{ $user->name}} </h3>
            <p>{{ $user->email }}</p>
         </div>
         <div class="col-lg-6">
             <div class="card px-4 py-4">
                <h4>Roles</h4> 
                <div class="pull-right">
                    <a data-toggle="modal" data-target="#createRoleModal" class="btn btn-primary text-light"><i class="mdi mdi-plus-circle"></i> Add Role</a>

                    <!--Create Role Modal-->
                    <div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('users.roles.store',$user) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="role_id">Select Role</label>
                                        <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" id="role_id">
                                            <option value="1">administrator</option>
                                            <option value="3">publisher</option>
                                            <option value="2">writer</option>
                                            <option value="4">commentor</option>
                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('role_id') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Role</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="list-group">
                        @foreach ($user->roles as $role)
                            <div class="list-group-item list-group-item-action ">
                                <span>{{ $role->slug }}</span>
                                <a href="{{ route('users.roles.destroy',[$user,$role]) }}" class="action-icon"
                                onclick="event.preventDefault();document.getElementById('remove-role-form_{{ $role->id }}').submit();"  data-toggle="tooltip" data-placement="bottom" title="Delete Role"> <i class="mdi mdi-delete"></i></a>
                                <form id="remove-role-form_{{ $role->id }}" action="{{ route('users.roles.destroy',[$user,$role]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        @endforeach
                </div>
             </div>
         </div>
     </div>
     <div class="px-4">
        <h3>Posts</h3>
        @if(count($user->posts) > 0)
            <div class="list-group">
                @foreach ($user->posts as $post)
                    <a href="{{ route('posts.show',$post) }}" class="list-group-item list-group-item-action">{{ $post->title }}</a>
                @endforeach
            </div>
        @else
            <p>user has no posts</p>
        @endif   
     </div>
@endsection