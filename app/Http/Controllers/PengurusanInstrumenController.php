<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Models\FormSubmission;
use App\Models\NewForm;

class PengurusanInstrumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // View Borang Baru Tambah Instrumen
    public function TambahInstrumen() : View
    {
        return view('pengurusan_instrumen.tambah_instrumen');
    }

    public function LihatInstrumen(){
        return view('pengurusan_instrumen.lihat_instrumen');
    }

    // Sahkan Kategori Instrumen pada Borang Instrumen Baru
    public function SahkanKategoriInstrumen(Request $request) {
        $data = NewForm::where('category', $request->name)->where('form_name', $request->form_name)->first();

        if ($data) {
            return ['success' => false, 'message' => 'Nama Borang Telah Wujud', 'type' => $request->type];
        }
        return ['success' => true];
    }

    // Simpan Atribut pada Borang Instrumen Baru
    public function SimpanAtribut(Request $request)
    {
        $input = $request->input();
        $array['type'] = $request->input('type');
        $array['name'] = $request->input('name');
        $array['label'] = $request->input('label_name');
        $array['slot'] = explode(",", $request->input('options'));
        $insertone = true;
        return view('pengurusan_instrumen.jawab_instrumen.atribut_instrumen', compact('array', 'insertone'));
    }

    // Simpan Borang Instrumen Baru
    public function SimpanBorangInstrumen(Request $request) {
        $data = $request->input();
        $form = new NewForm();
        $form->form_name = $data['form_name'];
        $form->category = $data['category_name'];
        $form->type = 'ajax';
        $form->data = json_encode($data['form_data']);
        $form->save();

        return true;
    }

    // Pilih Borang Instrumen Untuk Dijawab
    public function PilihInstrumen() {
        $form = NewForm::select(['form_name', 'category'])->get();
        return view('pengurusan_instrumen.jawab_instrumen.pilih_instrumen', compact('form'));
    }

    // Pilih Borang Instrumen Untuk Dijawab
    public function SenaraiAtributInstrumen(Request $request)
    {
        $data = NewForm::where('form_name', $request->form_name)->first();
        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $data->form_name;
        $category = $data->category;
        $insertone = false;
        return view('pengurusan_instrumen.jawab_instrumen.atribut_instrumen', compact('arrays','insertone', 'form_name','category'));
    }

    // Simpan Maklumat Bagi Borang Instrumen yang Telah Dijawab
    public function SimpanInstrumenTelahDijawab(Request $request)
    {
        $inputData = $request->input();
        $inputFiles = $request->file();
        $formData = new FormSubmission;
        $formData->form_name = $inputData['form_name'];
        $formData->category = $inputData['category_name'];
        $formData->data = json_encode($inputData);
        $formData->json_data = json_encode($inputData);
        $path = [];
        if (count($inputFiles) > 0) {
            foreach ($inputFiles as $key => $value) {
                $filenameWithExt = $request->file($key)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($key)->getClientOriginalExtension();
                $fileNameToStore = $filename.'.'.$extension;
                $path[$key] = $request->file($key)->storeAs('public/uploads',$fileNameToStore);
            }
        }
        $formData->file_path = json_encode($path);

        if($formData->save()) {
            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }

    // View Senarai Borang Instrumen Telah Dijawab
    public function SenaraiInstrumenTelahDijawab(Request $request){

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

        return view('pengurusan_instrumen.instrumen_dijawab.senarai_telah_dijawab');
    }

    // View Data bagi Borang Instrumen yang Telah Dijawab
    public function LihatInstrumenDijawab(Request $request){

        $filledform = FormSubmission::where('id', $request->id)->first();
        $data = NewForm::where('form_name', $filledform->form_name)->first();

        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $filledform->form_name;
        $category = $filledform->category;
        $insertone = false;
        $data = json_decode($filledform->data, true);
        $documents = json_decode($filledform->file_path, true);
        $id = $filledform->id;

        return view('pengurusan_instrumen.instrumen_dijawab.atribut_telah_dijawab', compact('arrays','insertone', 'form_name','category', 'data', 'documents', 'id'));
    }

    // Muat Turun Fail yang Dimuatnaik Semasa Menjawab Instrumen
    public function MuatTurunFailDalamInstrumen($id, $name)
    {
        $filledform = FormSubmission::where('id', $id)->first();
        $documents = json_decode($filledform->file_path, true);
        $path = $documents[$name];
        $filePath = Storage::path($path);

        return response()->download($filePath);
    }
}
