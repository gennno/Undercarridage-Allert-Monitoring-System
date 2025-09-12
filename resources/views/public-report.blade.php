@extends('public')

@section('title', 'Report') 
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
    box-shadow: 2px 2px 8px rgba(0,0,0,0.08);
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
        <button class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#measurementModal">
          <i class="bi bi-rulers"></i> Measurement
        </button>
        <button class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#replacementModal">
          <i class="bi bi-tools"></i> Replacement
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
              <th>Code Number</th>
              <th>Part Name</th>
              <th>Part Number</th>
              <th>HM</th>
              <th>Worn</th>
              <th>Sisa Lifetime</th>
              <th>HM Penggantian</th>
              <th>Foto</th>
              <th>Nama</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>DR0011</td>
              <td>Bearing</td>
              <td>BR-001</td>
              <td>8000</td>
              <td>50%</td>
              <td>4000</td>
              <td>1000</td>
              <td>
                <img src="{{ asset('images/drilling.png') }}" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#fotoModal" data-img="{{ asset('images/drilling.png') }}">
              </td>
              <td>Sigit</td>
              <td>
                <div class="d-flex gap-1 action-buttons">
                  <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                  <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </div>
              </td>
            </tr><tr>
              <td>DR0011</td>
              <td>Gear</td>
              <td>GR-001</td>
              <td>8000</td>
              <td>50%</td>
              <td>4000</td>
              <td>1000</td>
              <td>
                <img src="{{ asset('images/drilling.png') }}" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#fotoModal" data-img="{{ asset('images/drilling.png') }}">
              </td>
              <td>Sigit</td>
              <td>
                <div class="d-flex gap-1 action-buttons">
                  <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                  <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                </div>
              </td>
            </tr>
            <tr>
              <td>DR0025</td>
              <td>Bearing</td>
              <td>BR-001</td>
              <td>8000</td>
              <td>50%</td>
              <td>4000</td>
              <td>1000</td>
              <td>
                <img src="{{ asset('images/drilling.png') }}" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#fotoModal" data-img="{{ asset('images/drilling.png') }}">
              </td>
              <td>Fulan</td>
              <td>
                <div class="d-flex gap-1 action-buttons">
                  <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
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

<!-- Modal Measurement -->
<div class="modal fade" id="measurementModal" tabindex="-1" aria-labelledby="measurementLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="measurementLabel"><i class="bi bi-rulers"></i> Add Measurement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Code Number</label>
          <input type="text" class="form-control" name="code_number">
        </div>
        <div class="mb-3">
          <label class="form-label">HM</label>
          <input type="number" class="form-control" name="hm">
        </div>
        <div class="mb-3">
          <label class="form-label">Worn (%)</label>
          <input type="number" class="form-control" name="worn">
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Replacement -->
<div class="modal fade" id="replacementModal" tabindex="-1" aria-labelledby="replacementLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="replacementLabel"><i class="bi bi-tools"></i> Add Replacement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Code Number</label>
          <input type="text" class="form-control" name="code_number">
        </div>
        <div class="mb-3">
          <label class="form-label">HM Penggantian</label>
          <input type="number" class="form-control" name="hm_replacement">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save</button>
      </div>
    </form>
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
