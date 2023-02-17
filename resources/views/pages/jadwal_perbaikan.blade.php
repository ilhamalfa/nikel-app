@extends('layouts.main')

@section('main')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Kendaraan {{ $kendaraan->merk }}</h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addKendaraan">
    <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Jadwal Service</button>
</div>

<!-- Modal -->
<div class="modal fade" id="addKendaraan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('kendaraan/jadwal') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="hidden" class="form-control" name="kendaraan_id" value="{{ $kendaraan->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->kendaraan->merk }}</td>
                            <td>{{ $jadwal->status }}</td>
                            <td>                
                                @if ($jadwal->status == 'belum diservice')
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action</div>
                                            <a class="dropdown-item" href="{{ url('kendaraan/konfirm-service/'. $jadwal->id) }}">Telah Diservice</a>
                                        </div>
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
@endsection