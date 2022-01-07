<?php

namespace App\Http\Controllers\hr\bill;
use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Employee;
use App\Models\FinanceLog;
use App\Models\NurseBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseBillController extends Controller
{
    public function index()
    {
        $dep=Departments::all();
        
        $bill=NurseBill::join('employees','nurse_bills.emp_id','employees.emp_id')
        ->select('users.email','employees.f_name','employees.l_name','nurse_bills.*')
        ->join('users','users.id','nurse_bills.author')
        ->OrderBy('nurse_bills.created_at','DESC')->get();

        return view('admin.billing.nurse.bill',compact('dep','bill'));
    }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'bill_number'=>'required',
            'patient_name'=>'required',
            'department'=>'required',
            'employee'=>'required',
            'issue_date'=>'required',
            'fees'=>'required',
        ]);
        if($validate){
          $nurse= new NurseBill();
          $nurse->bill_number=$request->bill_number;
          $nurse->patient_name=$request->patient_name;
          $nurse->emp_id=$request->employee;
          $nurse->fees=$request->fees;
          $nurse->date=$request->issue_date;
          $nurse->description=$request->description;
          $nurse->author=Auth::id();
          $nurse->save();

          $fin= new FinanceLog();
          $fin->payment_type="Nurse bill payment";
          $fin->bill_id=$nurse->nurse_bill_id;
          $fin->total=$request->fees;
          $fin->status="Paid";
          $fin->author=Auth::id();
          $fin->save();
          
          

        return  response()->json(['success'=>'Bill generated successfully']);
        }                	
    }
    public function edit($id)
    {
        $pay=NurseBill::find($id);
        $dep=Employee::find($pay->emp_id)->select('dep_id')->get();

        return Response()->json(array(
            'pay' => $pay,
            'dep' => $dep,
        ));
    }

    public function update(Request $request)
    {
        $validate=$request->validate([
            'bill_number'=>'required',
            'patient_name'=>'required',
            'department'=>'required',
            'employee'=>'required',
            'issue_date'=>'required',
            'fees'=>'required',
        ]);
        $nurse=NurseBill::find($request->pay);

        $fin=FinanceLog::where('bill_id',$nurse->nurse_bill_id)
        ->where('payment_type',"Nurse bill payment")
        ->get();
        
        $f=(int)$fin[0]->total-(int)$nurse->fees;
        $total1=$f+$request->fees;
        
        FinanceLog::where('bill_id',$nurse->nurse_bill_id)
        ->where('payment_type',"Nurse bill payment")
        ->update(['total'=>$total1]);


        $nurse->bill_number=$request->bill_number;
        $nurse->patient_name=$request->patient_name;
        $nurse->emp_id=$request->employee;
        $nurse->fees=$request->fees;
        $nurse->date=$request->issue_date;
        $nurse->description=$request->description;
        $nurse->save();

        return  response()->json(['success'=>'Bill updated successfully']);

    }
    public function destroy($id)
    {
        NurseBill::find($id)->delete();
    }
}
