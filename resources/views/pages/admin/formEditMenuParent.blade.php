@extends('partials.appAdmin')
@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Menu Induk</div>
        </div>

        <div class="row">
            <div class="col-xxl-6 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <form method="post" action="{{ route('admin.manage_menus.update_parent', $menuParent->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="labelMenu" class="form-label">Label Menu</label>
                                <input type="text" class="form-control @error('labelMenu') is-invalid @enderror" id="labelMenu" name="labelMenu" value="{{ old('labelMenu', $menuParent->labelMenu) }}" required>
                                @error('labelMenu')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="path" class="form-label">Path</label>
                                <input type="text" class="form-control @error('path') is-invalid @enderror" id="path" name="path" value="{{ old('path', $menuParent->path) }}" required>
                                @error('path')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="roleId" class="form-label">Role</label>
                                <select class="form-select @error('roleId') is-invalid @enderror" id="roleId" name="roleId" required>
                                    <option value="">Pilih Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('roleId', $menuParent->roleId) == $role->id ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                                @error('roleId')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
