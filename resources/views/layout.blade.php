<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IMAN</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  @stack('styles')

  <style>
    body {
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      min-width: 150px;
      max-width: 150px;
      background-color: #1c2d41;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 1030;
    }

    /* Offset untuk konten dan navbar */
    .content-wrapper {
      margin-left: 150px; /* sesuai lebar sidebar */
      width: calc(100% - 150px);
    }

    .logo-circle {
      object-fit: cover;
      max-width: 53px;
    }

    /* Nav link style */
    .nav-pills .nav-link.active {
      background-color: white !important;
      color: #1c2d41 !important;
      opacity: 1 !important;
    }

    .nav-link {
      color: #1c2d41;
      background-color: white;
      opacity: 0.5;
      border-radius: 10px;
      font-weight: 600;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 4px 2px; 
      margin: 3px 8px; 
      font-size: 15px; 
      transition: all 0.3s ease;
    }

    .nav-link i {
      font-size: 20px; 
      margin-bottom: 2px; 
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="border-end sidebar d-flex flex-column flex-shrink-0 vh-100">
    <div class="d-flex justify-content-center mt-3">
      <div class="logo-circle">
        <img src="{{ asset('images/logo1.jpg') }}" alt="IMAN" class="w-100 login-image">
      </div>
    </div>
    <ul class="nav nav-pills flex-column mt-3">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link active">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="/report" class="nav-link">
          <i class="bi bi-file-earmark-bar-graph"></i>
          <span>Reports</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link">
          <i class="bi bi-truck"></i>
          <span>Unit List</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link">
          <i class="bi bi-gear"></i>
          <span>Settings</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Content Area -->
  <div class="content-wrapper flex-grow-1">
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white border-bottom px-3">
      <span class="navbar-brand mb-0 h5 fw-bold">Dashboard</span>
      <a href="/login" class="btn btn-link text-danger fw-bold">
        Logout <i class="bi bi-box-arrow-right"></i>
      </a>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid p-2">
      @yield('content')
    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
    // fungsi untuk toggle active
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function () {
        document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
        this.classList.add('active');
      });
    });
    @stack('scripts')
  </script>
</body>
</html>
