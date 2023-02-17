<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraans = Kendaraan::all();
        
        return view('pages.kendaraan', [
            'kendaraans' => $kendaraans
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
        $validate = $request->validate([
            'nomor_inventaris' => 'required|unique:kendaraans',
            'merk' => 'required',
            'nopol' => 'required|unique:kendaraans',
            'jenis_kendaraan' => 'required',
            'konsumsi_bbm' => 'required',
        ]);

        $validate['status'] = 'tersedia';
        
        Kendaraan::create($validate);

        return redirect('kendaraan')->with('success', 'Data Kendaraan Berhasil Diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        if($request->nomor_inventaris != $kendaraan->nomor_inventaris){
            $this->validate($request, [
                'nomor_inventaris' => 'unique:kendaraans',
            ]);
        }

        if($request->nopol != $kendaraan->nopol){
            $this->validate($request, [
                'nopol' => 'unique:kendaraans',
            ]);
        }

        $validate = $request->validate([
            'nomor_inventaris' => 'required',
            'merk' => 'required',
            'nopol' => 'required',
            'jenis_kendaraan' => 'required',
            'konsumsi_bbm' => 'required',
        ]);

        if(isset($request->gambar)){
            $this->validate($request, [
                'gambar' => 'required|image|max:10000'
            ]);

            unlink('storage/'. $kendaraan->gambar);

            $nama_gambar = $request->nomor_inventaris . '-' . strtok($request->merk, " ") . '_' . $request->jenis_kendaraan;

            $validate['gambar'] = $request->file('gambar')->storeAs('kendaraan/', $nama_gambar);

        }

        $kendaraan->update($validate);

        return redirect('kendaraan')->with('success', 'Data Kendaraan Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
    }

    public function delete($id){
        $kendaraan = Kendaraan::find($id);

        unlink('storage/'. $kendaraan->gambar);

        $kendaraan->delete();

        return redirect('kendaraan')->with('success', 'Data Kendaraan Berhasil Dihapus!');
    }
}
