<?php

namespace App\Http\Controllers;

use App\Models\JenisPotensi;
use App\Models\Kabupaten;
use PDF;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $datas = Kabupaten::with(['objekWisata' => function ($query) {
            $query->withCount(['potensi']);
        }, 'objekWisata.potensi.jenis_potensi'])
        ->orderBy('created_at', 'desc')
        ->get();
        $jenisPotensis = JenisPotensi::all();
        // Menghitung total objek wisata dan total potensi untuk semua kabupaten
        $totalObjekWisata = 0;
        $totalPotensiCounts = [];

        foreach ($datas as $kabupaten) {
            $totalObjekWisata += $kabupaten->objekWisata->count();
            foreach ($kabupaten->objekWisata as $objekWisata) {
                foreach ($objekWisata->potensi as $potensi) {
                    if (!isset($totalPotensiCounts[$potensi->jenis_potensi->id])) {
                        $totalPotensiCounts[$potensi->jenis_potensi->id] = 0;
                    }
                    $totalPotensiCounts[$potensi->jenis_potensi->id]++;
                }
            }
        }
        return view('admin.export.index', compact('datas','jenisPotensis', 'totalObjekWisata', 'totalPotensiCounts'));
    }

    public function exportAll()
    {
        $datas = Kabupaten::with(['objekWisata' => function ($query) {
            $query->withCount(['potensi']);
        }, 'objekWisata.potensi.jenis_potensi'])
        ->orderBy('created_at', 'desc')
        ->get();
        $jenisPotensis = JenisPotensi::all();

        // Menghitung total objek wisata dan total potensi untuk semua kabupaten
        $totalObjekWisata = 0;
        $totalPotensiCounts = [];

        foreach ($datas as $kabupaten) {
            $totalObjekWisata += $kabupaten->objekWisata->count();
            foreach ($kabupaten->objekWisata as $objekWisata) {
                foreach ($objekWisata->potensi as $potensi) {
                    if (!isset($totalPotensiCounts[$potensi->jenis_potensi->id])) {
                        $totalPotensiCounts[$potensi->jenis_potensi->id] = 0;
                    }
                    $totalPotensiCounts[$potensi->jenis_potensi->id]++;
                }
            }
        }

        $pdf = PDF::loadView('admin.export.pdfview', array(
            'datas' =>  $datas,
            'jenisPotensis' => $jenisPotensis,
            'totalObjekWisata' => $totalObjekWisata,
            'totalPotensiCounts' => $totalPotensiCounts,
            ))
            ->setPaper('a4', 'landscape');

        return $pdf->download('all-data.pdf');
    }
}
