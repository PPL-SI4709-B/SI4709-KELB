<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function umkm()
    {
        if (!session()->has('is_logged_in')) return redirect()->route('login');

        return view('umkm.dashboard', [
            'totalPengajuan' => 0,
            'eventDiikuti' => 0,
            'laporanTerkirim' => 0,
            'statusPengajuan' => [
                'menunggu' => 0,
                'disetujui' => 0,
                'ditolak' => 0,
                'total' => 0,
            ],
            'notifikasi' => collect([]),
            'laporanTerakhir' => collect([]),
        ]);
    }

    public function dinas()
    {
        return view('dinas.dashboard', [
            'totalUmkm' => User::count(),
            'umkmTerverifikasi' => User::where('profile_status', 'verified')->count(),
            'pengajuanMasuk' => 0,
            'eventAktif' => 0,
            'distribusiKecamatan' => collect([]),
            'pengajuanTerbaru' => collect([]),
        ]);
    }
}
