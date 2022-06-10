<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Models\UserActivities;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PDF;

class PDFExportController extends Controller
{
    // public function viewPDF($id)
    // {
    //     $userData = User::find($id);
    //     $userActivities = UserActivities::where('user_id', $id)
    //                                             ->with('applicants')
    //                                             ->latest()
    //                                             ->paginate(5);
    //     return view('PDF.convertPDF', compact('userData', 'userActivities'));             
    // }
    public function viewPDFresume($id)
    {
        $applicant = Applicant::where('id', 'LIKE',$id)->get() ;
        return view('PDF.convertPDFresume', compact('applicant'));             
    }
    
    // public function convertPDF($id)
    // {
    //     $userData = User::find($id);
    //     $userActivities = UserActivities::where('user_id', $id)
    //                                             ->with('applicants')
    //                                             ->latest()
    //                                             ->paginate(5);

    //     $pdf_view = FacadePdf::loadView('PDF.convertPDF', compact('userData', 'userActivities'));
    //     return $pdf_view->download('user.pdf');
    // }


    public function convertPDFresume($id)
    {
        $applicant = Applicant::where('id', 'LIKE',$id)->with('useractivities')->get();

        $applicant_data = Applicant::find($id);
        // $path = base_path('$applicant->photo');
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        //$pic = 'storage/';
        $exists = Storage::disk('public')->exists('storage/'.$applicant_data->photo);
   
        if($exists) {
            $content = Storage::get('/'.$applicant_data->photo);
            $mime = Storage::mimeType('/'.$applicant_data->photo);
            $response = Response::make($content, 200);
            $response->header("Content-Type", $mime);
            $pdf_view = PDF::loadView('PDF.convertPDFresume', compact('applicant'));  
       return $pdf_view->download("#SN$applicant_data->sn_number-$applicant_data->first_name $applicant_data->middle_name $applicant_data->last_name.pdf");
            return $response;
        } else {
            $pdf_view = PDF::loadView('PDF.convertPDFresume', compact('applicant'));  
       return $pdf_view->download("#SN$applicant_data->sn_number-$applicant_data->first_name $applicant_data->middle_name $applicant_data->last_name.pdf");
            return $this->getDefaultImage();
        }
        //return dd($pic);
        //$applicant = Applicant::where('id', 'LIKE',$id)->get() ;
       // $pdf_view = PDF::loadView('PDF.convertPDFresume', compact('applicant')); 
       //$domPDF = new Dompdf(['enabled_remote' => true]);
    //    $img_url = public_path('storage/'.$applicant_data->photo);
    //    return $img_url;
       $pdf_view = PDF::loadView('PDF.convertPDFresume', compact('applicant'));  
       return $pdf_view->download("#SN$applicant_data->sn_number-$applicant_data->first_name $applicant_data->middle_name $applicant_data->last_name.pdf");
    }

    protected function getDefaultImage()
    {
        $content = Storage::get('public/images/default.jpg');
        $mime = Storage::mimeType('public/images/default.jpg');
        $response = Response::make($content, 200);
        $response->header("Content-Type", $mime);
        return $response;
    }
}
