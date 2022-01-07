<?php

namespace App\Http\Controllers\hr\bill;
use App\Http\Controllers\Controller;
use App\Models\LabBill;
use App\Models\patients;
use App\Models\Departments;
use App\Models\Employee;
use App\Models\FinanceLog;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LabBillController extends Controller
{
    public function index()
    {
        $bill=LabBill::
        select('department_name','discount','users.email','bill_no','total','patients.f_name as f','patients.l_name as l','employees.f_name as ef','employees.l_name as el','lab_bills.created_at as date','bill_id')
        ->join('departments','departments.dep_id','lab_bills.dep_id')
        ->join('patients','patients.patient_id','lab_bills.patient_id')
        ->join('employees','employees.emp_id','lab_bills.emp_id')
        ->join('users','users.id','lab_bills.author')
        ->groupBy('bill_id')
        ->orderBy('lab_bills.created_at','DESC')
        ->get();
        $patient=patients::all();
        $department=Departments::all();

       return view('admin.billing.laboratory.bill',compact('patient','department','bill'));
    }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'patient_name'=>'required',
            'bill_number'=>'required',
            'department'=>'required',
            'docter_name'=>'required'
        ]);
        if($validate){
            $bill=new LabBill;
            $bill->bill_no=$request->bill_number;
            $bill->patient_id=$request->patient_name;
            $bill->emp_id=$request->docter_name;
            $bill->dep_id=$request->department;
            $bill->note=$request->note;
            $bill->author=Auth::id();
            $bill->save();

            $fin= new FinanceLog();
            $fin->payment_type="Laboratory bill payment";
            $fin->bill_id=$bill->bill_id;
            $fin->total=null;
            $fin->status="Pending";
            $fin->author=Auth::id();
            $fin->save();
            
            return  response()->json(['success'=>'Lab Bill generated Successfully']);
        }
    }


    public function edit($id)
    {
        $lab=LabBill::find($id);
       return response()->json($lab);
    }

    public function update(Request $request)
    {
        $validate=$request->validate([
            'patient_name'=>'required',
            'bill_number'=>'required',
            'department'=>'required',
            'docter_name'=>'required'
        ]);
        if($validate){
            $bill=LabBill::find($request->bill_ids1234);
            $bill->patient_id=$request->patient_name;
            $bill->emp_id=$request->docter_name;
            $bill->dep_id=$request->department;
            $bill->note=$request->note;
            $bill->save();

            
            return  response()->json(['success'=>'Lab Bill updated Successfully']);
        }
        
    }

    function destroy($id)
    {
        LabBill::find($id)->delete();
    }
    public function get_test_using_dep($id)
    {
        $test=Test::where('dep_id',$id)->get();
        return response()->json($test);
    }

    public function gettest_info($id)
    {
        $test=Test::find($id)->fees;
        return response()->json($test);

    }

    public function getDocter($id)
    {
        $emp=Employee::where('dep_id',$id)->get();
        return response()->json($emp);
    }

    public function discount(Request $request)
    {
        $bill=LabBill::find($request->bill_id);
        $bill->discount=$request->discount;
        $bill->save();
        return  response()->json(['success'=>'Discount Add Successfully']);
    }
}
