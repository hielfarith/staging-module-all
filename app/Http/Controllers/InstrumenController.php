<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Models\InstrumenSkpakSpksIkeps;

class InstrumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewForm(Request $request)
    {
        return view('instrumen_update.form');
    }

    public function saveSkpak(Request $request) {
         DB::beginTransaction();
        try {
           

            $input = $request->input();

            $input['status'] = 1;
            if (array_key_exists('instrumen_id', $input)) {
                $InstrumenSkpakSpksIkeps = InstrumenSkpakSpksIkeps::where('id', $input['instrumen_id'])->first();
                unset($input['instrumen_id']);
                $InstrumenSkpakSpksIkeps->update($input);
            } else {
                $InstrumenSkpakSpksIkeps = new InstrumenSkpakSpksIkeps;
                $InstrumenSkpakSpksIkeps->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist')]);
    }

    public function listInstrumenSkpak(Request $request)
    {
        if($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0);
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE' ,'%'.$request->input('nama_instrumen').'%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen','LIKE' ,'%'.$request->input('tujuan_instrumen').'%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen','LIKE' ,'%'.$request->input('pengguna_instrumen').'%');
            }
            return Datatables::of($instrumenList)
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatInstrumen('.$instrumenList->id.')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatInstrumenEdit('.$instrumenList->id.')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.list');
    }

    public function viewInstrumenSkpak(Request $request)
    {
        $instrumen = InstrumenSkpakSpksIkeps::where('id', $request->id)->first();
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }
        return view('instrumen_update.view-profile', compact('instrumen', 'readonly', 'disabled'));
    }
}
