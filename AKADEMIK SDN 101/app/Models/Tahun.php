<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class)->where('pegawai_id', \Auth::user()->pegawai_id);
    }
    public function jadwal_siswa()
    {
        return $this->hasMany(jadwal_siswa::class);
    }
    //
    public function kelas()
    {
        return $this->hasMany(Kelas::class)->where('pegawai_id', \Auth::user()->pegawai_id);
    }
}
