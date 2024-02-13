<?php

namespace App\Http\Controllers;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;

class formPdfController extends Controller
{

    public function generatePDF()
    {
        //$dataFromDatabase = User::all();


        $pdf = PDF::loadView('pdf.test');
        // return $pdf->download('test.pdf');
        return $pdf->stream('test.pdf');
        // return view ('pdf.test');
    }

    public function generatePDF2()
    {
        //$dataFromDatabase = User::all();

        //  return view ('pdf.sijil');
         $pdf = PDF::loadView('pdf.sijil');
         return $pdf->stream('sijil.pdf');
    }
    public function generatePDF3()
    {
        //$dataFromDatabase = User::all();

        //  return view ('pdf.borangDemografi');
         $pdf = PDF::loadView('pdf.borangDemografi');
         return $pdf->stream('borangDemografi.pdf');
    }
    public function generatePDF4()
    {
        //$dataFromDatabase = User::all();

        //  return view ('pdf.borangInstrumen');
         $pdf = PDF::loadView('pdf.borangInstrumen');
         return $pdf->stream('borangInstrumen.pdf');
    }
    public function generatePDF5()
    {
        //$dataFromDatabase = User::all();

        //  return view ('pdf.dashboardSKIPS');
         $pdf = PDF::loadView('pdf.dashboardSKIPS');
         return $pdf->stream('dashboardSKIPS.pdf');
    }
}
