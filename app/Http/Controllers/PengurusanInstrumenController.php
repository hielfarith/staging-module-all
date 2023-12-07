<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;
use App\Models\NewForm;
use Yajra\DataTables\DataTables;

class PengurusanInstrumenController extends Controller
{
    public function TambahInstrumen(Request $request){
        return view('pengurusan_instrumen.tambah_instrumen');
    }

    public function SenaraiInstrumen(Request $request){

        if($request->ajax()) {

            $instrumentListings = FormSubmission::get();
            return Datatables::of($instrumentListings)
                ->editColumn('form_name', function ($instrument) {
                    return $instrument->form_name;
                })
                ->editColumn('category', function ($instrument) {
                    return $instrument->category;
                })
                ->editColumn('submission_count', function ($instrument) {
                    return $instrument->category;
                })
                ->editColumn('action', function ($instrument) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatPengisianInstrumen(' . $instrument->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pengurusan_instrumen.senarai_instrumen');
    }

    public function LihatDataInstrumen(Request $request){

        $filledform = FormSubmission::where('id', $request->id)->first();
        $data = NewForm::where('form_name', $filledform->form_name)->first();

        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $filledform->form_name;
        $category = $filledform->category;
        $insertone = false;
        $data = json_decode($filledform->data, true);
        $documents = json_decode($filledform->file_path, true);
        $id = $filledform->id;

        return view('pengurusan_instrumen.instrumen_dijawab.index', compact('arrays','insertone', 'form_name','category', 'data', 'documents', 'id'));
    }
}
