<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index (){
        // return 'Halaman Surat Masuk Dari Controller' ;
        $suratMasuk=[
            [
                'id'=> 1,
                'nomor_surat'=> '001/FT/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'Fakultas Teknik',
                'perihal'=> 'Undangan Rapat'
            ],
            [
                'id'=> 2,
                'nomor_surat'=> '002/BA/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'BA',
                'perihal'=> 'Pengumuman'
            ],
            [
                'id'=> 3,
                'nomor_surat'=> '003/LPM/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'LPM',
                'perihal'=> 'Sosialisasi Pedoman'
            ]

        ];
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function show ($id){
        $SuratMasukShow=[
            1 => [
                'id'=> 1,
                'nomor_surat'=> '001/FT/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'Fakultas Teknik',
                'perihal'=> 'Undangan Rapat'
            ],
            2 => [
                'id'=> 2,
                'nomor_surat'=> '002/BA/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'BA',
                'perihal'=> 'Pengumuman'
            ],
            3 => [
                'id'=> 3,
                'nomor_surat'=> '003/LPM/X/2026',
                'tanggal'=> '13-10-2026',
                'pengirim'=> 'LPM',
                'perihal'=> 'Sosialisasi Pedoman'
            ]

        ];
        $SuratMasukShow = $SuratMasukShow[$id]??null;
        return view('surat-masuk.index', compact('SuratMasukShow'));

    }
}