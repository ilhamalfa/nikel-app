<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th colspan="15">Laporan Periodik Penggunaan Kendaraan Tambang Nikel</th>
        </tr>
        <thead>
            <tr>
                <th scope="col" style="width: 100px">#</th>
                <th scope="col" style="width: 100px">Tanggal Pembuatan Laporan</th>
                <th scope="col" style="width: 150px">Nomor Laporan</th>
                <th scope="col" style="width: 200px">Nama Driver</th>
                <th scope="col" style="width: 150px">NIK</th>
                <th scope="col" style="width: 150px">Kendaraan</th>
                <th scope="col" style="width: 150px">Nomor Inventaris</th>
                <th scope="col" style="width: 100px">Nopol</th>
                <th scope="col" style="width: 150px">Pihak Penyetuju 1</th>
                <th scope="col" style="width: 150px">Persetujuan 1</th>
                <th scope="col" style="width: 150px">Pihak Penyetuju 1</th>
                <th scope="col" style="width: 150px">Persetujuan 2</th>
                <th scope="col" style="width: 100px">Status</th>
                <th scope="col" style="width: 150px">Tanggal Peminjaman</th>
                <th scope="col" style="width: 150px">Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $laporan->created_at }}</td>
                <td>{{ $laporan->no_laporan }}</td>
                <td>{{ $laporan->nama }}</td>
                <td>{{ $laporan->nik }}</td>
                <td>{{ $laporan->kendaraan->merk }}</td>
                <td>{{ $laporan->kendaraan->nomor_inventaris }}</td>
                <td>{{ $laporan->kendaraan->nopol }}</td>
                <td>{{ $laporan->user1->name }}</td>
                <td>{{ $laporan->persetujuan_1 }}</td>
                <td>{{ $laporan->user2->name }}</td>
                <td>{{ $laporan->persetujuan_2 }}</td>
                <td>{{ $laporan->status }}</td>
                <td>{{ $laporan->tanggal_peminjaman }}</td>
                <td>{{ $laporan->tanggal_pengembalian }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>