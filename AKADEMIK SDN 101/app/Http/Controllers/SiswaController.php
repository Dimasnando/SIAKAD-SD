<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_siswa;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return view('siswa.index', compact('siswa'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'nis' => 'required',
            'hp' => 'required',
        ], $massage);

        Siswa::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat' => $request->tempat,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'nis' => $request->nis,
            'hp' => $request->hp,
        ]);
        return redirect('siswa')->with('notif', 'Data Siswa Berhasi di Tambah');
    }
    public function edit($id)
    {
        $edit = Siswa::where('uuid', $id)->firstOrFail();
        return view('siswa.edit', compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'tempat' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'nis' => 'required',
            'hp' => 'required',
        ], $massage);
        $siswa = Siswa::where('uuid', $id)->firstOrFail();
        $siswa->update($request->all());
        return redirect('/siswa')->with('notif', 'Data Siswa Berhasil di Edit');
    }
    public function delete($id)
    {
        $siswa = Siswa::where('uuid', $id)->firstOrFail();
        $siswa->delete();
        return redirect('siswa')->with('notif', 'Data Siswa Berhasil di Hapus');
    }




    // Wali Kelas
    public function tahun()
    {
        $tahun = Tahun::get();
        return view('siswa_saya.tahun', compact('tahun'));
    }
    public function siswa_saya($id)
    {
        $kelas = Tahun::with('kelas')->where('id', $id)->firstOrFail();
        return view('siswa_saya.index', compact('kelas'));
    }
    public function siswa_saya_detail($id)
    {
        $kelas = Kelas::with('nilai')->where('pegawai_id', \Auth::user()->pegawai_id)->where('id', $id)->firstOrFail();
        $data = Nilai::select(
            'nilais.*',
            'siswas.nama as nama_siswa',
            'siswas.nis as nisn',
            'mapels.nama as nama_mapel',
        )
            ->leftJoin('siswas', 'siswas.id', '=', 'nilais.siswa_id')
            ->leftJoin('mapels', 'mapels.id', '=', 'nilais.mapel_id')
            // ->where('nilais.kelas_id', $id)
            ->get()
            ->groupBy(['nama_siswa', 'nama_mapel']);
        // dd($data);

        $siswa = Siswa::select(
            'siswas.*',
            DB::raw('(SELECT kelas_id FROM nilais WHERE nilais.siswa_id = siswas.id LIMIT 1) as id_kelas'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 148) as nilai_bhs_indo'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 149) as nilai_mtk'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 150) as nilai_seni'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 151) as nilai_agama'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 152) as nilai_penjas'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 153) as nilai_bhs_ing'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 154) as nilai_bta'),
            DB::raw('(SELECT AVG(nilai) FROM nilais WHERE nilais.siswa_id = siswas.id AND nilais.mapel_id = 155) as nilai_ipas')
        )->get();
        $siswa = $siswa->where('id_kelas', $id);
        return view('siswa_saya.nilai', compact('kelas', 'data', 'siswa'));
    }
    public function siswa_saya_nilai($id)
    {
        $kelas = Siswa::with('nilai')->where('id', $id)->firstOrFail();
        $data['parse'] = $kelas->nilai->groupBy('mapel_id');
        $nilai = Nilai::select(
            'nilais.*',
            'mapels.nama as nama_mapel'
        )
            ->leftJoin('mapels', 'mapels.id', '=', 'nilais.mapel_id')
            ->where('nilais.siswa_id', $id)
            ->get()
            ->groupBy('nama_mapel');
        // dd($nilai);
        $cek = Nilai::where('siswa_id', $id)->count();
        $jika = $nilai->count();
        return view('siswa_saya.nilai-detail', compact('kelas', 'data', 'nilai', 'cek', 'jika'));
    }
}
