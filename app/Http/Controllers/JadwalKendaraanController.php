<?php

namespace App\Http\Controllers;

use App\Models\JadwalKendaraan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class JadwalKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    public function jadwal($id){
        $jadwalKendaraan = JadwalKendaraan::where('kendaraan_id', $id)->get();
        $kendaraan = Kendaraan::find($id);

        return view('pages.jadwal_perbaikan', [
            'jadwals' => $jadwalKendaraan,
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JadwalKendaraan::create([
            'tanggal' => $request->tanggal,
            'status' => 'belum diservice',
            'kendaraan_id' => $request->kendaraan_id
        ]);

        return redirect('kendaraan/jadwal-service/'. $request->kendaraan_id)->with('success', 'Jadwal Service Berhasil Diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalKendaraan  $jadwalKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalKendaraan $jadwalKendaraan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalKendaraan  $jadwalKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalKendaraan $jadwalKendaraan)
    {
        //
    }

    public function konfirmasi($id){
        $data = JadwalKendaraan::find($id);

        $data->update([
            'status' => 'telah diservice'
        ]);
        
        return redirect('kendaraan/jadwal-service/'. $data->kendaraan_id)->with('success', 'Status Service Telah Diubah!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalKendaraan  $jadwalKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalKendaraan $jadwalKendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalKendaraan  $jadwalKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalKendaraan $jadwalKendaraan)
    {
        //
    }
}
