@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Dashboard</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Analysis</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->

    <div class="row">
      <div class="col-xxl-8 d-flex align-items-stretch">
        <div class="card w-100 overflow-hidden rounded-4">
          <div class="card-body position-relative p-4">
            <div class="row">
              <div class="col-12 col-sm-7">
                <div class="d-flex align-items-center gap-3 mb-5">
                  <img src="{{asset('clientSide/images/user/user.png')}}" class="rounded-circle bg-grd-info p-1" width="60" height="60" alt="user">
                  <div class="">
                    <p class="mb-0 fw-semibold">Welcome back</p>
                    <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ $user->username }}</h4>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-5">
                <div class="welcome-back-img pt-4">
                  <img src="assets/images/gallery/welcome-back-3.png" height="180" alt="">
                </div>
              </div>
            </div><!--end row-->
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 col-xl-4 d-flex align-items-stretch">
        <div class="card w-100 rounded-4 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div>
                <p class="mb-1 text-muted fw-semibold">Kelengkapan Data Admin</p>
                <h3 class="fw-bold mb-0">{{ $percentage }}%</h3>
              </div>

              <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center"
                style="width: 58px; height: 58px;">
                <i class="bx bx-user-check fs-2"></i>
              </div>
            </div>

            <div class="progress mb-2" style="height: 10px;">
              <div
                class="progress-bar 
              {{ $percentage >= 80 ? 'bg-success' : ($percentage >= 50 ? 'bg-warning' : 'bg-danger') }}"
                role="progressbar"
                style="width: {{ $percentage }}%;"
                aria-valuenow="{{ $percentage }}"
                aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>

            <p class="text-muted small mb-3">
              {{ $completed }} dari {{ $totalFields }} data admin sudah lengkap.
            </p>

            @if($emptyFields->count() > 0)
            <p class="fw-semibold mb-2">Data belum lengkap:</p>

            <div class="d-flex flex-wrap gap-2">
              @foreach($emptyFields as $field)
              <span class="badge rounded-pill text-bg-light border text-dark">
                {{ $field }}
              </span>
              @endforeach
            </div>
            @else
            <div class="alert alert-success py-2 mb-0">
              <i class="bx bx-check-circle me-1"></i>
              Semua data admin sudah lengkap.
            </div>
            @endif
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-8 d-flex align-items-stretch">
        <div class="card w-100 rounded-4 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
              <div>
                <h5 class="fw-bold mb-1">Detail Data Admin</h5>
                <p class="text-muted mb-0">Informasi akun dan profil administrator.</p>
              </div>

              <span class="badge rounded-pill text-bg-primary px-3 py-2">
                {{ $user->role ?? 'Admin' }}
              </span>
            </div>

            <div class="row g-3">
              @foreach($profileItems as $item)
              <div class="col-12 col-md-6">
                <div class="border rounded-4 p-3 h-100 
                {{ $item['is_complete'] ? 'border-success-subtle bg-success bg-opacity-10' : 'border-warning-subtle bg-warning bg-opacity-10' }}">

                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">
                      {{ $item['label'] }}
                    </span>

                    @if($item['is_complete'])
                    <span class="badge rounded-pill text-bg-success">
                      Lengkap
                    </span>
                    @else
                    <span class="badge rounded-pill text-bg-warning">
                      Kosong
                    </span>
                    @endif
                  </div>

                  @if($item['field'] === 'status')
                  @php
                  $statusValue = strtolower((string) $item['value']);
                  @endphp

                  <span class="badge px-3 py-2 
                    {{ in_array($statusValue, ['aktif', 'active']) ? 'text-bg-success' : 'text-bg-secondary' }}">
                    {{ ucfirst($item['value']) }}
                  </span>

                  @elseif($item['field'] === 'role')
                  <span class="badge px-3 py-2 text-bg-primary">
                    {{ ucfirst($item['value']) }}
                  </span>

                  @else
                  <h6 class="fw-semibold mb-0 text-dark">
                    {{ $item['value'] }}
                  </h6>
                  @endif

                </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>



  </div>
</main>
<!--end main wrapper-->
@endsection