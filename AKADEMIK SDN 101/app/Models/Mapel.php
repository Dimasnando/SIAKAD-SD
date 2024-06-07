<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Mapel extends Model
{
    use Uuid;
    use HasFactory;
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
