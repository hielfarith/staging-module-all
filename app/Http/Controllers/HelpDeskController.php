<?php

namespace App\Http\Controllers;
use App\Models\Helpdesk;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class HelpDeskController extends Controller
{
    /* public function index(Request $request)
    {
        if($request->ajax()) {
            $listOfHelpdesk = Helpdesk::orderBy('id');
            return Datatables::of($listOfHelpdesk)
                ->editColumn('ticketNum', function ($Helpdesk) {
                    return $Helpdesk->ticketNum;
                })
                ->editColumn('details', function ($Helpdesk) {
                    return $Helpdesk->details;
                })
                ->editColumn('reportedOn', function ($Helpdesk) {
                    return $Helpdesk->reportedOn;
                })
                ->editColumn('reportedBy', function ($Helpdesk) {
                    return $Helpdesk->reportedBy;
                })
                ->editColumn('status', function ($Helpdesk) {
                    return $Helpdesk->status;
                })
                ->make(true);
        }
        return view('helpdesk.index');
    }

    public function updateTicket()
    {

        return view('helpdesk.update-ticket');
    }
 */
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
