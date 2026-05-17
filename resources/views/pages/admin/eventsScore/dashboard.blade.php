@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <div class="row">
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row ">
                            <form action="/admin/eventsScore/form" method="get">
                                <div class="d-flex flex-xl-row gap-3 w-100">
                                    <div class="w-100">
                                        <labe class="form-label">Event</labe>
                                        <select class="form-select" aria-label="Default select example" name="id_events">
                                            @foreach($listEvents as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="gap-3 d-flex">
                                    <button type="submit" class="mt-2 btn btn-primary">Tambah</button>
                                    <!-- <button class="mt-2 btn btn-primary">Cari</button> -->
                                </div>
                            </form>
                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row ">
                            <div class="d-flex gap-3 h4">
                                <div class="bg-white p-1"></div>
                                List Pertandingan
                            </div>
                            <div class="p-3">
                                @foreach($listEventsScore as $item)
                                {{-- Judul Kompetisi --}}
                                <div class="p-3 bg-black w-100 text-white fw-bold">
                                    {{ $item->kompetisi_name }}
                                </div>

                                {{-- Baris pertandingan --}}
                                <div class="d-flex align-items-center w-100 p-3 justify-content-center gap-3">
                                    @if($item->isFinal)
                                    <div>
                                        <span class="badge bg-danger">Final 🔥</span>
                                    </div>
                                    @endif

                                    <div>{{ $item->first_team_name }}</div>

                                    <div>
                                        <img width="50px" src="{{ asset('image/clubbasketball.png') }}" />
                                    </div>

                                    <div>
                                        {{ $item->score_first_teeam ?? 0 }} - {{ $item->score_second_teeam ?? 0 }}
                                    </div>

                                    <div>
                                        <img width="50px" src="{{ asset('image/clubbasketball.png') }}" />
                                    </div>

                                    <div>{{ $item->second_team_name }}</div>
                                </div>

                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--end main wrapper-->
@endsection