@extends('layouts.admin')

@section('judul-card')
    <h4>Users</h4>
@endsection
@section('konten-admin')
    <table class="table table-hover">
    @if (Session::has('deleted_user'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>{{SESSION('deleted_user')}}
    </div>
    @elseif(Session::has('updated_user'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>{{SESSION('updated_user')}}
    </div>

    @elseif(Session::has('created_user'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>{{SESSION('created_user')}}
    </div>

    @endif

        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created at</th>
            <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>

                        @if($user->photos_id)
                            {{-- {{$user->photo->file}} --}}
                            <img height="50"src="{{$user->photo ? $user->photo->file : 'no user photo'}}" alt="">

                        @else
                        <img height="50" src="http://placehold.it/400x400" alt="">
                        @endif

                    </td>
                    <td><a href="{{ route('admin.users.edit', $user->id) }}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>

                    <td>
                        @if($user->role)
                        {{ $user->role->name }}
                        @else
                        No Role
                        @endif
                    </td>
                    <td>
                        {{$user->is_active == 1 ? 'Active' : 'Not Active'}}
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach

            @endif

        </tbody>
      </table>
@endsection
