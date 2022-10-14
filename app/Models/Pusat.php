<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pusat extends Model
{
    protected $table = 'pusat';
        
    public function allData()
    {
       return DB::table('pusat')
       ->select('pusat.id', 'lokasi.nama_kota', 'pusat.users_id', 'pusat.no_surat', 'pusat.judul_surat', 'pusat.tanggal_pergi', 'pusat.tanggal_pulang', 'pusat.lampiran_undangan', 'pusat.status_disposisi')
        ->leftJoin('lokasi', 'lokasi.id', '=' , 'pusat.lokasi_id')
        ->leftJoin('users', 'users.id', '=' , 'pusat.users_id')
       ->get();
         
    }

    public function addData($data)
    {
        DB::table('pusat')->insert($data);
    }

    public function lokasi(){
        return $this->belongsTo('App\Lokasi');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
