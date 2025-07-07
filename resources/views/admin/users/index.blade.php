@extends('dashboard.index')

@section('page_name')
    All Users
@endsection

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
    }, 3000);
</script>

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper" style="width:100%;">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>User <b>Details</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <a href="{{ route('users.create') }}" class="btn Add btn-primary mb-2">
                            <i class="material-icons">&#xE147;</i>
                            <span>Add User</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Room</th>
                        <th>Ext</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td style="max-width: 200px; word-wrap: break-word; white-space: normal;">
                                {{ $user->email }}
                            </td>
                            <td>
                                <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->room_id }}</td>
                            <td>{{ $user->ext_num }}</td>
                            <td class="text-center">
                                <img src="{{ $user->image ? asset($user->image) : asset('images/no-photo.png') }}"
                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;"
                                    alt="User Image">
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="edit" title="Edit" data-toggle="tooltip">
                                    <i class="material-icons text-primary">&#xE254;</i>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="border: none; background: none;" title="Delete" class="delete">
                                        <i class="material-icons text-danger">&#xE872;</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
