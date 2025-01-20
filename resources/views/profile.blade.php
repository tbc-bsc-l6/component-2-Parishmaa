@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">My Profile</h1>
    
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <ul class="list-group mb-4">
                <li class="list-group-item active">Profile Settings</li>
                <li class="list-group-item"><a href="#update-email" class="text-decoration-none">Update Email</a></li>
                <li class="list-group-item"><a href="#update-password" class="text-decoration-none">Update Password</a></li>
                @if (Auth::user()->is_admin)
                <li class="list-group-item"><a href="#admin-section" class="text-decoration-none">Admin Section</a></li>
                @endif
                <li class="list-group-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Update Email -->
            <div id="update-email" class="card mb-4">
                <div class="card-header bg-primary text-white">Update Email</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Email</button>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div id="update-password" class="card mb-4">
                <div class="card-header bg-success text-white">Update Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-password') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </form>
                </div>
            </div>

            <!-- Admin Section -->
            @if (Auth::user()->is_admin)
            <div id="admin-section" class="card mb-4">
                <div class="card-header bg-danger text-white">Admin Section</div>
                <div class="card-body">
                    <p>Welcome to the admin panel. You can manage users, products, and orders here.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Go to Admin Dashboard</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection