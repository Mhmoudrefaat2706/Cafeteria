@extends('admin.nav')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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

<div class="container">
    <h3>Add New User</h3>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control" required>
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
</div>


<div class="mb-3">
    <label>Room ID</label>
    <input type="text" name="room_id" class="form-control" value="{{ old('room_id', $user->room_id ?? '') }}">
</div>

<div class="mb-3">
    <label>Ext Number</label>
    <input type="text" name="ext_num" class="form-control" value="{{ old('ext_num', $user->ext_num ?? '') }}">
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($user->image))
        <img src="{{ asset('storage/' . $user->image) }}" width="60" class="mt-2">
    @endif

</div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
