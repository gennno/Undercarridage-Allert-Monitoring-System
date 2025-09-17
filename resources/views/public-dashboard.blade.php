@extends('public')
@section('title', 'Dashboard')
@push('styles')
  <style>
    body {
      background-color: #f5f7fa;
      font-family: Arial, sans-serif;
    }

    /* ===== Notification Section ===== */
    .notification-container {
      max-height: 300px;
      /* cukup untuk ± 4 card */
      overflow-y: auto;
      padding-right: 5px;
    }

    .notification-card {
      border-radius: 10px;
      padding: 12px 15px;
      margin-bottom: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.95rem;
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
      transition: 0.3s;
      font-size: 0.85rem;
    }

    .btn-proceed:hover {
      background-color: #218838;
    }

    .btn-close-custom {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #333;
      margin-left: 8px;
    }

    /* ===== Category Card ===== */
    .category-card {
      border: 1px solid #ddd;
      border-radius: 12px;
      background: #fff;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
      display: flex;
      align-items: center;
      padding: 15px;
      gap: 50px;
    }

    .category-card:hover {
      transform: translateY(-3px);
      box-shadow: 4px 4px 16px rgba(0, 0, 0, 0.1);
    }

    .category-card img {
      width: 70px;
      height: 70px;
      object-fit: contain;
    }

    .category-title {
      font-size: 1.35rem;
      /* lebih besar */
      font-weight: 700;
      /* lebih tebal */
      margin: 0;
      color: #1c2d41;
      /* lebih kontras */
    }

    .add-btn {
      border-radius: 8px;
      font-weight: 600;
    }

    /* ===== Responsive ===== */
    @media (max-width: 767.98px) {
      .notification-card {
        flex-direction: column;
        /* biar stack */
        align-items: flex-start;
        font-size: 0.85rem;
        /* kecilkan font sedikit */
        padding: 10px;
        /* lebih rapat */
        position: relative;
        /* supaya anak absolute bisa nempel */
      }

      .notification-card>div:first-child {
        margin-bottom: 8px;
        /* jarak antara teks & tombol */
        width: 100%;
        /* teks full width */
      }

      .btn-proceed {
        width: 100%;
        /* tombol hijau full width */
        padding: 6px;
        /* lebih compact */
        font-size: 0.8rem;
      }

      .btn-close-custom {
        position: absolute;
        top: 8px;
        right: 8px;
        margin: 0;
        /* hapus margin-top tadi */
        font-size: 18px;
      }

      .btn-proceed,
      .btn-close-custom {
        margin-top: 5px;
      }

      .category-card {
        flex-direction: row;
        /* tetap sejajar kanan */
        text-align: left;
      }

      .category-card img {
        margin-bottom: 0;
        /* hilangkan jarak bawah */
        margin-right: 35px;
        /* kasih jarak kanan */
      }

      .notification-card>div:first-child {
        margin-bottom: 8px;
        width: 100%;
        padding-right: 10px;
        /* kasih ruang untuk tombol X */
      }
    }
  </style>
@endpush

@section('content')
  <div class="container-fluid p-2">
    <!-- Notification Section -->
    <div class="card p-3 mb-3">
      <h5 class="fw-bold mb-3">Notifications</h5>
      <div class="notification-container">

        {{-- Warning Notifications --}}
        @foreach($warnings as $component)
          <div class="notification-card notification-warning flex-wrap">
            <div>
              ⚠️ Warning, {{ $component->part_name }} on {{ $component->unit->code_number }}
              has reached {{ $component->hm_current }}/{{ $component->hm_new }} HM
            </div>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn-proceed">Proceed</button>
              <button class="btn-close-custom">&times;</button>
            </div>
          </div>
        @endforeach

        {{-- Reminder Notifications --}}
        @foreach($reminders as $component)
          <div class="notification-card notification-reminder flex-wrap">
            <div>
              🔔 Reminder, {{ $component->part_name }} on {{ $component->unit->code_number }}
              has not been measured for more than 7 days
            </div>
          </div>
        @endforeach

      </div>
    </div>



    <!-- Category Section -->
    <div class="card p-3">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Categories</h5>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach($categories as $cat)
          <div class="col">
            <div class="category-card position-relative"
              onclick="window.location.href='{{ route('public-dashboard.category', $cat->category) }}'"
              style="cursor:pointer;">
              @php
                $imagePath = match (strtolower($cat->category)) {
                  'dozer' => asset('images/dozer.jpeg'),
                  'drilling' => asset('images/drilling.png'),
                  'pc' => asset('images/pc.png'),
                  default => asset('images/default.png'),
                };
              @endphp

              <img src="{{ $imagePath }}" alt="{{ $cat->category }}">
              <div>
                <h5 class="category-title">{{ $cat->category }}</h5>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
@endsection