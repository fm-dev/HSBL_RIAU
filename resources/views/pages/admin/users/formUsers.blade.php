@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Data Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Data</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->


        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <form method="post" action="/admin/masterUser/create">
                        @csrf
                        <div class="card-body position-relative p-4">
                            <div class="row ">
                                <div class="col-12">
                                    <label for="user" class="form-label">Name</label>
                                    <input type="text" name="username" class="form-control" id="user" placeholder="Enter Name">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="user" placeholder="Enter Email">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Nickname</label>
                                    <input type="text" name="nickname"   class="form-control" id="user" placeholder="Enter Nickname">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="user" placeholder="Enter Password">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Series</label>
                                    <select class="form-select" aria-label="Default select example" name="series_id">
                                        @foreach ($series as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Session</label>
                                    <select class="form-select" aria-label="Default select example" name="session_id">
                                        @foreach ($season as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Kompetisi</label>
                                    <select class="form-select" aria-label="Default select example" name="kompetisi_id">
                                        @foreach ($kompetisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Asal Sekolah</label>
                                    <input type="text" name="asal_sekolah" class="form-control" id="user" placeholder="Enter Asal Sekolah">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">No. Telepon</label>
                                    <input type="text" name="phone" class="form-control" id="user" placeholder="Enter No. Telepon">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Alamat Sekolah</label>
                                    <input type="text" name="alamat_sekolah" class="form-control" id="user" placeholder="Enter Alamat Sekolah">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 mb-3 ">Simpan</button>


                            </div><!--end row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</main>
<!--end main wrapper-->
@endsection