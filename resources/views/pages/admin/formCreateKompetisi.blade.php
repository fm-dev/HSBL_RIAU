@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Sesion</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Created Sesion Data</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row ">
                            <form method="post" action="/admin/kompetisi">
                                @csrf
                                <div class="mb-3">
                                    <label for="name_sesion" class="form-label">Name Komeptisi</label>
                                    <input type="text" class="form-control " id="name" name="name" value="{{ old('name_sesion') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="seasonId" class="form-label">Season</label>
                                    <select class="form-select" aria-label="Default select example" name="seasonId">
                                        @foreach ($season as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>



    </div>
</main>
<!--end main wrapper-->

<!-- SweetAlert Script -->



@endsection