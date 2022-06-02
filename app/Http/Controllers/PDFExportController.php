<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Models\UserActivities;
use Illuminate\Http\Request;
use PDF;

class PDFExportController extends Controller
{
    public function viewPDF($id)
    {
        $userData = User::find($id);
        $userActivities = UserActivities::where('user_id', $id)
                                                ->with('applicants')
                                                ->latest()
                                                ->paginate(5);
        return view('PDF.convertPDF', compact('userData', 'userActivities'));             
    }
    public function viewPDFresume($id)
    {
        $applicant = Applicant::where('id', 'LIKE',$id)->get() ;
        return view('PDF.convertPDFresume', compact('applicant'));             
    }
    
    public function convertPDF($id)
    {
        $userData = User::find($id);
        $userActivities = UserActivities::where('user_id', $id)
                                                ->with('applicants')
                                                ->latest()
                                                ->paginate(5);

        $pdf_view = PDF::loadView('PDF.convertPDF', compact('userData', 'userActivities'));
        return $pdf_view->download('user.pdf');
    }


    public function convertPDFresume($id)
    {
        $applicant = Applicant::where('id', 'LIKE',$id)->get() ;
        $pdf_view = PDF::loadView('PDF.convertPDFresume', compact('applicant')); 
        return $pdf_view->download('user.pdf');
    }
}
