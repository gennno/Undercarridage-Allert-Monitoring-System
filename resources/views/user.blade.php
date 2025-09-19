@extends('layout')

@section('title', 'User Management')

@push('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
  <div class="container p-3">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold"><i class="bi bi-people"></i> User Management</h4>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="bi bi-plus-circle"></i> Add User
      </button>
    </div>

    <!-- Table -->
    <div class="card-custom">
      <div class="table-responsive">
        <table id="userTable" class="display table table-striped table-bordered" style="width:100%">
          <thead class="table-light">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                  <div class="d-flex gap-1 action-buttons">
                    <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                              <i class="bi bi-pencil-square"></i>
                            </a> -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"
                      data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                      data-role="{{ $user->role }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus user ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Add User -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Role</label>
              <select name="role" class="form-control" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required minlength="6"
                placeholder="Minimal 6 karakter" />
            </div>
            <button type="submit" class="btn btn-primary">Save User</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit User -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <!-- Form Update -->
          <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit-id">

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" id="edit-name" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" id="edit-email" class="form-control" required />
            </div>

            <div class="mb-3">
              <label class="form-label">Role</label>
              <select name="role" id="edit-role" class="form-control" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Password (opsional)</label>
              <input type="password" name="password" id="edit-password" class="form-control" minlength="6"
                placeholder="Minimal 6 karakter, biarkan kosong jika tidak ganti" />
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function () {
      $('#userTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthChange: true,
        pageLength: 5,
        scrollX: true
      });

      $('#editUserModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let name = button.data('name');
        let email = button.data('email');
        let role = button.data('role');

        $('#edit-id').val(id);
        $('#edit-name').val(name);
        $('#edit-email').val(email);
        $('#edit-role').val(role);

        $('#editUserForm').attr('action', '/users/' + id);
      });
    });
  </script>
@endpush