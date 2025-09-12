@extends('layout')

@section('title', 'User Profile Setting')

@push('styles')
<style>
  body {
    background-color: #f5f7fa;
    font-family: Arial, sans-serif;
  }

  .profile-card {
    border-radius: 15px;
    padding: 25px;
    background: #fff;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.08);
    max-width: 700px;
    margin: auto;
  }

  .profile-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #ddd;
  }
</style>
@endpush

@section('content')
<div class="container p-4">
  <div class="profile-card">
    <h4 class="fw-bold mb-4"><i class="bi bi-person-circle"></i> Profile Settings</h4>

    <!-- Foto Profil -->
    <div class="text-center mb-4">
      <img src="{{ asset('images/default-profile.png') }}" alt="Profile" class="profile-img mb-2">
      <div>
        <button class="btn btn-sm btn-outline-primary">
          <i class="bi bi-upload"></i> Change Photo
        </button>
      </div>
    </div>

    <!-- Form Profile -->
    <form>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" value="John Doe">
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" value="johndoe">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="johndoe@example.com">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="••••••••">
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" placeholder="••••••••">
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-save"></i> Save Changes
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
