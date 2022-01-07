<?php

namespace App\Http\Controllers\hr\bill;
use App\Http\Controllers\Controller;
use App\Models\companyBill;
use App\Models\FinanceLog;
use App\Models\LabBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyBillController extends Controller
{
    public function index()
    {
        $bill=companyBill::join('users','users.id','company_bills.author')
        ->orderBy('company_bills.created_at','DESC')
        ->paginate(5);
        
        return view('admin.billing.medicalCompany.bill',compact('bill'));
    }

    public function store(Request $request)
    {
        $validate=$request->validate([
            'bill_number'=>'required',
            'company_name'=>'required',
            'paid_amount'=>'required',
            'due_amount'=>'required',
            'total_amount'=>'required',
            'issue_date'=>'required',
        ]);
        
        if($validate){
           $bill= new companyBill(); 
           $bill->bill_number=$request->bill_number;
           $bill->company_name=$request->company_name;
           $bill->date=$request->issue_date;
           $bill->description=$request->description;
           $bill->paid_amount=$request->paid_amount;
           $bill->due_amount=$request->due_amount;
           $bill->total=$request->total_amount;
           $bill->author=Auth::id();
           $bill->save();
           
           $fin= new FinanceLog();
           $fin->payment_type="Medical company bill payment";
           $fin->bill_id=$bill->company_bill_id;
           $fin->total=$request->paid_amount;
           $fin->status="Pending";
           $fin->type="Expense";
           $fin->author=Auth::id();
           $fin->save();
   
           return response()->json(['success'=>"Bill generated successfully"]);
        }
    }

    public function edit($id)
    {
        $bill=companyBill::find($id);
        return response()->json($bill);
        
    }

    public function update(Request $request)
    {
        $validate=$request->validate([
            'bill_number'=>'required',
            'company_name'=>'required',
            'paid_amount'=>'required',
            'due_amount'=>'required',
            'total_amount'=>'required',
            'issue_date'=>'required',
        ]);
        $bill=companyBill::find($request->pay);
        $bill->bill_number=$request->bill_number;
        $bill->company_name=$request->company_name;
        $bill->date=$request->issue_date;
        $bill->description=$request->description;
        $bill->paid_amount=$request->paid_amount;
        $bill->due_amount=$request->due_amount;
        $bill->total=$request->total_amount;
        $bill->save();

        $fin=FinanceLog::where('bill_id',$request->pay)
        ->where('payment_type','Medical company bill payment')
        ->update(['paid_amount'=>$request->paid_amount]);
  
        return response()->json(['success'=>"Bill update successfully"]);
    }
    public function destroy($id)
    {
        $bill=companyBill::find($id)->delete();
    }
}
