<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Jadwal_siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Pegawai;
use App\Models\Pendaftar;
use App\Models\Rank;
use App\Models\Siswa;
use App\Models\Tahun;
use Illuminate\Http\Request;


class NilaiController extends Controller
{
    public function tahun()
    {
        $tahun = Tahun::get();
        return view('nilai.tahun', compact('tahun'));
    }
    public function siswa()
    {
        // siswa
        $nilaisiswa = Nilai::select(
            'nilais.*',
            'mapels.nama as nama_mapel'
        )
            ->leftJoin('mapels', 'mapels.id', '=', 'nilais.mapel_id')
            ->where('nilais.siswa_id', \Auth::user()->siswa_id)
            ->get()
            ->groupBy('nama_mapel');
        $cek = Nilai::where('siswa_id', \Auth::user()->siswa_id)->count();
        return view('nilai.saya', compact('nilaisiswa', 'cek'));
    }
    public function index($id)
    {
        $siswa = Siswa::get();
        $tahun   = Tahun::get();
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        $mapel = Jadwal_siswa::where('pegawai_id', \Auth::user()->pegawai_id)->get();
        // loop
        // ->where('pegawai_id', \Auth::user()->pegawai_id)
        $nilai = Tahun::with('jadwal', 'jadwal_siswa')->where('id', $id)->firstOrFail();
        return view('nilai.index', compact('siswa', 'nilai', 'mapel', 'tahun', 'kelas'));
    }
    public function detail($id)
    {
        $siswa = Siswa::get();
        $detail = Jadwal::with('jadwal_siswa')->where('id', $id)->firstOrFail();
        return view('nilai.all-siswa', compact('detail', 'siswa'));
    }
    public function nilai($id)
    {
        $tahun   = Tahun::get();
        $nilai = Jadwal_siswa::with('nilai')->where('id', $id)->firstOrFail();
        //
        $count = $nilai->nilai->count();
        $cek = $nilai->nilai->count();
        return view('nilai.siswa', compact('nilai', 'tahun', 'count', 'cek'));
    }
    //
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'nilai' => 'required',
            'tahun_id' => 'required',
            'jenis' => 'required',
        ], $massage);
        $nilai = new Nilai();
        $nilai->pegawai_id = $request->pegawai_id;
        $nilai->jadwal_id = $request->jadwal_id;
        $nilai->jadwal_siswa_id = $request->jadwal_siswa_id;
        $nilai->siswa_id = $request->siswa_id;
        $nilai->tahun_id = $request->tahun_id;
        $nilai->kelas_id = $request->kelas_id;
        $nilai->mapel_id = $request->mapel_id;
        $nilai->jenis = $request->jenis;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect()->back()->with('notif', 'Nilai Berhasil Ditambah');
    }
    public function edit($id)
    {
        $mapel = Jadwal_siswa::where('pegawai_id', \Auth::user()->pegawai_id)->get();
        $siswa = Siswa::get();
        $tahun   = Tahun::get();
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        $edit = Nilai::where('uuid', $id)->firstOrFail();
        return view('nilai.edit', compact('edit', 'mapel', 'siswa', 'kelas', 'tahun'));
    }
    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'nilai' => 'required',
        ], $massage);
        $nilai = nilai::where('uuid', $id)->firstOrFail();
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect('/nilai')->with('notif', 'Data Nilai Berhasil di Edit');
    }

    public function delete($id)
    {
        $nl = Nilai::where('uuid', $id)->firstOrFail();
        $nl->delete();
        return redirect('nilai')->with('notif', 'Data Nilai Berhasil di Hapus');
    }
}
