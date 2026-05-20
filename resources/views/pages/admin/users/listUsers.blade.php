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
                <div class="card w-100 overflow-hidden rounded-4 p-3">
                    <div class="d-flex gap-2 col-12 ">
                        <div class="col-3">
                            <label for="user" class="form-label">Sesions</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach ($season as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="user" class="form-label">Kompetisi</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach ($kompetisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="user" class="form-label">Series</label>
                            <select class="form-select" aria-label="Default select example">
                                @foreach ($series as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary mt-3 mb-3 ">Cari</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <a href="/admin/masterUser/form" class="btn btn-primary mb-3">Tambah Users</a>
                        <div class="row ">
                            <div class="table-responsive">
                                <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Series</th>
                                            <th>Session</th>
                                            <th>Kompetisi</th>
                                            <th>Asal Sekolah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listUsers as $user)
                                        <tr>
                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email ?? '-' }}</td>
                                            <td>{{ $user->seriesName ?? '-' }}</td>
                                            <td>{{ $user->seasonName ?? '-' }}</td>
                                            <td>{{ $user->kompetisiName ?? '-' }}</td>
                                            <td>{{ $user->namaSekolah ?? '-' }}</td>
                                            <td class="gap-2">
                                                <button class="btn btn-sm btn-secondary" title="Detail">
                                                    Detail
                                                </button>
                                                <a href="/admin/masterUser/edit/{{ $user->user_id }}" class="btn btn-sm btn-primary" title="Edit">
                                                    Edit
                                                </a>
                                                <a href="/admin/masterUser/delete/{{ $user->user_id }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No users found.</td>
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