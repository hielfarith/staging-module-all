<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class HelpDeskController extends Controller
{
    public function index(Request $request)
    {

        return view('helpdesk.index');
    }

    public function updateTicket(Request $request)
    {

        return view('helpdesk.update-ticket');
    }

    public function dashboard(Request $request)
    {
        return view('helpdesk.dashboard');
    }


    public function reportYearly(Request $request)
    {
        return view('helpdesk.report_yearly');
    }

    public function reportIssues(Request $request)
    {
        return view('helpdesk.report_issues');
    }

}
