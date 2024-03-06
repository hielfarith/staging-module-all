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

    public function generatePDF6()
        {
            //$dataFromDatabase = User::all();


            $pdf = PDF::loadView('spks.validasi_spks.piawaian.rumusanskor');
            // return $pdf->download('test.pdf');
            return $pdf->stream('rumusan.skor');
            // return view ('pdf.test');
        }

    public function generatePDF7()
        {
            //$dataFromDatabase = User::all();


            $pdf = PDF::loadView('spks.validasi_spks.piawaian.Pengurusanmurid');
            // return $pdf->download('test.pdf');
            return $pdf->stream('Pengurusan.murid');
            // return view ('pdf.test');
        }

        public function generatePDF8()
        {
            //$dataFromDatabase = User::all();


            $pdf = PDF::loadView('spks.validasi_spks.piawaian.pemarkahanmurid');
            // return $pdf->download('test.pdf');
            return $pdf->stream('pemarkahan.murid');
            // return view ('pdf.test');
        }

        public function generatePDF9()
        {
            //$dataFromDatabase = User::all();


            $pdf = PDF::loadView('spks.validasi_spks.piawaian.keselamatanmurid');
            // return $pdf->download('test.pdf');
            return $pdf->stream('keselamatan.murid');
            // return view ('pdf.test');
        }

        public function generatePDF10()
        {
            //$dataFromDatabase = User::all();


            $pdf = PDF::loadView('spks.validasi_spks.piawaian.penarafanmurid');
            // return $pdf->download('test.pdf');
            return $pdf->stream('penarafan.murid');
            // return view ('pdf.test');
        }
}
