<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_siswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class)->orderBy('jenis', 'asc');
    }
    public function jadwal_nilai()
    {
        return $this->hasMany(Jadwal_nilai::class);
    }
}
