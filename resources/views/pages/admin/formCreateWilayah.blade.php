@extends('partials.appAdmin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tambah Wilayah</div>
        </div>

        <div class="row">
            <div class="col-xxl-6 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <form method="post" action="{{ route('admin.manage_wilayah.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="namaWilayah" class="form-label">Nama Wilayah</label>
                                <input type="text" class="form-control @error('namaWilayah') is-invalid @enderror" id="namaWilayah" name="namaWilayah" value="{{ old('namaWilayah') }}" required>
                                @error('namaWilayah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.manage_wilayah') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
