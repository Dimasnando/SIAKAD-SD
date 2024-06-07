<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pegawai;
use App\Models\Tahun;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $wali = Pegawai::get();
        $tahun = Tahun::get();
        $kls = Kelas::orderBy('kelas', 'asc')->get();
        return view('kelas.index', compact('kls', 'wali', 'tahun'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'kelas' => 'required',
            'nama' => 'required',
            'pegawai_id' => 'required',
            'tahun_id' => 'required',
        ], $massage);
        Kelas::create([
            'kelas' => $request->kelas,
            'nama' => $request->nama,
            'pegawai_id' => $request->pegawai_id,
            'tahun_id' => $request->tahun_id,
        ]);
        return redirect('kelas')->with('notif', 'Data Kelas Berhasi di Tambah');
    }

    public function edit($id)
    {
        $wali = Pegawai::get();
        $tahun = Tahun::get();
        $edit = Kelas::where('id', $id)->firstOrFail();
        return view('kelas.edit', compact('edit', 'wali', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'kelas' => 'required',
            'nama' => 'required',
            'pegawai_id' => 'required',
            'tahun_id' => 'required',
        ], $massage);
        $kls = Kelas::where('id', $id)->firstOrFail();
        $kls->update($request->all());
        return redirect('/kelas')->with('notif', 'Data Kelas Berhasil di Edit');
    }

    public function delete($id)
    {
        $kls = Kelas::where('id', $id)->firstOrFail();
        $kls->delete();
        return redirect('kelas')->with('notif', 'Data Kelas Berhasil di Hapus');
    }
}
