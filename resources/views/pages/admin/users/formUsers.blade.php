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
                                    <label for="user" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="user" placeholder="Enter Password">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">No. Telepon</label>
                                    <input type="text" name="phone" class="form-control" id="user" placeholder="Enter No. Telepon">
                                </div>
                                <div class="col-12">
                                    <label for="user" class="form-label">Kompetisi</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama Kompetisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listKompetisiEvents as $item)
                                            <tr>
                                                <td><input type="checkbox" name="kompetisi_event_id[]" value="{{ $item->id }}"></td>
                                                <td>{{ $item->namaTeam }} | {{ $item->namaSekolah }} | {{ $item->kompetisiName }} | {{ $item->seasonName }} | {{ $item->seriesName }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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