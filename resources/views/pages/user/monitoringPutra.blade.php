@extends('partials.appUser')

@section('content')
<div class="page-content ">
    <div class="section-full  ">

        <div class="row">
            <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}">
            <div class="section-head text-center ">
                <h2 class="h2 text-uppercase"> {{$listKompetisiEvents->namaTeam}}</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
            </div>
        </div>
        <div class="row m-2 w-100">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex flex-row gap-2 mt-2 ">
                        <div class="form-group w-100">
                            <label class="text-secondary">Nama Sekolah</label>
                            <input class="form-control" type="text" value="{{$listKompetisiEvents->namaSekolah}}" disabled />
                        </div>
                        <div class="form-group w-100">
                            <label class="text-secondary">Series</label>
                            <input class="form-control" type="text" value="{{$listKompetisiEvents->nameSeries}}" disabled />
                        </div>
                        <div class="form-group w-100">
                            <label class="text-secondary">Kompetisi</label>
                            <input class="form-control" type="text" value="{{$listKompetisiEvents->nameKompetisi}}" disabled />
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-warning"><i class="fa fa-upload"></i> Upload surat izin kepala sekolah </button>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <small class="text-secondary">*Berikut Adalah template regulasi, syarat pendaftaran, roster, template izin kepala sekolah, template izin orang tua .</small>
                        <div class="d-flex gap-2 mt-2">
                            <a href="{{ asset('storage/' . $listKompetisiEvents->path_template_regulasi) }}" class="btn btn-warning" target="_blank"><i class="fa fa-download"></i> Regulasi </a>
                            <a href="{{ asset('storage/' . $listKompetisiEvents->path_template_syarat_pendaftaran) }}" class="btn btn-warning" target="_blank"><i class="fa fa-download"></i> syarat pendaftaran</a>
                            <a href="{{ asset('storage/' . $listKompetisiEvents->path_template_roster) }}" class="btn btn-warning" target="_blank"><i class="fa fa-download"></i> roster </a>
                            <a href="{{ asset('storage/' . $listKompetisiEvents->path_template_izin_kepala_sekolah) }}" class="btn btn-warning" target="_blank"><i class="fa fa-download"></i> template izin kepala sekolah </a>
                            <a href="{{ asset('storage/' . $listKompetisiEvents->path_template_izinOrtu) }}" class="btn btn-warning" target="_blank"><i class="fa fa-download"></i> template izin orang tua </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2 w-100">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="/myevent/tambahanggota?idEvent={{ $listKompetisiEvents->idevent }}&idSekolah={{ $listKompetisiEvents->idSekolah }}" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Anggota</a>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @forelse($listPeserta as $item)
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="justify-content-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                        <img
                                            width="100"
                                            src="{{ $item->pathPhoto ? asset('storage/' . $item->pathPhoto) : asset('clientSide/images/user/user.png') }}"
                                            alt="User Image">

                                        <a class="text-dark">{{ $item->nama }}</a>
                                        <small class="text-secondary">{{ $item->namaPosisi }}</small>
                                    </div>

                                    <div class="d-flex gap-2 mt-2">
                                        <button class="btn btn-outline-info">
                                            <i class="fa fa-info"></i>
                                        </button>

                                        <a href="/events/peserta/edit/{{$item->idPeserta}}" class="btn btn-outline-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/events/peserta/delete/{{$item->idPeserta}}" class="btn btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="d-flex flex-column justify-content-center align-items-center p-5 w-100">
                            <div class=" text-center p-4" style="max-width: 300px; ">
                                <div class="mb-3">
                                    <i class="fa fa-user-slash fa-3x text-secondary"></i>
                                </div>
                                <h5 class="text-muted mb-2">Tidak ada Peserta</h5>
                                <p class="text-muted small">Belum ada data peserta yang tersedia saat ini.</p>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2 w-100">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="/official/form?idEvent={{ $listKompetisiEvents->idevent }}" class="btn btn-warning"><i class="fa fa-plus"></i> Tambah Official</a>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @if($listOfficial && $listOfficial->isNotEmpty())
                        @foreach($listOfficial as $item)
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="justify-content-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                        <img width="100" src="{{$item['path_image'] ? asset('storage/' . $item['path_image']) : asset('clientSide/images/official/unknownOfficial.jpg') }}" alt="User Image">
                                        <a class="text-dark">{{$item['official_name']}}</a>
                                    </div>
                                    <div class="d-flex gap-2 mt-2">
                                        <a href="/official/edit/{{$item['id']}}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                                        <a href="/official/delete/{{$item['id']}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="d-flex flex-column justify-content-center align-items-center p-5 w-100">
                            <div class=" text-center p-4" style="max-width: 300px; ">
                                <div class="mb-3">
                                    <i class="fa fa-user-slash fa-3x text-secondary"></i>
                                </div>
                                <h5 class="text-muted mb-2">Tidak ada official</h5>
                                <p class="text-muted small">Belum ada data official yang tersedia saat ini.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-2 w-100">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="/jersey/form/{{ $listKompetisiEvents->idevent }}" class="btn btn-warning"><i class="fa fa-edit"></i> Tambah Jersey</a>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @foreach($listJersey as $item)
                        <div class="card">
                            <div class="card-body p-2">
                                <div class=" justify-content-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                        <img width="100" src="{{$item['path_jersey'] ? asset('storage/' . $item['path_jersey']) : asset('clientSide/images/jersey/unknownjersey.png') }}" alt="User Image">
                                        <a class="text-dark ">{{$item['isHome'] ? "Home" : "Away"}}</a>
                                    </div>
                                    <div class="d-flex gap-2 mt-2">
                                        <a href="/jersey/delete/{{$item['id']}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection