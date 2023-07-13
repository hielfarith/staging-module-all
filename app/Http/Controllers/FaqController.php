<?php

namespace App\Http\Controllers;

use App\Models\Master\MasterFaqType;
use App\Models\Other\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $faqs = Faq::paginate(20);

        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        $MasterFaqType = MasterFaqType::all();
        $FaqLang = Faq::all()->unique('lang')->pluck('lang');
        return view('admin.faq.create', compact('MasterFaqType', 'FaqLang'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'faq_type_id' => 'required|numeric',
            'lang' => 'required|string',
        ]);

        $fill = $request->only(['question', 'answer', 'faq_type_id', 'lang']);
        $Faq = Faq::create($fill);
        session()->put('success', 'Successfully created Faq');

        return redirect()->route('faq.index');
    }

    public function show(Request $request, $id)
    {
        $faq = Faq::find($id);
        $MasterFaqType = MasterFaqType::all();
        $FaqLang = Faq::all()->unique('lang')->pluck('lang');
        return view('admin.faq.show', compact('faq', 'MasterFaqType', 'FaqLang'));
    }

    public function edit(Request $request, $id)
    {
        $faq = Faq::find($id);
        $MasterFaqType = MasterFaqType::all();
        $FaqLang = Faq::all()->unique('lang')->pluck('lang');
        return view('admin.faq.edit', compact('faq', 'MasterFaqType', 'FaqLang'));
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
            'faq_type_id' => 'required|numeric',
            'lang' => 'required|string',
        ]);

        $fill = $request->only(['question', 'answer', 'faq_type_id', 'lang']);
        $Faq = Faq::find($id)->update($fill);
        session()->put('success', 'Successfully updated Faq');

        return redirect()->route('faq.index');
    }

    public function destroy(Request $request, $id)
    {
        Faq::find($id)->delete();
        session()->put('success', 'Successfully deleted Faq');

        return redirect()->route('faq.index');
    }
}
