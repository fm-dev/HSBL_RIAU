@extends('partials.appAdmin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage Menus</div>
        </div>

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <h5 class="mb-4">Menu Induk (Parent)</h5>
                        <a href="{{ route('admin.manage_menus.create_parent') }}" class="btn btn-primary mb-3">Tambah Menu Induk</a>
                        <div class="table-responsive mb-5">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Label Menu</th>
                                        <th>Path</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($menuParents as $parent)
                                    <tr>
                                        <td>{{ $parent->id }}</td>
                                        <td>{{ $parent->labelMenu }}</td>
                                        <td>{{ $parent->path }}</td>
                                        <td>
                                            @php
                                                $role = $roles->find($parent->roleId);
                                            @endphp
                                            {{ $role ? $role->nama_role : '-' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.manage_menus.edit_parent', $parent->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form method="POST" action="{{ route('admin.manage_menus.delete_parent', $parent->id) }}" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus menu ini beserta semua child-nya?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Tidak ada menu induk</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <h5 class="mb-4">Menu Anak (Child)</h5>
                        <a href="{{ route('admin.manage_menus.create_child') }}" class="btn btn-primary mb-3">Tambah Menu Anak</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Label Menu</th>
                                        <th>Path</th>
                                        <th>Parent</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $childrenCount = 0;
                                        foreach($menuParents as $p) {
                                            $childrenCount += $p->children->count();
                                        }
                                    @endphp
                                    @if($childrenCount > 0)
                                        @foreach($menuParents as $parent)
                                            @foreach($parent->children as $child)
                                            <tr>
                                                <td>{{ $child->id }}</td>
                                                <td>{{ $child->labelMenu }}</td>
                                                <td>{{ $child->path }}</td>
                                                <td>{{ $parent->labelMenu }}</td>
                                                <td>
                                                    @php
                                                        $childRole = $roles->find($child->roleId);
                                                    @endphp
                                                    {{ $childRole ? $childRole->nama_role : '-' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.manage_menus.edit_child', $child->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form method="POST" action="{{ route('admin.manage_menus.delete_child', $child->id) }}" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Tidak ada menu anak</td>
                                    </tr>
                                    @endif
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
