<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::get();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ], $massage);

        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,

        ]);
        return redirect('pegawai')->with('notif', 'Data Pegawai Berhasi di Tambah');
    }

    public function edit(Pegawai $pegawai, $id)
    {
        $edit = Pegawai::where('uuid', $id)->firstOrFail();
        return view('pegawai.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ], $massage);
        $pegawai = Pegawai::where('uuid', $id)->firstOrFail();
        $pegawai->update($request->all());
        return redirect('/pegawai')->with('notif', 'Data Pegawai Berhasil di Edit');
    }

    public function delete($id)
    {
        $pegawai = Pegawai::where('uuid', $id)->firstOrFail();
        $pegawai->delete();
        return redirect('pegawai')->with('notif', 'Data Pegawai Berhasil di Hapus');
    }
}
