<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function __construct()
    {
       $this->Lokasi = new Lokasi();  
    }

    public function index()
    {
        $data = [
            'lokasi' => $this->Lokasi->allData(),

        ];
        return view('lokasi/index', $data);
    }

    public function add()
    {
        return view ('lokasi/add_lokasi');
    }

    public function insert()
    {
        Request()->validate([
            'nama_kota' => 'required',
        ],[
            'nama_kota.required' => 'nama kota harus diisi!',
        ]);

        $data = [
            'nama_kota' => Request()->nama_kota,
        ];

        $this->Lokasi->addData($data);
        Alert::success('Berhasil!', 'Data lokasi berhasil disimpan!');
        return redirect()->route('lokasi');

    }
    public function destroy($id)
    {
        DB::table('lokasi')->where('id', $id)->delete();
        Alert::success('Berhasil!', 'Data lokasi berhasil dihapus!');
        return redirect('lokasi');
    }

    public function edit($id)
    {
        $lokasi = DB::table('lokasi')->find($id);
        return view('lokasi/edit_lokasi',['lokasi'=>$lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('karyawan')
        //     ->updateOrInsert(
        //         ['nama_karyawan' => $request->nama_karyawan,
        //          'alamat' => $request->alamat,
        //          'no_hp' => $request->no_hp]
        //     );

        $affected = DB::table('lokasi')
              ->where('id', $id)
              ->update(['nama_kota' => $request->nama_kota]);

            Alert::success('Berhasil!', 'Data lokasi berhasil diupdate!');
            return redirect('/lokasi');
    }
}
