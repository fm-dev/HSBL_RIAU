@extends('partials.appUser')

@section('content')
<div class="page-content ">
    <div class="section-full  ">

        <div class="row">
            <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}">
            <div class="section-head text-center ">
                <h2 class="h2 text-uppercase"> Tambah Jersey</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="card m-2 p-2">
                <form action="/admin/eventsScore/store" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="events_id" value="{{ $idEvents ?? '' }}">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12">
                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Jenis Jersey</label>
                                        <select name="isHome" class="form-control" required>
                                            <option value="">Pilih Jenis Jersey</option>
                                            <option value="1" {{ old('isHome') == '1' ? 'selected' : '' }}>Home</option>
                                            <option value="0" {{ old('isHome') == '0' ? 'selected' : '' }}>Away</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-9 col-12">
                                <div class="form-group">
                                    <label class="text-secondary">Upload gambar</label>
                                    <input
                                        class="form-control"
                                        type="file"
                                        name="path_jersey"
                                        accept="image/*"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <a href="/myevent/monitoringAnggota?idevent={{ request()->get('idEvent') }}" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>

                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection