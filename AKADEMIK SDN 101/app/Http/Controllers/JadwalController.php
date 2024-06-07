<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Jadwal_siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\Tahun;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $tahun = Tahun::orderBy('nama', 'asc')->get();
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        $hari = Hari::get();
        $mapel = Mapel::get();
        $siswa = Siswa::get();
        $guru = Pegawai::where('jabatan', 'Guru')->get();
        //get
        $jadwal = Jadwal::get();
        $cek =  Hari::with('jadwal')->count();
        $jaguru = Hari::with('jadwal')->get();
        $jasiswa = Jadwal_siswa::where('siswa_id', \Auth::user()->siswa_id)->orderBy('created_at', 'DESC')->get();
        // dd($jaguru);
        return view('jadwal.index', compact('jadwal', 'kelas', 'mapel', 'siswa', 'guru', 'tahun', 'jaguru', 'hari', 'jasiswa', 'cek'));
    }
    public function detail($id)
    {
        $siswa = Siswa::get();
        $detail = Jadwal::with('jadwal_siswa')->where('id', $id)->firstOrFail();
        return view('jadwal.detail', compact('detail', 'siswa'));
    }
    public function detail_ngajar($id)
    {
        $jaguru = Hari::with('jadwal')->where('id', $id)->firstOrFail();
        return view('jadwal.detail-ngajar', compact('jaguru'));
    }

    public function store_siswa(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'siswa_id' => 'required',
            'tahun_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
        ], $massage);
        Jadwal_siswa::create([
            'pegawai_id' => $request->pegawai_id,
            'jadwal_id' => $request->jadwal_id,
            'siswa_id' => $request->siswa_id,
            'tahun_id' => $request->tahun_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
        ]);
        return redirect()->back()->with('notif', 'Data Siswa Berhasi di Tambah');
    }

    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'tahun_id' => 'required',
            'pegawai_id' => 'required',
            'hari_id' => 'required',
            'jam' => 'required',
        ], $massage);
        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'tahun_id' => $request->tahun_id,
            'pegawai_id' => $request->pegawai_id,
            'hari_id' => $request->hari_id,
            'jam' => $request->jam,
        ]);
        return redirect('jadwal')->with('notif', 'Data Jadwal Berhasi di Tambah');
    }
    //
    public function edit($id)
    {
        $tahun = Tahun::orderBy('nama', 'asc')->get();
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        $hari = Hari::get();
        $mapel = Mapel::get();
        $siswa = Siswa::get();
        $guru = Pegawai::where('jabatan', 'Guru')->get();
        $edit = Jadwal::where('id', $id)->firstOrFail();
        return view('jadwal.edit', compact('edit', 'tahun', 'kelas', 'hari', 'mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'tahun_id' => 'required',
            'pegawai_id' => 'required',
            'hari_id' => 'required',
            'jam' => 'required',
        ], $massage);
        $mapel = Jadwal::where('id', $id)->firstOrFail();
        $mapel->kelas_id = $request->kelas_id;
        $mapel->mapel_id = $request->mapel_id;
        $mapel->tahun_id = $request->tahun_id;
        $mapel->pegawai_id = $request->pegawai_id;
        $mapel->hari_id = $request->hari_id;
        $mapel->jam = $request->jam;
        $mapel->save();
        return redirect('/jadwal')->with('notif', 'Data Jadwal Berhasil di Edit');
    }
    public function delete($id)
    {
        $jadwal = Jadwal::where('id', $id)->firstOrFail();
        $jadwal->delete();
        return redirect('jadwal')->with('notif', 'Data Berhasil di Hapus');
    }
    public function delete_Siswa($id)
    {
        $siswa = Jadwal_siswa::where('id', $id)->firstOrFail();
        $siswa->delete();
        return redirect()->back()->with('notif', 'Data Berhasil di Hapus');
    }
}
