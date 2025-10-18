@extends('partials.appUser')

@section('content')
<div class = "page-content ">
        <div class="section-full  ">
                
                        <div class="row">
                                <img src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}" >
                                <div class="section-head text-center ">
                                    <h2 class="h2 text-uppercase"> My Event</h2>
                                    <div class="dez-separator-outer "><div class="dez-separator bg-primary style-liner"></div></div>
                                    <p>Halaman mengelola evnet.</p>
                                </div>                        
                        </div>
                        <div class = "row m-2">
                                <div class = "card m-2 p-2">
                                        <div class = "card-body">
                                                <button class= "btn btn-warning"><i class="fa fa-download"></i> Download Data</button>
                                                <div class = "d-flex flex-row gap-2 mt-2">
                                                        <select class="form-select" aria-label="Default select example">
                                                                <option selected>Turnamen</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                                <option selected>Lokasi</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                        </select>
                                                </div>
                                                <div class = "d-flex justify-content-center mt-5 ">
                                                        <div class = "p-4 w-100 " style = "background-image:url({{ asset('clientSide/images/main-slider/hsblassests/basketputra.png') }}); background-size: cover; background-position: center;height: 170px">
                                                                <div class = "h2 text-white">Basket Putra</div>
                                                                <a href="/myevent/monitoringAnggota" class = "btn btn-warning">Lihat Detail</a>
                                                        </div>
                                                        
                                                </div>
                                                <div class = "d-flex justify-content-center mt-2 ">
                                                        <div class = "p-4 w-100 " style = "background-image:url({{ asset('clientSide/images/main-slider/hsblassests/basketputri.png') }}); background-size: cover; background-position: center;height: 170px">
                                                                <div class = "h2 text-white">Basket Putri</div>
                                                                <a href="/myevent/monitoringAnggota" class = "btn btn-warning">Lihat Detail</a>
                                                        </div>
                                                        
                                                </div>
                                        </div>
                                </div>
                        </div>
        </div>
</div>
@endsection