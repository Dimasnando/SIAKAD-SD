<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::get();
        return view('mapel.index', compact('mapel'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
        ], $massage);

        Mapel::create([
            'nama' => $request->nama,

        ]);
        return redirect('mapel')->with('notif', 'Data Mapel Berhasi di Tambah');
    }

    public function edit($id)
    {
        $edit = Mapel::where('uuid', $id)->firstOrFail();
        return view('mapel.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'nama' => 'required',
        ], $massage);
        $mapel = Mapel::where('uuid', $id)->firstOrFail();
        $mapel->nama = $request->nama;
        $mapel->save();
        return redirect('/mapel')->with('notif', 'Data Mapel Berhasil di Edit');
    }

    public function delete($id)
    {
        $siswa = Mapel::where('uuid', $id)->firstOrFail();
        $siswa->delete();
        return redirect('mapel')->with('notif', 'Data mapel Berhasil di Hapus');
    }
}
