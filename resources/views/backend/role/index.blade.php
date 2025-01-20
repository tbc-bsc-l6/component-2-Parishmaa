@extends('backend.layouts.app')

@section('content')
    <div class="col py-3">
        <h1 style="color:#ff6c84">Role</h1>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-6  py-3">
            {{-- <a href="{{ route('role.create') }}" class="btn btn-primary" style="color:pink">Assign a Role</a> --}}

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        {{-- {{ dd($user) }} --}}
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <select name="role_id" id="">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="role mb-3">User</label>
                <select name="user_id" id="user" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="role mb-3">Role</label>
                <select name="user_id" id="user" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Create Role</button>
            </div>
        </form> --}}
        </div>
    </div>
@endsection
