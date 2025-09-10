@extends('layout')

@push('styles')
<style>
  body {
    background-color: #f5f7fa;
    font-family: Arial, sans-serif;
  }

  .notification-card {
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 10px;
  }

  .category-card {
    border-radius: 15px;
    text-align: center;
    padding: 20px;
    background: #fff;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
    position: relative;
  }

  .category-card img {
    width: 80px;
    height: auto;
    margin-bottom: 10px;
  }

  .btn-custom {
    margin: 5px 3px;
  }

  .add-btn {
    margin-bottom: 15px;
  }
</style>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="container p-2">
    <div class="category-card mb-2">
      <!-- Tombol Measurement, Replacement, Export -->
      <div class="mt-1">
        <button class="btn btn-primary btn-custom">Measurement</button>
        <button class="btn btn-warning btn-custom">Replacement</button>
        <button class="btn btn-secondary btn-custom">Export</button>
      </div>
    </div>

  <!-- Card 2: DataTables -->
  <div class="card p-3">
    <h5 class="mb-3"><b>Data Table</b></h5>
    <table id="example" class="display table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Part No</th>
          <th>Description</th>
          <th>Qty</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>PN001</td>
          <td>Example Part 1</td>
          <td>10</td>
          <td>
            <button class="btn btn-sm btn-info">View</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>PN002</td>
          <td>Example Part 2</td>
          <td>5</td>
          <td>
            <button class="btn btn-sm btn-info">View</button>
          </td>
        </tr>
      </tbody>
    </table>
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
          pageLength: 5      
      });
  });
</script>
@endpush
