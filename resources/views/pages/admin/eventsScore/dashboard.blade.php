@extends('partials.appAdmin')
@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <div class="row">
            <!-- Form Pilih Event -->
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row">
                            <form action="/admin/eventsScore/form" method="get">
                                <div class="d-flex flex-xl-row gap-3 w-100">
                                    <div class="w-100">
                                        <label class="form-label">Event</label>
                                        <select class="form-select" name="id_events">
                                            @foreach($listEvents as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="gap-3 d-flex">
                                    <button type="submit" class="mt-2 btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table List Pertandingan -->
            <div class="col-xxl-12 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row">
                            <div class="d-flex gap-3 h4 mb-3">
                                <div class="bg-white p-1"></div>
                                List Pertandingan
                            </div>
                            <table id="dataadmin" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Status Pertandingan</th>
                                        <th>First Team</th>
                                        <th>Second Team</th>
                                        <th>Score</th>
                                        <th>Series</th>
                                        <th>Seasons</th>
                                        <th>Kompetisi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listEventsScore as $item)
                                    <tr>
                                        <td>
                                            @if($item->isFinal)
                                            <span class="badge bg-danger">Final 🔥</span>
                                            @else
                                            <span class="badge bg-success">Scheduled</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->first_team_name }}</td>
                                        <td>{{ $item->second_team_name }}</td>
                                        <td>
                                            {{ $item->score_first_teeam ?? 0 }} - {{ $item->score_second_teeam ?? 0 }}
                                        </td>
                                        <td>{{ $item->series_name ?? '-' }}</td>
                                        <td>{{ $item->season_name ?? '-' }}</td>
                                        <td>{{ $item->kompetisi_name ?? '-' }}</td>
                                        <td>
                                            <a href="{{ url('/admin/eventsScore/edit/'.$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ url('/admin/eventsScore/delete/'.$item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
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
</main>
<!--end main wrapper-->
@endsection