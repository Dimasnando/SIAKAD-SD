<?php

namespace App\Http\Controllers;

use App\Models\Informasis;
use App\Models\Jadwal;
use App\Models\Nilai;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.a
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // count
        $jadwal = Jadwal::count();
        $info = Informasis::count();
        $pegawai = Pegawai::count();
        $siswa = Siswa::count();
        $profil = User::where('id', \Auth::user()->id)->get();
        return view('home', compact('profil', 'jadwal', 'info', 'pegawai', 'siswa'));
    }

    public function cetak()
    {
        $cetak = Pendaftar::where('user_id', \Auth::user()->id)->get();
        return view('pendaftar.cetak', compact('cetak'));
    }
}
