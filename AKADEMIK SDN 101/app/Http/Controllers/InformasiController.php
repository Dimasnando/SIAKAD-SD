<?php

namespace App\Http\Controllers;

use App\Models\Informasis;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $info = Informasis::get();
        return view('informasi.index', compact('info'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'foto' => 'required',
            'isi' => 'required',
        ], $massage);
        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'informasi_foto';
        $file->move($tujuan_upload, $nama_file);
        $bayar = new Informasis();
        $bayar->foto = $nama_file;
        $bayar->isi = $request->isi;
        $bayar->save();
        return redirect('/informasi')->with('notif', 'Data Telah ditambah');
    }
    //
    public function edit($id)
    {
        $edit = Informasis::where('id', $id)->firstOrFail();
        return view('informasi.edit', compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $edit = Informasis::where('id', $id)->first();
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'isi' => 'required',
        ], $massage);
        $edit =  \App\Models\Informasis::find($id);
        $edit->isi =  $request->isi;
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $nama_file = time() . '.' . $extension;
            $file->move('informasi_foto', $nama_file);
            $edit->foto = $nama_file;
        }
        $edit->save();
        return redirect('/informasi')->with('notif', 'Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        $aset = Informasis::where('id', $id)->firstOrFail();
        $aset->delete();
        return redirect('informasi')->with('notif', 'Data Berhasil di Hapus');
    }
}
