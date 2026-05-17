@extends('partials.appUser')

@section('content')
<div class="page-content ">
    <div class="section-full  ">

        <div class="row">
            <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}">
            <div class="section-head text-center ">
                <h2 class="h2 text-uppercase"> Tambah Official</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="card m-2 p-2">
                <form action="/official/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="eventsId" value="{{ request()->get('idEvent') ?? '' }}">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12">
                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nama Official</label>
                                        <input class="form-control" type="text" name="official_name" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-9 col-12">
                                <div class="form-group">
                                    <label class="text-secondary">Upload gambar</label>
                                    <input class="form-control" type="file" name="path_image" accept="image/*" />
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="/myevent/monitoringAnggota?idevent={{request()->get('idEvent')}}" class="btn btn-danger">
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