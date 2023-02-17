@extends('layouts.main')

@section('main')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kendaraan</h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addKendaraan">
    <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Kendaraan Baru</button>
</div>

<!-- Modal -->
<div class="modal fade" id="addKendaraan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('kendaraan') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Inventaris</label>
                        <input type="text" class="form-control @error('nomor_inventaris') is-invalid @enderror" name="nomor_inventaris">
                        @error('nomor_inventaris')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk">
                        @error('merk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nopol</label>
                        <input type="text" class="form-control @error('nopol') is-invalid @enderror" name="nopol">
                        @error('nopol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select class="form-control @error('jenis_kendaraan') is-invalid @enderror" name="jenis_kendaraan">
                            <option value="Angkutan Orang">Angkutan Orang</option>
                            <option value="Angkutan Barang">Angkutan Barang</option>
                        </select>
                        @error('jenis_kendaraan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konsumsi BBM</label>
                        <input type="number" class="form-control @error('konsumsi_bbm') is-invalid @enderror" name="konsumsi_bbm">
                        @error('konsumsi_bbm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Kendaraan</button>
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
                            <th scope="col">Nomor Inventaris</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nopol</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Konsumsi BBM</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kendaraans as $kendaraan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kendaraan->nomor_inventaris }}</td>
                            <td>{{ $kendaraan->merk }}</td>
                            <td>{{ $kendaraan->nopol }}</td>
                            <td>{{ $kendaraan->jenis_kendaraan }}</td>
                            <td>{{ $kendaraan->konsumsi_bbm }} KM/Liter</td>
                            <td>{{ $kendaraan->status }}</td>
                            <td>                
                                <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Action</div>
                                        <a class="dropdown-item" href="{{ url('kendaraan/jadwal-service/'. $kendaraan->id) }}">Jadwal Perbaikan</a>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit{{ $kendaraan->id }}">Edit</button>
                                        <a class="dropdown-item" href="{{ url('kendaraan/delete/' .  $kendaraan->id) }}" onclick="return confirm('Konfirmasi?')">Delete</a>
                                    </div>
                                </div>

                                <!-- Modal Edit-->
                                <div class="modal fade" id="edit{{ $kendaraan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('kendaraan/'. $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nomor Inventaris</label>
                                                        <input type="text" class="form-control @error('nomor_inventaris') is-invalid @enderror" name="nomor_inventaris" value="{{ $kendaraan->nomor_inventaris }}">
                                                        @error('nomor_inventaris')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Merk</label>
                                                        <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ $kendaraan->merk }}">
                                                        @error('merk')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nopol</label>
                                                        <input type="text" class="form-control @error('nopol') is-invalid @enderror" name="nopol" value="{{ $kendaraan->nopol }}">
                                                        @error('nopol')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kendaraan</label>
                                                        <select class="form-control @error('jenis_kendaraan') is-invalid @enderror" name="jenis_kendaraan">
                                                            <option value="Angkutan Orang" @selected($kendaraan->jenis_kendaraan == "Angkutan Orang")>Angkutan Orang</option>
                                                            <option value="Angkutan Barang" @selected($kendaraan->jenis_kendaraan == "Angkutan Barang")>Angkutan Barang</option>
                                                        </select>
                                                        @error('jenis_kendaraan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Konsumsi BBM</label>
                                                        <input type="number" class="form-control @error('konsumsi_bbm') is-invalid @enderror" name="konsumsi_bbm" value="{{ $kendaraan->konsumsi_bbm }}">
                                                        @error('konsumsi_bbm')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah Kendaraan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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