@extends('partials.appUser')

@section('content')
<div class = "page-content ">
        <div class="section-full  ">
                
                        <div class="row">
                                <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}" >
                                <div class="section-head text-center ">
                                    <h2 class="h2 text-uppercase"> Tambah anggota</h2>
                                    <div class="dez-separator-outer "><div class="dez-separator bg-primary style-liner"></div></div>
                                </div>                        
                        </div>
                        <div class = "row m-2">
                                <div class = "card m-2 p-2">
                                        <div class = "card-body">
                                            <div class="row">
                                                <div class = "col-lg-9 col-md-9 col-12">
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Nama Lengkap</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Posisi</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">NIK</label>
                                                            <input class="form-control" type="number"/>
                                                        </div>
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Nomor jersey</label>
                                                            <input class="form-control" type="number"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Tanggal Lahir</label>
                                                            <input class="form-control" type="date"/>
                                                        </div>
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Nama Ayah</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Status Pemain</label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Open this select menu</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Nama Ibu</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Nomor handphone</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">Alamat</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-lg-row flex-md-row flex-column gap-2">
                                                        <div class="form-group w-100">
                                                            <label class="text-secondary">E-mail</label>
                                                            <input class="form-control" type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-2 col-md-9 col-12">
                                                    <div class="form-group">
                                                            <label class="text-secondary">Upload KK</label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="text-secondary">Upload Akte</label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="text-secondary">Upload Ijazah</label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="text-secondary">Upload Biodata Lapor</label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="text-secondary">Upload Surat Keterangan Orang Tua</label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="text-secondary">Photo </label>
                                                            <input class="form-control" type="file"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <a href="/myevent/monitoringAnggota"  class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                                                <button  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                </div>
                        </div>
        </div>
</div>
@endsection