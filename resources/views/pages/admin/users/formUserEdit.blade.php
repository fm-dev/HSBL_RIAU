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
                    <form method="post" action="/admin/masterUser/update/{{ $dataPeserta->id }}">
                        @csrf

                        <div class="card-body position-relative p-4">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="username" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        name="username"
                                        class="form-control"
                                        id="username"
                                        placeholder="Enter Name"
                                        value="{{ old('username', $dataPeserta->username) }}">
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="Enter Email"
                                        value="{{ old('email', $dataPeserta->email) }}">
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Kosongkan jika tidak ingin mengubah password">
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        id="phone"
                                        placeholder="Enter No. Telepon"
                                        value="{{ old('phone', $dataPeserta->phone) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Kompetisi</label>

                                    <div class="table-responsive">
                                        <table class="table table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th width="60">Pilih</th>
                                                    <th>Nama Kompetisi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listKompetisiEvents as $item)
                                                @php
                                                $oldSelected = old('kompetisi_event_id', $selectedKompetisiIds);
                                                @endphp

                                                <tr>
                                                    <td class="text-center">
                                                        <input
                                                            type="checkbox"
                                                            name="kompetisi_event_id[]"
                                                            value="{{ $item->id }}"
                                                            {{ in_array((string) $item->id, array_map('strval', $oldSelected)) ? 'checked' : '' }}>
                                                    </td>

                                                    <td>
                                                        {{ $item->namaTeam }} |
                                                        {{ $item->namaSekolah }} |
                                                        {{ $item->kompetisiName }} |
                                                        {{ $item->seasonName }} |
                                                        {{ $item->seriesName }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-3 mb-3">
                                        Update
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</main>
<!--end main wrapper-->
@endsection