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
                        <li class="breadcrumb-item active" aria-current="page">Create Kompetisi Data</li>
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
                            <form method="post" action="/admin/kompetisi/team_blacklist/store" >
                                @csrf
                                <div class="mb-3">
                                    <label>Start Date Blacklist</label>
                                    <input type="date" class="form-control" name="startDateBlackList" required>
                                </div>
                                <div class="mb-3">
                                    <label>End Date Blacklist</label>
                                    <input type="date" class="form-control" name="endStartDateBlackList" required>
                                </div>
                                <div class="mb-3">
                                    <label>Pilih Team</label>
                                    <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                        <tr>
                                            <th></th>
                                            <th>Nama Team</th>
                                            <th>Leader</th>
                                            <th>Sekolah</th>
                                            <th>Kompetisi</th>
                                            <th>Series</th>
                                        </tr>
                                        @foreach ($kompetisiEvent as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="kompetisiEventIds[]" value="{{ $item['kompetisiEventId'] }}">
                                            </td>
                                            <td>{{ $item['namaTeam'] }}</td>
                                            <td>{{ $item['leader'] }}</td>
                                            <td>{{ $item['namaSekolah'] }}</td>
                                            <td>{{ $item['kompetisiName'] }}</td>
                                            <td>{{ $item['seriesName'] }}</td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </div>

                                <button type="submit" class="btn btn-primary">Blacklist Team</button>
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