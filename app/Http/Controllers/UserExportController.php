<?php

namespace App\Http\Controllers;

use App\Exports\UserActivity;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class UserExportController extends Controller
{
    public function export()
    {
        return (new UsersExport)->download('applicant.xlsx');
    }

    public function exportActivities(Excel $excel)
    {
        return $excel->download(new UserActivity, 'userActivities.pdf', Excel::DOMPDF);
    }
}
