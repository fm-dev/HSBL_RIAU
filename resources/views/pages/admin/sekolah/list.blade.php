@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Data Sekolah</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Sekolah</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <a href="/admin/sekolah/form" class="btn btn-primary mb-3">Tambah Sekolah</a>
                        <div class="row ">
                            <div class="table-responsive">
                                <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Sekolah</th>
                                            <th>Logo Sekolah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listSekolah as $sekolah)
                                        <tr>
                                            <td>{{ $sekolah->id }}</td>
                                            <td>{{ $sekolah->namaSekolah }}</td>
                                            <td><img src="{{ asset('storage/'.$sekolah->logo) }}" alt="Logo Sekolah" width="100"></td>
                                            <td>

                                                <a href="/admin/sekolah/edit/{{ $sekolah->id }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="/admin/sekolah/delete/{{ $sekolah->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this school?')">Delete</a>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No schools found.</td>
                                        </tr>
                                        @endforelse
                                </table>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>
<!--end main wrapper-->
@endsection