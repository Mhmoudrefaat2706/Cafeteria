{{-- @extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Admin Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 bg-dark text-white shadow-lg">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="display-6 fw-bold mb-2">
                                <i class="fas fa-tachometer-alt me-3"></i>لوحة الإدارة
                            </h1>
                            <p class="lead mb-0">إدارة المستخدمين والنظام</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                                <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                                    <i class="fas fa-crown me-2"></i>مدير النظام
                                </span>
                                <span class="badge bg-success fs-6 px-3 py-2">
                                    <i class="fas fa-clock me-2"></i>{{ now()->format('H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 border-0" style="border-left: 4px solid #4e73df !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                إجمالي المستخدمين
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 border-0" style="border-left: 4px solid #1cc88a !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                المستخدمين العاديين
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 border-0" style="border-left: 4px solid #f6c23e !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                المدراء
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adminCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 border-0" style="border-left: 4px solid #36b9cc !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                مستخدمين جدد هذا الشهر
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newUsersThisMonth }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Management -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>إدارة المستخدمين
                    </h5>
                    <div class="btn-group">
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus me-1"></i>إضافة مستخدم
                        </button>
                        <button class="btn btn-outline-light btn-sm" onclick="refreshUsers()">
                            <i class="fas fa-sync me-1"></i>تحديث
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filter -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="البحث عن مستخدم..." id="searchUser">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="roleFilter">
                                <option value="">جميع الأدوار</option>
                                <option value="admin">مدير</option>
                                <option value="user">مستخدم</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">جميع الحالات</option>
                                <option value="verified">مُؤكد</option>
                                <option value="unverified">غير مُؤكد</option>
                            </select>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الدور</th>
                                    <th>الغرفة</th>
                                    <th>الرقم الداخلي</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary text-white" style="width: 40px; height: 40px;">
                                            @if($user->provider_id && $user->provider)
                                                <i class="fab fa-{{ strtolower($user->provider) }}"></i>
                                            @else
                                                <i class="fas fa-user"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $user->name }}</div>
                                        @if($user->provider)
                                            <small class="text-muted">
                                                <i class="fab fa-{{ strtolower($user->provider) }} me-1"></i>
                                                {{ ucfirst($user->provider) }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-crown me-1"></i>مدير
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                <i class="fas fa-user me-1"></i>مستخدم
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $user->room_id ?? '-' }}</td>
                                    <td>{{ $user->ext_num ?? '-' }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check-circle me-1"></i>مُؤكد
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="fas fa-exclamation-triangle me-1"></i>غير مُؤكد
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" onclick="editUser({{ $user->id }})" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            @if($user->id !== Auth::id())
                                                <button class="btn btn-outline-danger" onclick="deleteUser({{ $user->id }})" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-plus me-2"></i>إضافة مستخدم جديد
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="addUserForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">الدور</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="user">مستخدم</option>
                            <option value="admin">مدير</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_id" class="form-label">رقم الغرفة</label>
                                <input type="number" class="form-control" id="room_id" name="room_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ext_num" class="form-label">الرقم الداخلي</label>
                                <input type="number" class="form-control" id="ext_num" name="ext_num">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.border-left-primary {
    border-left: 4px solid #4e73df !important;
}
.border-left-success {
    border-left: 4px solid #1cc88a !important;
}
.border-left-warning {
    border-left: 4px solid #f6c23e !important;
}
.border-left-info {
    border-left: 4px solid #36b9cc !important;
}

.table th {
    border-top: none;
    font-weight: 600;
}

.btn-group-sm .btn {
    padding: 0.25rem 0.5rem;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}
</style>

<script>
function editUser(userId) {
    // إضافة منطق تعديل المستخدم
    alert('تعديل المستخدم #' + userId);
}

function deleteUser(userId) {
    if(confirm('هل أنت متأكد من حذف هذا المستخدم؟')) {
        // إضافة منطق حذف المستخدم
        alert('حذف المستخدم #' + userId);
    }
}

function refreshUsers() {
    location.reload();
}

// Search functionality
document.getElementById('searchUser').addEventListener('keyup', function() {
    // إضافة منطق البحث
});

// Filter functionality
document.getElementById('roleFilter').addEventListener('change', function() {
    // إضافة منطق التصفية
});

document.getElementById('statusFilter').addEventListener('change', function() {
    // إضافة منطق التصفية
});
</script>
@endsection --}}
