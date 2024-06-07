<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function guru()
    {
        $guru = Pegawai::where('jabatan', 'Guru')->get();
        $aguru = User::where('role', 'Guru')->get();
        return view('user.guru', compact('guru', 'aguru'));
    }

    public function siswa()
    {
        $siswa = Siswa::get();
        $asiswa = User::where('role', 'Siswa')->get();
        return view('user.siswa', compact('siswa', 'asiswa'));
    }
    public function store_guru(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:4|max:12',
            'pegawai_id' => 'required',
        ], $massage);
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->pegawai_id = $request->pegawai_id;
        $user->save();
        return back()->with('notif', 'Anda Telah Registrasi, Silahkan Login');
    }
    public function store_siswa(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:4|max:12',
            'siswa_id' => 'required',
        ], $massage);

        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->siswa_id = $request->siswa_id;
        // $user->remember_token = str_random(60);
        $user->save();
        return back()->with('notif', 'Anda Telah Registrasi, Silahkan Login');
    }

    // Profil
    public function profil_edit($id)
    {
        $profil = User::where('uuid', $id)->firstOrFail();
        return view('profil.edit', compact('profil'));
    }
    public function profil_update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'password' => 'required',
        ], $massage);
        $user = \App\Models\User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/home')->with('notif', 'Data Telah Di Update');
    }
    public function delete($id)
    {
        $user = User::where('uuid', $id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with(['notif' => 'Akun </strong>' . $user->name . '</strong> Dihapus']);
    }
}
