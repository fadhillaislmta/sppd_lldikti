<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pusat;
use App\Models\Lokasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PusatController extends Controller
{
    public function __construct()
    {
       $this->Pusat = new Pusat();  
    }

    public function index()
    {
        $data = [
            'pusat' => $this->Pusat->allData(),

        ];
        return view('pusat/index', $data);
    }

    public function add()
    {
        $lokasi = Lokasi::all();
        $users = User::all();
        return view ('pusat/add_pusat', compact('lokasi','users'));
    }

    public function insert()
    {
        Request()->validate([
            'lokasi_id' => 'required|unique:pusat,lokasi_id|',
            'users_id' => 'required',
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'tanggal_pergi' => 'required',
            'tanggal_pulang' => 'required',
            'lampiran_undangan' => 'required',
        ],[
            'users_id.required' => 'user harus diisi!',
            'lokasi_id.required' => 'lokasi harus diisi!',
            'no_surat.required' => 'nomor surat harus diisi!',
            'judul_surat.required' => 'judul surat harus diisi!',
            'tanggal_pergi.required' => 'tanggal pergi harus diisi!',
            'tanggal_pulang.required' => 'tanggal pulang harus diisi!',
            'lampiran_undangan.required' => 'lampiran surat harus diisi!',
        ]);

        $file = Request()->lampiran_undangan;
        $fileName = Request()->no_surat . '.' . $file->extension();
        $file->move(public_path('lampiran_undangan'), $fileName);

        $data = [
            'users_id' => Request()->users_id,
            'lokasi_id' => Request()->lokasi_id,
            'no_surat' => Request()->no_surat,
            'judul_surat' => Request()->judul_surat,
            'tanggal_pergi' => Request()->tanggal_pergi,
            'tanggal_pulang' => Request()->tanggal_pulang,
            'lampiran_undangan' => $fileName,
        ];

        $this->Pusat->addData($data);
        Alert::success('Berhasil!', 'Data undangan berhasil disimpan!');
        return redirect()->route('pusat');

    }
    public function destroy($id)
    {
        DB::table('pusat')->where('id', $id)->delete();
        Alert::success('Berhasil!', 'Data undangan berhasil dihapus!');
        return redirect('pusat');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::all();
        $pusat = DB::table('pusat')->find($id);
        return view('pusat/edit_pusat',compact('lokasi') , ['pusat'=>$pusat]);
    
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

        $affected = DB::table('pusat')
              ->where('id', $id)
              ->update(['user' => $request->user,
                        'lokasi_id' => $request->lokasi_id,
                        'no_surat' => $request->no_surat,
                        'judul_surat' => $request->judul_surat,
                        'tgl_pergi' => $request->tgl_pergi,
                        'tgl_pulang' => $request->tgl_pulang,
                        'lampiran_surat' => $request->lampiran_surat]);


            Alert::success('Berhasil!', 'Data surat berhasil diupdate!');
            return redirect('/pusat');
    }
}
