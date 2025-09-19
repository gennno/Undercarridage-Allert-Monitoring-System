@extends('layout')

@section('title', 'Unit List')
@push('styles')
  <style>
    body {
      background-color: #f5f7fa;
      font-family: Arial, sans-serif;
    }

    .category-card {
      border-radius: 15px;
      padding: 15px 20px;
      background: #fff;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .btn-custom {
      margin: 3px;
    }

    /* rapikan button action */
    .action-buttons .btn {
      border-radius: 6px;
      padding: 4px 8px;
    }

    .img-thumbnail {
      cursor: pointer;
      width: 60px;
      height: 40px;
      object-fit: cover;
    }
  </style>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
  <div class="container p-2">
    <!-- Card 1: Tombol -->
    <div class="category-card mb-3">
      <div>
        <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#addModal">
          <i class="bi bi-plus-circle"></i> Add
        </button>
      </div>
      <div>
        <button class="btn btn-success btn-custom">
          <i class="bi bi-file-earmark-excel"></i> Export
        </button>
      </div>
    </div>

    <!-- Card 2: DataTables -->
    <div class="card p-3 shadow-sm rounded">
      <h5 class="mb-3 fw-bold"><i class="bi bi-table"></i> Data Table</h5>
      <div class="table-responsive" style="overflow-x:auto;">
        <table id="example" class="display table table-striped table-bordered" style="width:100%">
          <thead class="table-light">
            <tr>
              <th>Foto</th>
              <th>Code Number</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
           <tbody>
            @foreach ($units as $unit)
              <tr>
                <td>
                  <img src="{{ $unit->photo ? asset('storage/photos/' . $unit->photo) : asset('images/default.png') }}"
                    class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#fotoModal"
                    data-img="{{ $unit->photo ? asset('storage/photos/' . $unit->photo) : asset('images/default.png') }}">
                </td>
                <td>{{ $unit->code_number }}</td>
                <td>{{ $unit->category }}</td>
                <td>
                  @if ($unit->status)
                    <span class="badge bg-success">Aktif</span>
                  @else
                    <span class="badge bg-secondary">Non-aktif</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex gap-1 action-buttons">
                    <a href="{{ route('units.show', $unit->id) }}" class="btn btn-info btn-sm">
                      <i class="bi bi-eye"></i>
                    </a>
                    <button class="btn btn-warning btn-sm btn-edit"
                            data-id="{{ $unit->id }}"
                            data-name="{{ $unit->name }}"
                            data-code="{{ $unit->code_number }}"
                            data-category="{{ $unit->category }}"
                            data-status="{{ $unit->status }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('units.destroy', $unit->id) }}" method="POST"
                      onsubmit="return confirm('Hapus unit ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
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

  <!-- Modal Foto -->
  <div class="modal fade" id="fotoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img id="modalImage" src="" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Add -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Unit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Add -->
        <form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="codeNumber" class="form-label">Code Number</label>
              <input type="text" class="form-control" id="codeNumber" name="code_number" required>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="active">Aktif</option>
                <option value="inactive">Non-aktif</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Upload Foto</label>
              <input type="file" class="form-control" id="foto" name="photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal Edit -->
  <!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Edit -->
        <form id="editUnitForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="edit-id">
          
          <div class="mb-3">
            <label for="edit-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit-name" name="name" required>
          </div>

          <div class="mb-3">
            <label for="edit-codeNumber" class="form-label">Code Number</label>
            <input type="text" class="form-control" id="edit-codeNumber" name="code_number" required>
          </div>

          <div class="mb-3">
            <label for="edit-category" class="form-label">Category</label>
            <input type="text" class="form-control" id="edit-category" name="category" required>
          </div>

          <div class="mb-3">
            <label for="edit-status" class="form-label">Status</label>
            <select class="form-control" id="edit-status" name="status">
              <option value="1">Aktif</option>
              <option value="0">Non-aktif</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="edit-foto" class="form-label">Upload Foto</label>
            <input type="file" class="form-control" id="edit-foto" name="photo" accept="image/*">
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
      $('#example').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthChange: true,
        pageLength: 5,
        scrollX: true
      });

      // Klik thumbnail → tampilkan di modal
      $('#fotoModal').on('show.bs.modal', function (event) {
        var img = $(event.relatedTarget);
        var src = img.data('img');
        $('#modalImage').attr('src', src);
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');

    editButtons.forEach(button => {
      button.addEventListener('click', function () {
        const id = this.dataset.id;
        const name = this.dataset.name;
        const code = this.dataset.code;
        const category = this.dataset.category;
        const status = this.dataset.status;

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-codeNumber').value = code;
        document.getElementById('edit-category').value = category;
        document.getElementById('edit-status').value = status;

        // Update form action
        const form = document.getElementById('editUnitForm');
        form.action = `/units/${id}`;
      });
    });
  });
  </script>
@endpush