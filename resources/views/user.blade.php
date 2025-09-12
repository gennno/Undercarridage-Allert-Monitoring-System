@extends('layout')

@section('title', 'User Management')

@push('styles')
<style>
  body {
    background-color: #f5f7fa;
    font-family: Arial, sans-serif;
  }

  .card-custom {
    border-radius: 15px;
    padding: 20px;
    background: #fff;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.08);
  }

  .action-buttons .btn {
    border-radius: 6px;
    padding: 4px 8px;
  }
</style>
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
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>johndoe@example.com</td>
            <td>Admin</td>
            <td><span class="badge bg-success">Active</span></td>
            <td>
              <div class="d-flex gap-1 action-buttons">
                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>User</td>
            <td><span class="badge bg-secondary">Inactive</span></td>
            <td>
              <div class="d-flex gap-1 action-buttons">
                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
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
        <form>
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control">
              <option>Admin</option>
              <option>User</option>
              <option>Manager</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-control">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Save User</button>
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
  });
</script>
@endpush
