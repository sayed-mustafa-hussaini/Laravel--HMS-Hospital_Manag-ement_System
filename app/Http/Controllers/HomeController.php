<?php

namespace App\Http\Controllers;

use App\Models\Appoinments;
use App\Models\companyBill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{   
      $app=Appoinments::select('employees.f_name','employees.l_name','departments.department_name','date','appoinments.emp_id')
        ->join('employees','employees.emp_id','appoinments.emp_id')
        ->join('departments','departments.dep_id','appoinments.dep_id')
        ->where('date',date('y-m-d'))
        ->groupBy('employees.emp_id')
        ->orderBy('patient_id','DESC')->get();  

        return view('dashboard',compact('app'));
    }
}
