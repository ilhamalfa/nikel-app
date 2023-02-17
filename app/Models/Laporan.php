<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user1(){
        return $this->belongsTo(User::class, 'user_id_1');
    }

    public function user2(){
        return $this->belongsTo(User::class, 'user_id_2');
    }

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }
}
