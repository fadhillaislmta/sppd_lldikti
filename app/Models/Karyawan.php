<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    public function users(){
        return $this->hasOne(User::class,'id', 'id'); }
        
    public function allData()
    {
       return DB::table('karyawan')->get();
         
    }

    public function addData($data)
    {
        DB::table('karyawan')->insert($data);
    }

}
