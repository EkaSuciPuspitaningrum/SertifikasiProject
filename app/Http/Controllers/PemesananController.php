<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function home()
    {
        // Mengambil data pemesanan terakhir dari database
        $latestPemesanan = Pemesanan::latest()->first();

        // Mengirim data ke view
        return view('welcome', compact('latestPemesanan'));
    }

    public function simpanData(Request $request)
    {

        $request->validate([
            'no_iden' => 'required|digits:16',
        ], [
            'no_iden.digits' => 'Nomor identitas harus terdiri dari :digits digit.',
        ]);

        $nama = $request->input('name');
        $jenis_kelamin = $request->input('gender');
        $nomor_iden = $request->input('no_iden');
        $tipe_kamar = $request->input('tipe_kamar');
        $harga = $request->input('harga');
        $tanggal_pesan = $request->input('date');
        $durasi_menginap = $request->input('durasi');
        $sarapan = $request->has('sarapan') ? 1 : 0;
        $total_bayar = $request->input('total');


        DB::table('pemesanan')->insert([
            'nama_pemesan' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'nomor_identitas' => $nomor_iden,
            'tipe_kamar' => $tipe_kamar,
            'harga' => $harga,
            'tanggal_pesan' => $tanggal_pesan,
            'durasi_menginap' => $durasi_menginap,
            'termasuk_sarapan' => $sarapan,
            'total_bayar' => $total_bayar
        ]);

        $latestPemesanan = Pemesanan::latest()->first();

        // Mengirim data ke view
        return view('welcome', compact('latestPemesanan'))->with('success', 'Data berhasil disimpan ke database.');
    }
}
