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

  .notification-warning {
    background-color: #f8d7da;
    color: #721c24;
  }

  .notification-reminder {
    background-color: #fff3cd;
    color: #856404;
  }

  .btn-proceed {
    background-color: #28a745;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    padding: 5px 15px;
  }

  .btn-close-custom {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    color: #333;
  }

  .category-card {
    border: 2px solid #000;
    border-radius: 15px;
    text-align: center;
    padding: 20px;
    background: #fff;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
  }

  .category-card img {
    width: 100px;
    height: auto;
    margin-bottom: 10px;
  }

  .add-btn {
    margin-bottom: 15px;
  }
</style>
@endpush

@section('content')
<div class="container p-0">
  <div class="card p-3 mb-2">
  <!-- Notification Section -->
  <div class="mb-4">
    <h5><b>Notification</b></h5>

    <!-- Reminder Notification -->
    <div class="d-flex justify-content-between align-items-center notification-card notification-reminder">
      <div>
        <span>🔔 Reminder, DZ3007 Need Weekly Measurement</span>
      </div>
      <div>
        <button class="btn-proceed">Proceed</button>
        <button class="btn-close-custom">&times;</button>
      </div>
    </div>

    <!-- Warning Notification -->
    <div class="d-flex justify-content-between align-items-center notification-card notification-warning">
      <div>
        <span>⚠️ Warning, Sprocket on DZ3007 Need Replacement</span>
      </div>
      <div>
        <button class="btn-proceed">Proceed</button>
        <button class="btn-close-custom">&times;</button>
      </div>
    </div>

    <!-- Warning Notification -->
    <div class="d-flex justify-content-between align-items-center notification-card notification-warning">
      <div>
        <span>⚠️ Warning, Sprocket on DZ3007 Need Replacement</span>
      </div>
      <div>
        <button class="btn-proceed">Proceed</button>
        <button class="btn-close-custom">&times;</button>
      </div>
    </div>
  </div>
  </div>

  <!-- Category Section -->
   <div class="card p-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5></h5>
    <button class="btn btn-success add-btn">+ Add</button>
  </div>

  <!-- Tambahkan di <head> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<div class="row text-center">
  <!-- Card Dozer -->
  <div class="col-md-4 mb-3">
    <div class="category-card position-relative p-3 border rounded"
         onclick="window.location.href='/detail_kategori'"
         style="cursor:pointer;">
         
      <div class="dropdown position-absolute top-0 end-0 m-2" onclick="event.stopPropagation();">
        <a class="text-dark" role="button" data-bs-toggle="dropdown">
          <i class="bi bi-three-dots-vertical"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="">Detail</a></li>
          <li><a class="dropdown-item" href="">Edit</a></li>
          <li><a class="dropdown-item" href="#">Hapus</a></li>
        </ul>
      </div>

      <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" alt="Dozer" style="width:80px;">
      <h5><b>Dozer</b></h5>
    </div>
  </div>

  <!-- Card Drilling -->
  <div class="col-md-4 mb-3">
    <div class="category-card position-relative p-3 border rounded"
         onclick="window.location.href=''"
         style="cursor:pointer;">
         
      <div class="dropdown position-absolute top-0 end-0 m-2" onclick="event.stopPropagation();">
        <a class="text-dark" role="button" data-bs-toggle="dropdown">
          <i class="bi bi-three-dots-vertical"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="">Detail</a></li>
          <li><a class="dropdown-item" href="">Edit</a></li>
          <li><a class="dropdown-item" href="#">Hapus</a></li>
        </ul>
      </div>

      <img src="https://cdn-icons-png.flaticon.com/512/2772/2772144.png" alt="Drilling" style="width:80px;">
      <h5><b>Drilling</b></h5>
    </div>
  </div>

  <!-- Card PC -->
  <div class="col-md-4 mb-3">
    <div class="category-card position-relative p-3 border rounded"
         onclick="window.location.href=''"
         style="cursor:pointer;">
         
      <div class="dropdown position-absolute top-0 end-0 m-2" onclick="event.stopPropagation();">
        <a class="text-dark" role="button" data-bs-toggle="dropdown">
          <i class="bi bi-three-dots-vertical"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="">Detail</a></li>
          <li><a class="dropdown-item" href="">Edit</a></li>
          <li><a class="dropdown-item" href="#">Hapus</a></li>
        </ul>
      </div>

      <img src="https://cdn-icons-png.flaticon.com/512/1995/1995526.png" alt="PC" style="width:80px;">
      <h5><b>PC</b></h5>
    </div>
  </div>
</div>

</div>
</div>
@endsection
