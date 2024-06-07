<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahun = Tahun::get();
        return view('tahun.index', compact('tahun'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
        ], $massage);

        Tahun::create([
            'nama' => $request->nama,

        ]);
        return redirect('tahun')->with('notif', 'Data Tahun Berhasi di Tambah');
    }

    public function edit($id)
    {
        $edit = Tahun::where('id', $id)->firstOrFail();
        return view('tahun.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
        ], $massage);
        $tahun = Tahun::where('id', $id)->firstOrFail();
        $tahun->nama = $request->nama;
        $tahun->save();
        return redirect('/tahun')->with('notif', 'Data Tahun Berhasil di Edit');
    }

    public function delete($id)
    {
        $siswa = Tahun::where('id', $id)->firstOrFail();
        $siswa->delete();
        return redirect('tahun')->with('notif', 'Data Tahun Berhasil di Hapus');
    }
}
