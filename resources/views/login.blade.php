<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - IMAN</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/plant.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #2c3e50, #34495e);
      color: #fff;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-card {
      background: #ffffff;
      color: #333;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      max-width: 900px;
      width: 100%;
    }

    .login-image {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }

    .form-box {
      padding: 40px 30px;
    }

    .btn-login {
      background-color: #e29535;
      color: #fff;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background-color: #cf8226;
      transform: translateY(-2px);
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
    }

    .form-label {
      font-weight: 600;
      font-size: 0.9rem;
    }

    .forgot-link a {
      color: #e29535;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .forgot-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 767.98px) {
      .login-card {
        flex-direction: column;
      }
      .form-box {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
<div class="login-container">
  <div class="login-card row g-0">
    <!-- Kiri: Gambar -->
    <div class="col-md-6 d-none d-md-block">
      <img src="{{ asset('images/logo1.png') }}" alt="IMAN" class="login-image">
    </div>

    <!-- Kanan: Form -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="form-box w-100">
        <!-- Logo -->
        <div class="text-center mb-4">
          <img src="{{ asset('images/plant.png') }}" alt="Logo" class="mb-3" width="80">
          <h4 class="fw-bold">Login IMAN</h4>
        </div>

        <!-- Form -->
        <form method="POST" action="">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Username / Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan username atau email" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
          </div>

          <div class="d-grid mb-3">
  <a href="/dashboard" class="btn btn-login">Login</a>
</div>


          <!-- Tambahan opsi -->
          <div class="forgot-link text-center">
            <a href="#">Lupa Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
