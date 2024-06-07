<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
    public function jadwal_siswa()
    {
        return $this->hasMany(Jadwal_siswa::class);
    }
}
