@extends('dashboard.index')

@section('page_name')
    Admin Add Order For User
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
    }, 5000);
</script>

<div class="container mt-2">
    <h3>Add New User</h3>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Role --}}
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Room ID --}}
        <div class="mb-3">
            <label>Room ID</label>
            <input type="text" name="room_id" class="form-control" value="{{ old('room_id', $user->room_id ?? '') }}">
            @error('room_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Ext Number --}}
        <div class="mb-3">
            <label>Ext Number</label>
            <input type="text" name="ext_num" class="form-control" value="{{ old('ext_num', $user->ext_num ?? '') }}">
            @error('ext_num')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            @if (!empty($user->image))
                <img src="{{ asset('storage/' . $user->image) }}" width="60" class="mt-2">
            @endif
        </div>

        <button type="submit"class="Add btn-add-category">Create</button>
    </form>
</div>
@endsection

