@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Data Postition</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Postition</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <a href="/admin/positions/form" class="btn btn-primary mb-3">Tambah Postition</a>
                        <div class="row ">
                            <div class="table-responsive">
                                <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Postition</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->namaPosisi}}</td>
                                            <td>
                                                <a href="/admin/positions/delete?id={{ $item->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this positions?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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