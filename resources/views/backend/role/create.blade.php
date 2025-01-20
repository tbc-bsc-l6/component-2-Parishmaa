@extends('backend.layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3 py-3">
        <h1 class="text-center mb-4">Assign a Role</h1>
        <form method="post" action="{{ route('role.store') }}" enctype="multipart/form-data">
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
        </form>
    </div>
@endsection
