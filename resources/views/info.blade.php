@extends('layout')

@section('title', 'Dashboard Info')
@section('content')
<div class="container py-4">

    <!-- Back Button -->
    <div class="mb-4 d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h4 class="mb-0">Category: {{ $category }}</h4>
    </div>

    @foreach($units as $unit)
        <div class="card mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
            <div class="row g-0">

                <!-- Bagian kiri: gambar + kode unit -->
                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3 border-end">
                    <img src="{{ asset($unit->photo ?? 'images/default.png') }}" 
                         alt="{{ $unit->name }}" 
                         class="img-fluid" style="max-height:120px;">
                    <h5 class="mt-2"><b>{{ $unit->code_number }}</b></h5>
                </div>

                <!-- Bagian kanan: komponen + progress -->
                <div class="col-md-9 p-3" style="background-color: #eafcff;">
                    @foreach($unit->components as $component)
                        @php
                            $latestReport = $component->reports->first();
                            $percent = $latestReport->percent_worn ?? 0;
                            $hm = $latestReport->hm ?? $component->hm_current ?? 0;

                            // tentukan warna progress
                            $barClass = 'bg-success';
                            if ($percent >= 70) $barClass = 'bg-danger';
                            elseif ($percent >= 40) $barClass = 'bg-warning';
                        @endphp

                        <div class="row align-items-center mb-2">
                            <div class="col-3 fw-bold">{{ $component->part_name }}</div>
                            <div class="col-7">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar {{ $barClass }}" 
                                         style="width: {{ $percent }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 text-end fw-bold">{{ $hm }} hrs</div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endforeach

</div>
@endsection
