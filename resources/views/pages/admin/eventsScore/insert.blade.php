@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Managed Data Position</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Position</li>
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
                            <form method="POST" action="/admin/eventsScore/create">
                                @csrf
                                <input type="hidden" name="kompetisi_id" value="{{ $id_events }}">
                                <div class="row">
                                    {{-- Team 1 --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="team_1" class="form-label">Team 1</label>
                                        <select
                                            class="form-select "
                                            id="team_1"
                                            name="team_1"
                                            required>
                                            <option disabled selected>Pilih Team </option>
                                            @foreach($dataTeam as $item)
                                            <option value="{{$item->id}}">{{$item->namaTeam}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    {{-- Team 2 --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="team_2" class="form-label">Team 2</label>
                                        <select
                                            class="form-select "
                                            id="team_2"
                                            name="team_2"
                                            required>
                                            <option disabled selected>Pilih Team </option>
                                            @foreach($dataTeam as $item)
                                            <option value="{{$item->id}}">{{$item->namaTeam}}</option>
                                            @endforeach
                                        </select>


                                    </div>

                                    {{-- Season --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="season" class="form-label">Season</label>
                                        <input class="form-control" value="{{$dataSession->name}}" disabled />



                                    </div>

                                    {{-- Kompetisi --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="competition" class="form-label">Kompetisi</label>
                                        <input class="form-control" value="{{$datakompetisi->name}}" disabled />


                                    </div>

                                    {{-- Series --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="series" class="form-label">Series</label>
                                        <input class="form-control" value="{{$dataseries->name}}" disabled />


                                    </div>

                                    {{-- Jam Pertandingan --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="jam_pertandingan" class="form-label">Jam Pertandingan</label>
                                        <input
                                            type="time"
                                            class="form-control "
                                            id="jam_pertandingan"
                                            name="jam_pertandingan"
                                            value="{{ old('jam_pertandingan') }}"
                                            required>


                                    </div>

                                    {{-- Tanggal Pertandingan --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_pertandingan" class="form-label">Tanggal Pertandingan</label>
                                        <input
                                            type="date"
                                            class="form-control "
                                            id="tanggal_pertandingan"
                                            name="tanggal_pertandingan"
                                            value="{{ old('tanggal_pertandingan') }}"
                                            required>


                                    </div>

                                    {{-- Score Team 1 --}}
                                    <div class="col-md-3 mb-3">
                                        <label for="score_team_1" class="form-label">Score Team 1</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="score_team_1"
                                            name="score_team_1"
                                            value="{{ old('score_team_1', 0) }}"
                                            min="0"
                                            required>


                                    </div>

                                    {{-- Score Team 2 --}}
                                    <div class="col-md-3 mb-3">
                                        <label for="score_team_2" class="form-label">Score Team 2</label>
                                        <input
                                            type="number"
                                            class="form-control "
                                            id="score_team_2"
                                            name="score_team_2"
                                            value="{{ old('score_team_2', 0) }}"
                                            min="0"
                                            required>


                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="isFinal" class="form-label">Final</label>

                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                id="isFinal"
                                                name="isFinal"
                                                value="1"
                                                {{ old('isFinal') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="isFinal">
                                                Ya, pertandingan final
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary px-5">
                                        Tambah Pertandingan
                                    </button>
                                </div>
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