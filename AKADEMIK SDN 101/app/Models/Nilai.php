<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    use Uuid;
    use HasFactory;
    protected $guarded = [];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function jadwal_siswa()
    {
        return $this->belongsTo(Jadwal_siswa::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function akademik()
    {
        $sql = DB::table('nilais')
            ->select(DB::raw('SUM(akademik) as akademik'))
            ->where('siswa_id', $this->siswa_id)
            ->where('tahun', $this->tahun)
            ->where('semester', $this->semester)
            ->first();
        return $sql->akademik;
    }
    public function keterampilan()
    {
        $sql = DB::table('nilais')
            ->select(DB::raw('SUM(keterampilan) as keterampilan'))
            ->where('siswa_id', $this->siswa_id)
            ->where('tahun', $this->tahun)
            ->where('semester', $this->semester)
            ->first();
        return $sql->keterampilan;
    }
    public function qty()
    {
        $sql = DB::table('nilais')
            ->select(DB::raw('SUM(qty) as qty'))
            ->where('siswa_id', $this->siswa_id)
            ->where('tahun', $this->tahun)
            ->where('semester', $this->semester)
            ->first();
        return $sql->qty;
    }
}
