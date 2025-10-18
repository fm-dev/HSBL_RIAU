@extends('partials.appUser')

@section('content')
<div class = "page-content ">
        <div class="section-full  ">
                
                        <div class="row">
                                <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}" >
                                <div class="section-head text-center ">
                                    <h2 class="h2 text-uppercase"> Basket putra</h2>
                                    <div class="dez-separator-outer "><div class="dez-separator bg-primary style-liner"></div></div>
                                </div>                        
                        </div>
                        <div class = "row m-2 w-100">
                                <div class = "card p-2">
                                        <div class = "card-body">
                                                <div class = "d-flex flex-row gap-2 mt-2 ">
                                                    <div class="form-group w-100">
                                                        <label class="text-secondary">Nama Sekolah</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                                <option selected>Turnamen</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label class="text-secondary">Series</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                                <option selected>Turnamen</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label class="text-secondary">Kompetisi</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                                <option selected>Turnamen</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class = "d-flex gap-2">
                                                    <button class="btn btn-warning"><i class="fa fa-upload"></i> Upload surat izin kepala sekolah </button>
                                                    <button class="btn btn-success"><i class="fa fa-save"></i> Buat Tim </button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class = "row m-2 w-100">
                            <div class = "card p-2">
                                <div class = "card-body">
                                    <div class = "d-flex justify-content-end">
                                        <a href="/myevent/tambahanggota" class = "btn btn-warning"><i class="fa fa-plus"></i> Tambah Anggota</a>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/user/user.png') }}" alt="User Image">
                                                        <a class="text-dark ">Khairul Fikri</a>
                                                        <small class="text-secondary">Leader Team</small>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row m-2 w-100">
                            <div class = "card p-2">
                                <div class = "card-body">
                                    <div class = "d-flex justify-content-end">
                                        <button class = "btn btn-warning"><i class="fa fa-plus"></i> Tambah Official</button>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/official/unknownOfficial.jpg') }}" alt="User Image">
                                                        <a class="text-dark ">Indomaret</a>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/official/unknownOfficial.jpg') }}" alt="User Image">
                                                        <a class="text-dark ">Alfamart</a>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "row m-2 w-100">
                            <div class = "card p-2">
                                <div class = "card-body">
                                    <div class = "d-flex justify-content-end">
                                        <button class = "btn btn-warning"><i class="fa fa-edit"></i> Edit Jersey</button>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/jersey/unknownjersey.png') }}" alt="User Image">
                                                        <a class="text-dark ">Away</a>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <div class = " justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                        <img width="100" src="{{ asset('clientSide/images/jersey/unknownjersey.png') }}" alt="User Image">
                                                        <a class="text-dark ">Home</a>
                                                    </div>
                                                    <div class="d-flex gap-2 mt-2">
                                                        <button class ="btn btn-outline-info" ><i class="fa fa-info"></i></button>
                                                        <button class ="btn btn-outline-warning" ><i class="fa fa-edit"></i></button>
                                                        <button class ="btn btn-outline-danger" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
</div>
@endsection