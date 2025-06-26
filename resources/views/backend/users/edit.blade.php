{{-- resources/views/backend/users/edit.blade.php --}}
@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password <small class="text-muted">(Leave blank if not
                            changing)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="isAdmin" class="form-check-input" id="isAdmin" {{ $user->isAdmin ?
                    'checked' : '' }}>
                    <label class="form-check-label" for="isAdmin">Admin</label>
                </div>

                <button class="btn btn-success">Update</button>
                <a href="{{ route('backend.users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection