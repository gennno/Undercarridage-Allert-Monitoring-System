<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IMAN</title>

  <link rel="icon" type="image/jpeg" href="{{ asset('images/plant.png') }}">
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
      transition: left 0.3s ease;
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

    /* Content wrapper (desktop) */
    .content-wrapper {
      margin-left: 150px;
      width: calc(100% - 150px);
    }

    /* Overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1049;
      display: none;
    }

    @media (max-width: 992px) {
      .sidebar {
        left: -150px;
      }

      .sidebar.show {
        left: 0;
        z-index: 1050;
      }

      .content-wrapper {
        margin-left: 0 !important;
        width: 100% !important;
      }

      nav.navbar {
        margin-left: 0 !important;
        width: 100% !important;
      }
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="border-end sidebar d-flex flex-column flex-shrink-0 vh-100">
    <div class="d-flex justify-content-center mt-3">
      <div class="logo-circle">
        <img src="{{ asset('images/logo1.png') }}" alt="IMAN" class="w-100 login-image">
      </div>
    </div>
    <ul class="nav nav-pills flex-column mt-3">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="/report" class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
          <i class="bi bi-file-earmark-bar-graph"></i>
          <span>Reports</span>
        </a>
      </li>
      <li>
        <a href="/unit" class="nav-link {{ request()->is('unit*') ? 'active' : '' }}">
          <i class="bi bi-truck"></i>
          <span>Unit List</span>
        </a>
      </li>
      <li>
        <a href="/user" class="nav-link">
          <i class="bi bi-gear"></i>
          <span>Settings</span>
        </a>
      </li>
    </ul>

  </div>

  <!-- Overlay for mobile -->
  <div class="overlay"></div>

  <!-- Content Area -->
  <div class="content-wrapper d-flex flex-column flex-grow-1">
    <!-- Navbar -->
    <nav
      class="navbar navbar-light bg-white border-bottom px-3 fixed-top shadow-sm d-flex justify-content-between align-items-center"
      style="margin-left:150px; width:calc(100% - 150px);">

      <!-- Toggle button for mobile & tablet -->
      <button class="btn btn-outline-secondary d-lg-none" id="toggleSidebar">
        <i class="bi bi-list"></i>
      </button>


      <span class="navbar-brand mb-0 h5 fw-bold">
        @yield('title', 'Dashboard')
      </span>
      <button class="btn btn-link text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="bi bi-box-arrow-right"></i> Logout
      </button>

    </nav>

    <!-- Page Content -->
    <div class="container-fluid p-2 mt-5 flex-grow-1 overflow-auto">
      @yield('content')
    </div>
  </div>
  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="logoutModalLabel">
            <i class="bi bi-exclamation-triangle"></i> Konfirmasi Logout
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          Apakah Anda yakin ingin keluar dari aplikasi?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Batal
          </button>

          <!-- Logout pakai POST -->
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger fw-bold">
              Ya, Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const toggleBtn = document.getElementById('toggleSidebar');
      const sidebar = document.querySelector('.sidebar');
      const overlay = document.querySelector('.overlay');

      if (toggleBtn && sidebar && overlay) {
        toggleBtn.addEventListener('click', function () {
          sidebar.classList.toggle('show');
          overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
        });

        overlay.addEventListener('click', function () {
          sidebar.classList.remove('show');
          overlay.style.display = 'none';
        });
      }

      // fungsi untuk toggle active link
      document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function () {
          document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
          this.classList.add('active');
        });
      });
    });
  </script>

  @stack('scripts')
</body>

</html>