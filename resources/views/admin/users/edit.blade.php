@extends('dashboard.index')

@section('page_name')
    Edit User
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
@endif

<script>
    setTimeout(function () {
        let alert = document.getElementById('success-alert');
        if(alert){
            alert.style.display = 'none';
        }
    }, 4000);
</script>

<div class="container">
    <div class="table-wrapper" style="width:100%;">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Edit <b>User</b></h2>
                </div>
            </div>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Room ID</label>
                <input type="text" name="room_id" class="form-control" value="{{ old('room_id', $user->room_id ?? '') }}">
                @error('room_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Ext Number</label>
                <input type="text" name="ext_num" class="form-control" value="{{ old('ext_num', $user->ext_num ?? '') }}">
                @error('ext_num')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if (!empty($user->image))
                    <div class="mt-2">
                        <img src="{{ asset($user->image) }}"
                            style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;"
                            alt="User Image">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary Add">Update User</button>
        </form>
    </div>
</div>

@endsection
