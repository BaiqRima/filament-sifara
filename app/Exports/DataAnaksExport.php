<?php

namespace App\Exports;

use App\Models\DataAnak;
use App\Models\DataPenduduk;
use App\Models\Kesehatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DataAnaksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data_anak = DataAnak::where('status_id', 3)->with(['data_penduduk','kondisi','bantuan'])->get();
        $data_penduduk = DataPenduduk::with(['data_anak','agama','lingkungan','pendidikan'])->get(['nomor_kartu_keluarga','nik','nomor_akta_lahir','keterangan_akta_lahir','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin']);
        return $data_anak;
        // return DataAnak::all();
    }
    // public function view(): View
    // {
    //     return view('export', [
    //         'datas' => DataAnak::all()
    //     ]);
    // }
}
