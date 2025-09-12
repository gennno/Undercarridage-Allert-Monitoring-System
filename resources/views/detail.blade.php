@extends('layout')

@section('title', 'Unit Detail')

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
 <!-- Tombol Back -->
  <div class="mb-3">
    <a href="/unit" class="btn btn-secondary btn-sm">
      <i class="bi bi-arrow-left-circle"></i> Back
    </a>
  </div>
  <!-- Unit Info -->
  <div class="card-custom mb-4">
    <h4 class="fw-bold mb-3"><i class="bi bi-truck"></i> Unit Detail</h4>
    <div class="row">
      <div class="col-md-3 text-center">
        <img src="{{ asset('images/drilling.png') }}" class="img-fluid rounded shadow" style="max-height:150px; object-fit:cover;">
      </div>
      <div class="col-md-9">
        <table class="table table-borderless">
          <tr>
            <th>Code Number</th>
            <td>DR0011</td>
          </tr>
          <tr>
            <th>Category</th>
            <td>Drilling</td>
          </tr>
          <tr>
            <th>Status</th>
            <td><span class="badge bg-success">Aktif</span></td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <!-- Component Table -->
  <div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="fw-bold mb-0"><i class="bi bi-gear"></i> Component List</h5>
      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addComponentModal">
        <i class="bi bi-plus-circle"></i> Add Component
      </button>
    </div>

    <div class="table-responsive">
      <table id="componentTable" class="display table table-striped table-bordered" style="width:100%">
        <thead class="table-light">
          <tr>
            <th>Component</th>
            <th>Worn (%)</th>
            <th>HM</th>
            <th>Sisa Lifetime</th>
            <th>HM Penggantian</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Hydraulic Pump</td>
            <td>40%</td>
            <td>3,500</td>
            <td>2,100</td>
            <td>5,600</td>
            <td>
              <div class="d-flex gap-1 action-buttons">
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editComponentModal"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
          <tr>
            <td>Engine</td>
            <td>70%</td>
            <td>8,000</td>
            <td>1,000</td>
            <td>9,000</td>
            <td>
              <div class="d-flex gap-1 action-buttons">
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editComponentModal"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Add Component -->
<div class="modal fade" id="addComponentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Component</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Component Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Worn (%)</label>
            <input type="number" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">HM</label>
            <input type="number" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Sisa Lifetime</label>
            <input type="number" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">HM Penggantian</label>
            <input type="number" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Component -->
<div class="modal fade" id="editComponentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Component</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Component Name</label>
            <input type="text" class="form-control" value="Hydraulic Pump">
          </div>
          <div class="mb-3">
            <label class="form-label">Worn (%)</label>
            <input type="number" class="form-control" value="40">
          </div>
          <div class="mb-3">
            <label class="form-label">HM</label>
            <input type="number" class="form-control" value="3500">
          </div>
          <div class="mb-3">
            <label class="form-label">Sisa Lifetime</label>
            <input type="number" class="form-control" value="2100">
          </div>
          <div class="mb-3">
            <label class="form-label">HM Penggantian</label>
            <input type="number" class="form-control" value="5600">
          </div>
          <button type="submit" class="btn btn-warning">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $('#componentTable').DataTable({
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
