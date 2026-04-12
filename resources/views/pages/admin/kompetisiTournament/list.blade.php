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
                        <li class="breadcrumb-item active" aria-current="page">Data Kompetisi</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        @if(!$statusVerifikasi)
                        <a href="/admin/kompetisi/form" class="btn btn-primary mb-3">Tambah Kompetisi</a>
                        @endif
                        <div class="row ">
                            <div class="table-responsive">
                                <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sekolah</th>
                                            <th>Nama Team</th>
                                            <th>Kompetisi</th>
                                            <th>Series</th>
                                            <th>Leader</th>
                                            <th>Kunci Data</th>
                                            <th>Verif Data</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listKompetisiEvents as $kompetisi)
                                        <tr>
                                            <td>{{ $kompetisi->id }}</td>
                                            <td>{{ $kompetisi->namaSekolah }}</td>
                                            <td>{{ $kompetisi->namaTeam }}</td>
                                            <td>{{ $kompetisi->kompetisiName }} | {{ $kompetisi->seasonName }}</td>
                                            <td>{{ $kompetisi->seriesName }}</td>
                                            <td>{{ $kompetisi->leader }}</td>
                                            <td>{{ $kompetisi->kunciData }}</td>
                                            <td>{{ $kompetisi->verifData }}</td>
                                            <td>
                                                @if(!$statusVerifikasi)
                                                <a href="/admin/kompetisi/team_list/edit/{{ $kompetisi->id }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="/admin/kompetisi/team_list/delete/{{ $kompetisi->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this team?')">Delete</a>
                                                @else
                                                <a href="/admin/kompetisi/team_verification/detail/{{ $kompetisi->id }}" class="btn btn-sm btn-info">Detail</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No teams found.</td>
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