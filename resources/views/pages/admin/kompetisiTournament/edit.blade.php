@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Data Kompetisi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Kompetisi Data</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row ">
                            <form method="post" action="/admin/kompetisi/team_list/update/{{ $kompetisiEvent['id'] }}" >
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Team</label>
                                    <input type="text" class="form-control @error('namaTeam') is-invalid @enderror" id="name" name="namaTeam" value="{{ $kompetisiEvent['namaTeam'] }}" required>
                                    @error('namaTeam')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="name" class="form-label">Leader</label>
                                    <input type="text" class="form-control @error('leader') is-invalid @enderror" id="name" name="leader" value="{{ $kompetisiEvent['leader'] }}" required>
                                    @error('leader')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Sekolah</label>
                                    <select class="form-control" required name="idSekolah">
                                        <option value="">Pilih Sekolah</option>
                                        @foreach ($listSekolah as $item)
                                            <option value="{{ $item->id }}" {{ $kompetisiEvent['idSekolah'] == $item->id ? 'selected' : '' }}>
                                                {{ $item->namaSekolah }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="logo" class="form-label" >Kompetisi</label>
                                    <select class="form-control" required name="idKompetisi">
                                        <option value="">Pilih Kompetisi</option>
                                        @foreach ($listKompetisi as $item)
                                            <option value="{{ $item->id }}" {{ $kompetisiEvent['idKompetisi'] == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }} | {{ $item->seasonName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Series</label>
                                    <select class="form-control" required name="idSeries">
                                        <option value="">Pilih Series</option>]
                                        @foreach ($listSeries as $item)
                                            <option value="{{ $item->id }}" {{ $kompetisiEvent['idSeries'] == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Kunci Data</label>
                                    <select class="form-control" required name="kunciData">
                                        <option value="">Pilih Kunci Data</option>
                                        <option value="true" {{ $kompetisiEvent['kunciData'] == 'true' ? 'selected' : '' }}>Terkunci</option>
                                        <option value="false" {{ $kompetisiEvent['kunciData'] == 'false' ? 'selected' : '' }}>Tidak Terkunci</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Verif Data</label>
                                    <select class="form-control" required name="verifData">
                                        <option value="">Pilih Verif Data</option>
                                        <option value="true" {{ $kompetisiEvent['verifData'] == 'true' ? 'selected' : '' }}>Terverifikasi</option>
                                        <option value="false" {{ $kompetisiEvent['verifData'] == 'false' ? 'selected' : '' }}>Belum Terverifikasi</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>



    </div>
</main>
<!--end main wrapper-->

<!-- SweetAlert Script -->



@endsection