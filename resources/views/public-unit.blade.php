@extends('public')

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
            <tr>
              <td>
                <img src="{{ asset('images/drilling.png') }}" class="img-thumbnail" data-bs-toggle="modal"
                  data-bs-target="#fotoModal" data-img="{{ asset('images/drilling.png') }}">
              </td>
              <td>DR0011</td>
              <td>Drilling</td>
              <td>Aktif</td>
              <td>
                <div class="d-flex gap-1 action-buttons">
                  <a href="{{ url('/public-detail') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <img src="{{ asset('images/drilling.png') }}" class="img-thumbnail" data-bs-toggle="modal"
                  data-bs-target="#fotoModal" data-img="{{ asset('images/drilling.png') }}">
              </td>
              <td>DR0025</td>
              <td>Drilling</td>
              <td>Aktif</td>
              <td>
                <div class="d-flex gap-1 action-buttons">
                  <a href="{{ url('/public-detail') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i>
                  </a>
                </div>
              </td>
            </tr>
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
          <form>
            <div class="mb-3">
              <label for="codeNumber" class="form-label">Code Number</label>
              <input type="text" class="form-control" id="codeNumber" required>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" id="category" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-control" id="status">
                <option value="Aktif">Aktif</option>
                <option value="Non-aktif">Non-aktif</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Upload Foto</label>
              <input type="file" class="form-control" id="foto">
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
  </script>
@endpush