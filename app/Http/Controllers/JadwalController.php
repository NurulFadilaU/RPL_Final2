<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //
    public function index()
    {
        
       
       $kegiatans = Jadwal::all(); 

      
       $events = $kegiatans->flatMap(function ($kegiatan) {
           $startEvent = [
               'title' => $kegiatan->nama_kegiatan,
               'start' => $kegiatan->tanggal_mulai, 
               'backgroundColor' => 'green',
               'borderColor' => 'transparent',  
              
           ];

           $endEvent = [
               'title' => $kegiatan->nama_kegiatan,
               'start' => $kegiatan->tanggal_berakhir, 
               'backgroundColor' => 'red', 
               'borderColor' => 'transparent',
             
           ];
           return [$startEvent, $endEvent];
       });

      

       // Kirim data events ke view
       return view('pimpinan.jadwalkegiatan', compact('events')); 
    }
}