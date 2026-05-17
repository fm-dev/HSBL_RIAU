@extends('partials.appUser')

@section('content')
<div class="page-content ">
    <div class="section-full  ">

        <div class="row">
            <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}">
            <div class="section-head text-center ">
                <h2 class="h2 text-uppercase"> Tambah anggota</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="card m-2 p-2">
                <form action="/events/peserta/update/{{$peserta->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id_events" value="{{ old('id_events', $peserta->id_events) }}">
                    <input type="hidden" name="id_sekolah" value="{{ old('id_sekolah', $peserta->id_sekolah) }}">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12">
                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="namaLengkap" value="{{ old('namaLengkap', $peserta->namaLengkap) }}" />
                                    </div>

                                    <div class="form-group w-100">
                                        <div class="form-group w-100">
                                            <label class="text-secondary">Posisi Pemain</label>
                                            <select class="form-select" name="id_posisi" aria-label="Default select example">
                                                @foreach($posisi as $item)
                                                <option value="{{ $item->id }}" {{ old('id_posisi', $peserta->id_posisi) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->namaPosisi }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">NIK</label>
                                        <input class="form-control" type="number" name="NIK" value="{{ old('NIK', $peserta->NIK) }}" />
                                    </div>

                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nomor jersey</label>
                                        <input class="form-control" type="number" name="nomor_jersey" value="{{ old('nomor_jersey', $peserta->nomor_jersey) }}" />
                                    </div>
                                </div>

                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $peserta->tgl_lahir) }}" />
                                    </div>

                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nama Ayah</label>
                                        <input class="form-control" type="text" name="nama_ayah" value="{{ old('nama_ayah', $peserta->nama_ayah) }}" />
                                    </div>
                                </div>

                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Status Pemain</label>
                                        <select class="form-select" name="status" aria-label="Default select example">
                                            <option value="1" {{ old('status', $peserta->status) == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $peserta->status) == 0 ? 'selected' : '' }}>Not active</option>
                                        </select>
                                    </div>

                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nama Ibu</label>
                                        <input class="form-control" type="text" name="nama_ibu" value="{{ old('nama_ibu', $peserta->nama_ibu) }}" />
                                    </div>
                                </div>

                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">Nomor handphone</label>
                                        <input class="form-control" type="text" name="nomor_handphone" value="{{ old('nomor_handphone', $peserta->nomor_handphone) }}" />
                                    </div>

                                    <div class="form-group w-100">
                                        <label class="text-secondary">Alamat</label>
                                        <input class="form-control" type="text" name="alamat" value="{{ old('alamat', $peserta->alamat) }}" />
                                    </div>
                                </div>

                                <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                    <div class="form-group w-100">
                                        <label class="text-secondary">E-mail</label>
                                        <input class="form-control" type="text" name="email" value="{{ old('email', $peserta->email) }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-9 col-12">
                                <div class="form-group">
                                    <label class="text-secondary">Upload KK</label>
                                    <input class="form-control" type="file" name="path_kk" accept="application/pdf" />

                                    @if($peserta->path_kk)
                                    <small>
                                        <a href="{{ asset('storage/' . $peserta->path_kk) }}" target="_blank">
                                            Lihat KK saat ini
                                        </a>
                                    </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="text-secondary">Upload Akte</label>
                                    <input class="form-control" type="file" name="path_akte" accept="application/pdf" />

                                    @if($peserta->path_akte)
                                    <small>
                                        <a href="{{ asset('storage/' . $peserta->path_akte) }}" target="_blank">
                                            Lihat Akte saat ini
                                        </a>
                                    </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="text-secondary">Upload Ijazah</label>
                                    <input class="form-control" type="file" name="path_ijazah" accept="application/pdf" />

                                    @if($peserta->path_ijazah)
                                    <small>
                                        <a href="{{ asset('storage/' . $peserta->path_ijazah) }}" target="_blank">
                                            Lihat Ijazah saat ini
                                        </a>
                                    </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="text-secondary">Upload Biodata Lapor</label>
                                    <input class="form-control" type="file" name="path_biodata_lapor" accept="application/pdf" />

                                    @if($peserta->path_biodata_lapor)
                                    <small>
                                        <a href="{{ asset('storage/' . $peserta->path_biodata_lapor) }}" target="_blank">
                                            Lihat Biodata Lapor saat ini
                                        </a>
                                    </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="text-secondary">Upload Surat Keterangan Orang Tua</label>
                                    <input class="form-control" type="file" name="path_surat_keterangan_ortu" accept="application/pdf" />

                                    @if($peserta->path_surat_keterangan_ortu)
                                    <small>
                                        <a href="{{ asset('storage/' . $peserta->path_surat_keterangan_ortu) }}" target="_blank">
                                            Lihat Surat Keterangan Orang Tua saat ini
                                        </a>
                                    </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="text-secondary">Photo</label>

                                    @if($peserta->path_photo)
                                    <div class="mb-2">
                                        <img
                                            src="{{ asset('storage/' . $peserta->path_photo) }}"
                                            alt="Foto Peserta"
                                            width="100"
                                            style="object-fit: cover;">
                                    </div>
                                    @endif

                                    <input class="form-control" type="file" name="path_photo" accept="image/jpeg,image/png" />
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="/myevent/monitoringAnggota" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>

                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection