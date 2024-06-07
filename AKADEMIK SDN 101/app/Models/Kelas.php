<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $table = 'kelases';
    protected $fillable = ['kelas', 'nama', 'pegawai_id', 'tahun_id'];
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function jadwal_siswa()
    {
        return $this->hasMany(Jadwal_siswa::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    // rev iii
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class)->where('pegawai_id', \Auth::user()->pegawai_id);
    }
}
