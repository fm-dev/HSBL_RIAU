@extends('partials.appUser')

@section('content')
<div class="page-content ">
    <div class="section-full  ">

        <div class="row">
            <div class="w-100 position-relative">
                <img
                    width="100%"
                    src="{{ asset('clientSide/images/main-slider/hsblassests/bgcutimage.png') }}"
                    alt="My Event"
                    class="img-fluid">

            </div>

            <div class="section-head text-center ">
                <h2 class="h2 text-uppercase"> Profile</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
                <p>Halaman Profile.</p>
            </div>
            <div class="row m-2">
                <div class="card m-2 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <img width="100px" src="/image/user.png" />
                            <input class="form-control" type="file" />
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Name</label>
                            <div class="form-text">{{$dataUser['username']}}</div>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Email</label>
                            <div class="form-text">{{$dataUser['email']}}</div>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Status</label>
                            @if($dataUser['status'] == 'active')
                            <div>
                                <span class="badge bg-success">Active</span>
                            </div>
                            @else
                            <div>
                                <span class="badge bg-danger">No Active</span>
                            </div>
                            @endif
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Phone</label>
                            <div class="form-text">{{$dataUser['phone']}}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <div class="card m-2 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2  " style="border-left :10px solid #eccc12">
                            <h3 class="h3 text-uppercase ms-2"> List Team</h3>
                        </div>
                        <div class="table-responsive mt-3">
                            <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NamaTeam</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kompetisi Name</th>
                                        <th>Leader</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datKompetisi as $item)
                                    <tr>
                                        <td>{{$item['teamName']}}</td>
                                        <td>{{$item['namaSekolah']}}</td>
                                        <td>{{$item['kompetisiName']}}</td>
                                        <td>{{$item['leaderTeam']}}</td>
                                        <td>
                                            @if($item['verifData'] == "true")
                                            <div>
                                                <span class="badge bg-success">Verify</span>
                                            </div>
                                            @else
                                            <div>
                                                <span class="badge bg-danger">No Verify</span>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection