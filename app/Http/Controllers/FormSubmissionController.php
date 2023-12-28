<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\FormSubmission;
use App\Models\NewForm;
use DeveloperUnijaya\FlowManagementFunction\Models\Module;
use DeveloperUnijaya\FlowManagementFunction\Models\ModuleStatus;
use DeveloperUnijaya\FlowManagementFunction\Facades\FMF;

use Illuminate\Support\Facades\Storage;

class FormSubmissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index() : View
    {
        return view('form.index');
    }

    public function inputdata(Request $request)
    {
        $input = $request->input();
        $array['type'] = $request->input('type');
        $array['name'] = $request->input('name');
        $array['label'] = $request->input('label_name');
        $array['slot'] = explode(";", $request->input('options'));
        $insertone = true;
        return view('form.input', compact('array', 'insertone'));
    }

    public function saveform(Request $request) {
        $data = $request->input();
        $form = new NewForm();
        dd($data);
        
        $form->form_name = $data['form_name'];
        $form->category = $data['category_name'];
        $form->type = 'Ajax'; 
        $form->data = json_encode($data['form_data']);
        $form->save();
        return ['success' => true];
    }

    public function checkname(Request $request) {
        $data = NewForm::where('category', $request->name)->where('form_name', $request->form_name)->first();
        if ($data) {
            return ['success' => false, 'message' => 'name exist', 'type' => $request->type];
        }
        
        return ['success' => true];
    }

    public function fillform() {
        $canFill = FMF::checkPermission(1, 1, 'fill form');
        $form = NewForm::select(['form_name', 'category'])->get();
        return view('form.fill', compact('form'));
    }

    public function chooseForm(Request $request)
    {
        $data = NewForm::where('form_name', $request->form_name)->first();
        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $data->form_name;
        $category = $data->category;
        $insertone = false;
        return view('form.input', compact('arrays','insertone', 'form_name','category'));
    }

    public function formSubmit(Request $request)
    {
        $inputData = $request->input();
        $inputFiles = $request->file();
        $formData = new FormSubmission;
        $formData->form_name = $inputData['form_name'];
        $formData->category = $inputData['category_name'];
        $formData->data = json_encode($inputData);
        $formData->json_data = json_encode($inputData);
        $formData->status = 3;
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

    public function listFillForm() {
        $listForms = FormSubmission::get();
        return view('form.list',compact('listForms'));
    }

    public function viewform(Request $request) {
        $filledform = FormSubmission::where('id', $request->id)->first();
        $data = NewForm::where('form_name', $filledform->form_name)->first();
        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $filledform->form_name;
        $category = $filledform->category;
        $insertone = false;
        $data = json_decode($filledform->data, true);
        $documents = json_decode($filledform->file_path, true);
        $id = $filledform->id;
        $canView = FMF::checkPermission(1, $filledform->status, 'form view');
        $canVerify = FMF::checkPermission(1, $filledform->status, 'verify form');
        $canApprove = FMF::checkPermission(1, $filledform->status, 'approve form');
        return view('form.viewfilledform', compact('arrays','insertone', 'form_name','category', 'data', 'documents', 'id','canView','canVerify','canApprove', 'filledform'));
    }
    
    public function download($id, $name)
    {
        $filledform = FormSubmission::where('id', $id)->first();
        $documents = json_decode($filledform->file_path, true);
        $path = $documents[$name];
        $filePath = Storage::path($path);

        return response()->download($filePath);
    }

    public function showDynamicFormList(Request $request) {
        $forms = NewForm::all();
        return view('form.show-dynamic-form-list', compact('forms'));
    }

    public function viewFormInput(Request $request) {
        $data = NewForm::where('id', $request->id)->first();
        $arrays = json_decode(json_decode($data->data), true);
        $form_name = $data->form_name;
        $category = $data->category;
        $insertone = false;
        $id = $data->id;
        $documents= '';
        return view('form.viewfilledform', compact('arrays','insertone', 'form_name','category', 'data', 'documents', 'id'));

        return view();   
    }

    public function verify(Request $request) {
        $formStatus = $request->status;
        $id = $request->formid;
        $data = FormSubmission::where('id', $id)->first();
        $data->status = $formStatus;
        
        return ['success' => $data->save()];
    }
}
