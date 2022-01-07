<?php

namespace App\Http\Controllers\hr;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\FinanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payroll;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        $emp=Employee::all();
        $pay=Payroll::select('f_name','l_name','users.email','tax_precentage','tax_amount','net_salary','deduction'
        ,'deduction_description','month_year','payrolls.created_at','status','pay_id')
         ->join('employees','employees.emp_id','payrolls.emp_id')
        ->join('users','users.id','payrolls.author')
        ->groupBy('payrolls.pay_id')
        ->orderBy('created_at','DESC')
        ->get();
        return view('admin.payroll.payroll',compact('emp','pay'));
    }

    public function show($id)
    {
        $emp=Employee::select('salary')->where('emp_id',$id)->get();
        $emp=$emp[0];
        return response()->json($emp);
    }
    public function store(Request $request)
    {
        $check=DB::table('payrolls')->where('emp_id',$request->employee)->where('month_year',$request->month)->get();
       
    if(empty($check[0]->pay_id)){
       
        $pay= new Payroll;
        $pay->author=Auth::id();
        $pay->emp_id=$request->employee;
        $pay->tax_precentage=$request->tax_precentage;
        $pay->tax_amount=$request->tax_amount;
        $pay->net_salary=$request->net_salary;
        $pay->deduction=$request->deduction;
        $pay->deduction_description=$request->deduction_description;
        $pay->month_year=$request->month;
        $pay->status='Pending';
        $pay->save();

        $fin= new FinanceLog();
        $fin->payment_type="Payroll paid to employee";
        $fin->bill_id=$pay->id;
        $fin->total=$request->net_salary;
        $fin->status="Pending";
        $fin->type="Expense";
        $fin->author=Auth::id();
        $fin->save();

        return response()->json(['notif'=>'Payroll successfully paid']);

    }else{
        return response()->json(['error'=>'Payroll of selected employee already paid']);
    }

    }
    public function status_change(Request $request)
    {
        Payroll::where('pay_id',$request->id)->update([
            'status'=>$request->status
        ]);
        return response()->json(['success'=>'Payroll status changed successfully']);

    }
}
