@extends('backend.layouts.app')

@section('content')
    <div class="col py-3">
        <h1 style="color:#ff6c84">Role Management</h1>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-8 py-3">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <form method="post" action="{{ route('role.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" 
                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('role.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove Role</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
s