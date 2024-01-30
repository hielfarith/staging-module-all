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
    
         return view ('pdf.sijil');
    }
}
