<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jadwalPerbaikan(){
        return $this->hasMany(JadwalPerbaikan::class);
    }

    public function laporan(){
        return $this->hasMany(Laporan::class);
    }
}
