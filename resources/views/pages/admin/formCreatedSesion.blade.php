@extends('partials.appAdmin')

@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Sesion</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Created Sesion Data
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="/admin/session" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="name_sesion" class="form-label">Name Sesion</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="name_sesion" 
                                        name="name_sesion" 
                                        value="{{ old('name_sesion') }}" 
                                        placeholder="Masukkan nama sesion"
                                        required>
                                </div>

                                <div class="col-12">
                                    <label for="seriesId" class="form-label">Series</label>
                                    <select 
                                        name="seriesId" 
                                        id="seriesId" 
                                        class="form-select" 
                                        required>
                                        <option value="">-- Pilih Series --</option>

                                        @foreach($series as $item)
                                            <option 
                                                value="{{ $item->id }}"
                                                {{ old('seriesId') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="path_template_izinOrtu" class="form-label">
                                        Template Izin Orang Tua
                                    </label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="path_template_izinOrtu" 
                                        name="path_template_izinOrtu"
                                        accept=".pdf,.doc,.docx"
                                        required>
                                    <small class="text-muted">
                                        Format: PDF, DOC, atau DOCX
                                    </small>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="path_template_izin_kepala_sekolah" class="form-label">
                                        Template Izin Kepala Sekolah
                                    </label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="path_template_izin_kepala_sekolah" 
                                        name="path_template_izin_kepala_sekolah"
                                        accept=".pdf,.doc,.docx"
                                        required>
                                    <small class="text-muted">
                                        Format: PDF, DOC, atau DOCX
                                    </small>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="regulasi" class="form-label">Regulasi</label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="regulasi" 
                                        name="regulasi"
                                        accept="application/pdf,.pdf"
                                        required>
                                    <small class="text-muted">
                                        Format: PDF
                                    </small>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="syarat_pendaftaran" class="form-label">
                                        Syarat Pendaftaran
                                    </label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="syarat_pendaftaran" 
                                        name="syarat_pendaftaran"
                                        accept="application/pdf,.pdf"
                                        required>
                                    <small class="text-muted">
                                        Format: PDF
                                    </small>
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="roster" class="form-label">Roster</label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="roster" 
                                        name="roster"
                                        accept="application/pdf,.pdf"
                                        required>
                                    <small class="text-muted">
                                        Format: PDF
                                    </small>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Simpan
                                    </button>

                                    <a href="/admin/session" class="btn btn-secondary mt-3">
                                        Kembali
                                    </a>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<!--end main wrapper-->
@endsection