@extends('partials.appAdmin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage Wilayah</div>
        </div>

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <a href="{{ route('admin.manage_wilayah.create') }}" class="btn btn-primary mb-3">Tambah Wilayah</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Wilayah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($wilayahs as $wilayah)
                                    <tr>
                                        <td>{{ $wilayah->id }}</td>
                                        <td>{{ $wilayah->namaWilayah }}</td>
                                        <td>
                                            <a href="{{ route('admin.manage_wilayah.edit', $wilayah->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form method="POST" action="{{ route('admin.manage_wilayah.delete', $wilayah->id) }}" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus wilayah ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Tidak ada wilayah</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
