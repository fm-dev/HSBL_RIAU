@extends('partials.appAdmin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tambah Menu Anak</div>
        </div>

        <div class="row">
            <div class="col-xxl-6 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <form method="post" action="{{ route('admin.manage_menus.store_child') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="labelMenu" class="form-label">Label Menu</label>
                                <input type="text" class="form-control @error('labelMenu') is-invalid @enderror" id="labelMenu" name="labelMenu" value="{{ old('labelMenu') }}" required>
                                @error('labelMenu')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="path" class="form-label">Path</label>
                                <input type="text" class="form-control @error('path') is-invalid @enderror" id="path" name="path" value="{{ old('path') }}" required>
                                @error('path')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="parentId" class="form-label">Menu Induk</label>
                                <select class="form-select @error('parentId') is-invalid @enderror" id="parentId" name="parentId" required>
                                    <option value="">Pilih Menu Induk</option>
                                    @foreach($menuParents as $parent)
                                        <option value="{{ $parent->id }}" {{ old('parentId') == $parent->id ? 'selected' : '' }}>{{ $parent->labelMenu }}</option>
                                    @endforeach
                                </select>
                                @error('parentId')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="roleId" class="form-label">Role</label>
                                <select class="form-select @error('roleId') is-invalid @enderror" id="roleId" name="roleId" required>
                                    <option value="">Pilih Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('roleId') == $role->id ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                                @error('roleId')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.manage_menus') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
