<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - IMAN</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #3c4a59;
    }
    .login-container {
      min-height: 100vh;
    }
    .login-image {
      object-fit: cover;
      height: 100vh;
      border-radius: 0 20px 20px 0;
    }
    .form-box {
      max-width: 380px;
      width: 100%;
    }
    .btn-login {
      background-color: #e29535;
      color: #fff;
      font-weight: 600;
    }
    .btn-login:hover {
      background-color: #cf8226;
    }
  </style>
</head>
<body>
<div class="container-fluid login-container">
  <div class="row">
    <!-- Kiri: Gambar -->
    <div class="col-md-6 d-none d-md-block p-0">
      <img src="{{ asset('images/logo1.jpg') }}" alt="IMAN" class="w-100 login-image">
    </div>

    <!-- Kanan: Form -->
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-dark text-white">
      <div class="form-box text-center px-4">
        <!-- Logo -->
        <div class="mb-4">
          <img src="{{ asset('images/plant.png') }}" alt="Logo" class="mb-3" width="100">
          <h4 class="fw-bold">Login IMAN</h4>
        </div>

        <!-- Form -->
        <form method="POST" action="">
          @csrf
          <div class="mb-3 text-start">
            <label for="email" class="form-label">Username/Email</label>
            <input type="text" class="form-control rounded-3" id="email" name="email" required>
          </div>

          <div class="mb-3 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control rounded-3" id="password" name="password" required>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-login rounded-3">Login</button>
          </div>
        </form>

        <!-- Tambahan opsi -->
        <div class="mt-3">
          <small><a href="#" class="text-decoration-none text-light">Lupa Password?</a></small>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
