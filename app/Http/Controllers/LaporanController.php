<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Kendaraan;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(){
        $kendaraans = Kendaraan::where('status', 'tersedia')->get();
        $users = User::where('is_admin', false)->get();

        return view('pages.peminjaman', [
            'kendaraans' => $kendaraans,
            'users' => $users
        ]);
    }

    public function peminjaman(Request $request){
        // dd($request);
        if($request->user_id_1 != $request->user_id_2){
            $validate = $request->validate([
                'nik' => 'required',
                'nama' => 'required',
                'kendaraan_id' => 'required',
                'user_id_1' => 'required',
                'user_id_2' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required'
            ]);
            
            $validate['no_laporan'] = now()->timestamp . '-' . $request->kendaraan_id;
            $validate['persetujuan_1'] = 'menunggu persetujuan';
            $validate['persetujuan_2'] = 'menunggu persetujuan';
            $validate['status'] = 'belum disetujui';

            Laporan::create($validate);

            $kendaraan = Kendaraan::find($request->kendaraan_id);

            $kendaraan->update([
                'status' => 'menunggu persetujuan'
            ]);

            return redirect('peminjaman')->with('success', 'Berhasil, Sedang Menunggu Persetujuan!'); 
        }else{
            return redirect('peminjaman')->with('failed', 'Pihak 1 dan Pihak 2 tidak boleh sama!');
        }
    }

    public function persetujuan(){
        $datas1 = Laporan::where('user_id_1', auth()->user()->id)->where('persetujuan_1', 'menunggu persetujuan')->get();
        $datas2 = Laporan::where('user_id_2', auth()->user()->id)->where('persetujuan_1', 'telah disetujui')->where('persetujuan_2', '!=' ,'telah disetujui')->where('persetujuan_2', '!=' ,'tidak disetujui')->get();
        
        return view('pages.persetujuan', [
            'datas1' => $datas1,
            'datas2' => $datas2
        ]);
    }

    public function terima($id){
        $data = Laporan::find($id);

        if($data->user_id_1 == auth()->user()->id){
            $data->update([
                'persetujuan_1' => 'telah disetujui'
            ]);
        }else if($data->user_id_2 == auth()->user()->id){
            $data->update([
                'persetujuan_2' => 'telah disetujui',
                'status' => 'telah disetujui'
            ]);

            $kendaraan = Kendaraan::find($data->kendaraan_id);

            $kendaraan->update([
                'status' => 'digunakan'
            ]);
        }

        return redirect('persetujuan')->with('success', 'Berhasil Melakukan Persetujuan!');
    }

    public function tolak($id){
        $data = Laporan::find($id);
        $kendaraan = Kendaraan::find($data->kendaraan_id);

        if($data->user_id_1 == auth()->user()->id){
            $data->update([
                'persetujuan_1' => 'tidak disetujui',
                'persetujuan_2' => 'tidak disetujui',
                'status' => 'tidak disetujui'
            ]);

            $kendaraan->update([
                'status' => 'tersedia'
            ]);
        }else if($data->user_id_2 == auth()->user()->id){
            $data->update([
                'persetujuan_2' => 'tidak disetujui',
                'status' => 'tidak disetujui'
            ]);

            $kendaraan->update([
                'status' => 'tersedia'
            ]);
        }

        return redirect('persetujuan')->with('success', 'Berhasil Melakukan Penolakan!');
    }

    public function riwayat(){
        $datas = Laporan::where('user_id_1', auth()->user()->id)->orwhere('user_id_2', auth()->user()->id)->where('persetujuan_1', 'telah disetujui')->orwhere('persetujuan_2', 'telah disetujui')->get();
        $datas_admin = Laporan::where('status', 'telah disetujui')->get();

        return view('pages.riwayat', [
            'datas' => $datas,
            'datas_admin' => $datas_admin
        ]);
    }

    public function pengembalian(){
        $datas = Laporan::where('status', 'telah disetujui')->get();
        
        return view('pages.pengembalian', [
            'datas' => $datas,
        ]);
    }

    public function kembalikan($id){
        $data = Laporan::find($id);
        $kendaraan = Kendaraan::find($data->kendaraan_id);

        $current = strtotime(date("Y-m-d"));

        if($data->tanggal_pengembalian < $current){
            $data->update([
                'status' => 'telat mengembalikan'
            ]);

            $kendaraan->update([
                'status' => 'tersedia'
            ]);
        }else{
            $data->update([
                'status' => 'dikembalikan'
            ]);

            $kendaraan->update([
                'status' => 'tersedia'
            ]);
        }
        
        return redirect('pengembalian')->with('success', 'Berhasil Melakukan Pengembalian!');
    }

    public function profil(){

        return view('pages.edit_profil');
    }

    public function editProfil($id, Request $request){
        $profil = User::find($id);

        if($request->nik != $profil->nik){
            $this->validate($request, [
                'nik' => 'unique:users',
            ]);
        }

        if($request->email != $profil->email){
            $this->validate($request, [
                'email' => 'unique:users',
            ]);
        }

        $validate = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
        ]);

        if(isset($request->password)){
            $this->validate($request, [
                'password' => 'required|confirmed|min:8|string',
            ]);

            $validate['password'] = Hash::make($request->password);
        }

        $profil->update($validate);

        return redirect('profil')->with('success', 'Data User Berhasil Diupdate!');
    }

    public function exportLaporan(){
        return Excel::download(new LaporanExport, 'Laporan-Periodik.xlsx');
    }
}
