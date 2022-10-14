<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    public function pusat(){
        return $this->hasMany(pusat::class,'id', 'id'); }
        
        
    public function allData()
    {
       return DB::table('lokasi')->get();
         
    }

    public function addData($data)
    {
        DB::table('lokasi')->insert($data);
    }

}
