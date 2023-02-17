@extends('layouts.main')

@section('main')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
</div>

<!-- Content Row -->
<div class="row">

    @if(auth()->user()->is_admin == false)
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Persetujuan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Laporan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Kendaraan</th>
                            <th scope="col">Pihak 1</th>
                            <th scope="col">Status 1</th>
                            <th scope="col">Pihak 2</th>
                            <th scope="col">Status 2</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->no_laporan }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->kendaraan->merk }} </td>
                            <td> {{ $data->user1->name }} </td>
                            <td>{{ $data->persetujuan_1 }}</td>
                            <td> {{ $data->user2->name }} </td>
                            <td>{{ $data->persetujuan_2 }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user()->is_admin == true)
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Laporan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Kendaraan</th>
                            <th scope="col">Pihak 1</th>
                            <th scope="col">Status 1</th>
                            <th scope="col">Pihak 2</th>
                            <th scope="col">Status 2</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->no_laporan }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->kendaraan->merk }} </td>
                            <td> {{ $data->user1->name }} </td>
                            <td>{{ $data->persetujuan_1 }}</td>
                            <td> {{ $data->user2->name }} </td>
                            <td>{{ $data->persetujuan_2 }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection