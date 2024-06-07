<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Pegawai;
use App\Models\Pendaftar;
use App\Models\Prestasi;
use App\Models\Rank;
use App\Models\Siswa;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // rank
        $rank = Mapel::get()->groupBy('kelas_id')->toArray();
        $siswa = Siswa::get();
        $tahun = Tahun::get();
        return view('laporan.index', compact('siswa', 'rank', 'tahun'));
    }
    // nilai persiswa
    public function laporan($id, $tahun)
    {
        $siswa = Siswa::find($id);
        $siswa = $siswa;

        $laporan = Nilai::where('siswa_id', [$id])
            ->where('tahun_id', [$tahun])
            ->get();
        return view('laporan.nilai', compact('laporan', 'siswa', 'tahun'));
    }
}
