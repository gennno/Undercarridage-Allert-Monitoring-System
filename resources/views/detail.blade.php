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
            <td>{{ $unit->code_number }}</td>
          </tr>
          <tr>
            <th>Category</th>
            <td>{{ $unit->category }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>
  @if ($unit->status)
    <span class="badge bg-success">Aktif</span>
  @else
    <span class="badge bg-secondary">Non-aktif</span>
  @endif
</td>
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
          @foreach ($unit->components as $component)
<tr>
  <td>{{ $component->part_name }}</td>
  <td>
    @php
      $worn = $component->hm_current - $component->hm_new;
      $lifetime = $component->nilai_standar - $component->nilai_limit;
      $worn_percent = $lifetime > 0 ? round(($worn / $lifetime) * 100) : 0;
    @endphp
    {{ $worn_percent }}%
  </td>
  <td>{{ number_format($component->hm_current) }}</td>
  <td>{{ number_format($component->nilai_limit) }}</td>
  <td>{{ number_format($component->hm_new + $component->nilai_limit) }}</td>
  <td>
    <div class="d-flex gap-1 action-buttons">
      <button class="btn btn-warning btn-sm btn-edit-component"
    data-id="{{ $component->id }}"
    data-unit_id="{{ $component->unit_id }}"
    data-part_number="{{ $component->part_number }}"
    data-part_name="{{ $component->part_name }}"
    data-hm_current="{{ $component->hm_current }}"
    data-hm_new="{{ $component->hm_new }}"
    data-nilai_standar="{{ $component->nilai_standar }}"
    data-nilai_limit="{{ $component->nilai_limit }}"
    data-status="{{ $component->status }}"
    data-bs-toggle="modal"
    data-bs-target="#editComponentModal">
    <i class="bi bi-pencil-square"></i>
</button>

      <form action="{{ route('component.destroy', $component->id) }}" method="POST" onsubmit="return confirm('Hapus unit ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="bi bi-trash"></i>
    </button>
</form>

  </td>
</tr>
@endforeach

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
       <form method="POST" action="{{ route('component.store') }}">
          @csrf
          <input type="hidden" name="unit_id" value="{{ $unit->id }}" class="form-control" required>
          <div class="mb-3">
            <label class="form-label">Part Number</label>
            <input type="text" name="part_number" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Part Name (%)</label>
            <input type="text" name="part_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nilai Standar</label>
            <input type="number" name="nilai_standar" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nilai Limit</label>
            <input type="number" name="nilai_limit" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">HM New</label>
            <input type="number" name="hm_new" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">HM Current</label>
            <input type="number" name="hm_current" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
              <option value="">-- Pilih Status --</option>
              <option value="aktif">Aktif</option>
              <option value="diganti">Diganti</option>
              <option value="rusak">Rusak</option>
            </select>
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
        <form id="editComponentForm" method="POST" enctype="multipart/form-data" action="">
    @csrf
    @method('PUT')
         <input type="hidden" name="component_id" id="edit-component_id" value="{{ $component->id }}">
          <input type="hidden" name="unit_id" id="edit-unit_id" value="{{ $component->unit_id }}">
          <div class="mb-3">
            <label class="form-label">Part Number</label>
            <input type="text" name="part_number" id="edit-part_number" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Part Name (%)</label>
            <input type="text" name="part_name" id="edit-part_name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Nilai Standar</label>
            <input type="number" name="nilai_standar" id="edit-nilai_standar" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Nilai Limit</label>
            <input type="number" name="nilai_limit" id="edit-nilai_limit" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">HM New</label>
            <input type="number" name="hm_new" id="edit-hm_new" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">HM Current</label>
            <input type="number" name="hm_current" id="edit-hm_current" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" id="edit-status" required>
              <option value="">-- Pilih Status --</option>
              <option value="aktif">Aktif</option>
              <option value="diganti">Diganti</option>
              <option value="rusak">Rusak</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const editButtons = document.querySelectorAll(".btn-edit-component");
    const form = document.getElementById("editComponentForm");

    editButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            document.getElementById("edit-component_id").value = this.dataset.id;
            document.getElementById("edit-unit_id").value = this.dataset.unit_id;
            document.getElementById("edit-part_number").value = this.dataset.part_number;
            document.getElementById("edit-part_name").value = this.dataset.part_name;
            document.getElementById("edit-nilai_standar").value = this.dataset.nilai_standar;
            document.getElementById("edit-nilai_limit").value = this.dataset.nilai_limit;
            document.getElementById("edit-hm_new").value = this.dataset.hm_new;
            document.getElementById("edit-hm_current").value = this.dataset.hm_current;
            document.getElementById("edit-status").value = this.dataset.status;

            // set form action sesuai id component
            form.action = "/component/" + this.dataset.id;
        });
    });
});
</script>
@endpush
