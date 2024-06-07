<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_nilai extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jadwal_siswa()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
