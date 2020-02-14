@extends('layouts.admin')

@section('judul-card')
    <h4>Users</h4>
@endsection
@section('konten-admin')
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->role)
                        {{ $user->role->name }}
                        @else
                        No role defined
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
