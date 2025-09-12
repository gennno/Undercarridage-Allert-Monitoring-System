@extends('layout')

@section('title', 'Dashboard') 
@section('content')
    <div class="container py-4">

        <!-- Search bar with Back button -->
<div class="mb-4 d-flex align-items-center">
    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2">
        <i class="bi bi-arrow-left"></i> Back
    </a>

    <!-- Search Input -->
    <div class="input-group">
        <span class="input-group-text" id="search-icon">
            <i class="bi bi-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-icon">
    </div>
</div>

        <!-- Card Item -->
        <div class="card mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
            <div class="row g-0">

                <!-- Bagian kiri: gambar + kode unit -->
                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3 border-end">
                    <img src="{{ asset('images/drilling.png') }}" alt="Dozer" class="img-fluid"
                        style="max-height:120px;">
                    <h5 class="mt-2"><b>DR0011</b></h5>
                </div>

                <!-- Bagian kanan: komponen + progress -->
                <div class="col-md-9 p-3" style="background-color: #eafcff;">

                    <!-- Idler -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Idler</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-warning" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3143 hrs</div>
                    </div>

                    <!-- Sprocket -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Sprocket</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                <div class="progress-bar bg-warning" style="width: 35%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3687 hrs</div>
                    </div>

                    <!-- Carrier Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Carrier Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2232 hrs</div>
                    </div>

                    <!-- Track Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Track Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2030 hrs</div>
                    </div>

                    <!-- Track Link -->
                    <div class="row align-items-center">
                        <div class="col-3 fw-bold">Track Link</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 30%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2316 hrs</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
            <div class="row g-0">

                <!-- Bagian kiri: gambar + kode unit -->
                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3 border-end">
                    <img src="{{ asset('images/drilling.png') }}" alt="Dozer" class="img-fluid"
                        style="max-height:120px;">
                    <h5 class="mt-2"><b>DR0011</b></h5>
                </div>

                <!-- Bagian kanan: komponen + progress -->
                <div class="col-md-9 p-3" style="background-color: #eafcff;">

                    <!-- Idler -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Idler</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 50%"></div>
                                <div class="progress-bar bg-warning" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3143 hrs</div>
                    </div>

                    <!-- Sprocket -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Sprocket</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                <div class="progress-bar bg-warning" style="width: 35%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3687 hrs</div>
                    </div>

                    <!-- Carrier Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Carrier Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2232 hrs</div>
                    </div>

                    <!-- Track Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Track Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2030 hrs</div>
                    </div>

                    <!-- Track Link -->
                    <div class="row align-items-center">
                        <div class="col-3 fw-bold">Track Link</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 30%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2316 hrs</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
            <div class="row g-0">

                <!-- Bagian kiri: gambar + kode unit -->
                <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3 border-end">
                    <img src="{{ asset('images/drilling.png') }}" alt="Dozer" class="img-fluid"
                        style="max-height:120px;">
                    <h5 class="mt-2"><b>DR0011</b></h5>
                </div>

                <!-- Bagian kanan: komponen + progress -->
                <div class="col-md-9 p-3" style="background-color: #eafcff;">

                    <!-- Idler -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Idler</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 50%"></div>
                                <div class="progress-bar bg-warning" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3143 hrs</div>
                    </div>

                    <!-- Sprocket -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Sprocket</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                <div class="progress-bar bg-warning" style="width: 35%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">3687 hrs</div>
                    </div>

                    <!-- Carrier Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Carrier Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2232 hrs</div>
                    </div>

                    <!-- Track Roller -->
                    <div class="row align-items-center mb-2">
                        <div class="col-3 fw-bold">Track Roller</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2030 hrs</div>
                    </div>

                    <!-- Track Link -->
                    <div class="row align-items-center">
                        <div class="col-3 fw-bold">Track Link</div>
                        <div class="col-7">
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-danger" style="width: 25%"></div>
                                <div class="progress-bar bg-warning" style="width: 30%"></div>
                            </div>
                        </div>
                        <div class="col-2 text-end fw-bold">2316 hrs</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection