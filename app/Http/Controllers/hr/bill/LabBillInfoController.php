<?php

namespace App\Http\Controllers\hr\bill;
use App\Http\Controllers\Controller;
use App\Models\FinanceLog;
use App\Models\LabBill;
use App\Models\LabBill_info;
use Illuminate\Http\Request;

class LabBillInfoController extends Controller
{
    
    public function store(Request $request)
    {
        $datavalidate=$request->validate([
            'department'=>'required',
            'test'=>'required',
            'amount'=>'required',
        ]);
         if($datavalidate){
            $bill= new LabBill_info;
            $bill->bill_id=$request->bill_id;
            $bill->test_id=$request->test;
            $bill->total=$request->amount;
            $bill->save();

            $fin=FinanceLog::where('bill_id',$request->bill_id)->where('payment_type',"Laboratory bill payment")->get();

            $total=$fin[0]->total+$request->amount;
           $fin=FinanceLog::where('bill_id',$request->bill_id)->where('payment_type',"Laboratory bill payment")
           ->update(['total'=>$total]);

          return  response()->json(['success'=>'Test added to bill successfully']);
        }   

    }

    public function bill_info_detail($id)
    {
        $info=LabBill_info::select('department_name','tests.test_type','lab_bill_infos.*')
        ->join('tests','tests.test_id','lab_bill_infos.test_id')
        ->join('departments','departments.dep_id','tests.dep_id')
        ->where('bill_id',$id)->get();
      
        $discount=LabBill::find($id)->discount;
        if($discount==null){
            $discount=0;
        }
        $totals=LabBill_info::where('bill_id',$id)->sum('total');

        return Response()->json(array(
            'info' => $info,
            'totals' => $totals,
            'discount'=>$discount,
        ));

    }

    public function getlab_info_edit($id)
    {
        $info=LabBill_info::select('lab_bills.dep_id','lab_bill_infos.*')->where('lab_bill_ifo_id',$id)
        ->join('lab_bills','lab_bills.bill_id','lab_bill_infos.bill_id')->groupBy('lab_bill_ifo_id')->get();
        return response()->json($info);

    }


    public function updatelab_info_edit(Request $request)
    {
        $datavalidate=$request->validate([
            'department'=>'required',
            'test'=>'required',
            'amount'=>'required',
        ]);
        if($datavalidate){
            $lab=LabBill_info::find($request->bill_ids);
              
            $fin=FinanceLog::where('bill_id',$lab->bill_id)
            ->where('payment_type',"Laboratory bill payment")
            ->get();
            
            $f=(int)$fin[0]->total-(int)$lab->total;
            $total1=$f+$request->amount;
            
            FinanceLog::where('bill_id',$lab->bill_id)
            ->where('payment_type',"Laboratory bill payment")
            ->update(['total'=>$total1]);
            // endfinance
          
            $lab=LabBill_info::find($request->bill_ids);
            $lab->test_id=$request->test;
            $lab->total=$request->amount;
            $lab->save();

            return  response()->json(['success'=>'bill edited successfully']);
          }  

        }
    
        public function destroy($id)
        {
            LabBill_info::find($id)->delete();
        }
}
