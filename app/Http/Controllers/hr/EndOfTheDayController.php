<?php

namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\EndOfTheDay;
use Illuminate\Support\Facades\Auth;

class EndOfTheDayController extends Controller
{
    
    public function index()
    {
        $eod=EndOfTheDay::select('users.name as user_name','end_of_the_days.id','end_of_the_days.bill_number','end_of_the_days.user_id','end_of_the_days.total_expense','end_of_the_days.total_income','end_of_the_days.created_at','end_of_the_days.updated_at')
        ->join('users','users.id','end_of_the_days.user_id')->orderBy('created_at','DESC')->get();
        return view('admin.endoftheday',compact('eod'));
    }

    public function store(Request $request)
    {
        $datavalidate=$request->validate([
            'total_expense'=>'required',
            'total_income'=>'required',
        ]);
        if($datavalidate)
        {
            $eod=new EndOfTheDay();
            $eod->bill_number=$request->bill_number;
            $eod->user_id=Auth::id();
            $eod->total_expense=$request->total_expense;
            $eod->total_income=$request->total_income;
            $eod->save();
            $eod=EndOfTheDay::select('users.name as user_name','end_of_the_days.id','end_of_the_days.bill_number','end_of_the_days.user_id','end_of_the_days.total_expense','end_of_the_days.total_income','end_of_the_days.created_at','end_of_the_days.updated_at')
            ->join('users','users.id','end_of_the_days.user_id')->orderBy('created_at','DESC')->get();
            return response()->json(['success'=>'End Of The Day added successfully']); 
        }
    }

    public function update(Request $request)
    {
        $datavalidate=$request->validate([
            'total_expense'=>'required',
            'total_income'=>'required',
        ]);
        if($datavalidate)
        {
            $eod=EndOfTheDAy::find($request->hidden_id);
            $eod->bill_number=$request->bill_number;
            $eod->total_expense=$request->total_expense;
            $eod->total_income=$request->total_income;
            $eod->updated_at=now();
            $eod->save();
            return response()->json(['success'=>'End Of The Day updated successfully']);
        }
       
    }

    public function destroy($id)
    {
        EndOfTheDAy::find($id)->delete();
        return response()->json(['success'=>'Record successfully deleted']);    
    }

    public function show($id)
    {
        $eod=EndOfTheDAy::find($id)
        ->select('users.email',"end_of_the_days.*")
        ->join('users','users.id','end_of_the_days.user_id')->get();
        $a=$eod[0];


        $print='<div style="display:flex;margin-top: 20px">
        <div style="width:50%;text-align: left">
            <div class="form-group ">
                <label>Bill #: <strong id="bill_no1">'.$a->bill_number.'</strong></label>
            </div>
        </div>
        <div style="width: 50%;text-align:right">
            <div class="form-group float-right">
                <label>Date: <strong id="bill_date1">'.$a->created_at.'</strong></label>
            </div>
        </div>
    </div>
    <div class="row p-4 table-sm table " style="margin-top: 20px">
        <table class="printablea4" cellspacing="0" cellpadding="0" width="100%">
            <tbody>
                <tr>
                    <th>Author:</th>
                    <td width="20%"><label>'.$a->email.'</label></td>
                    <th width="20%">Total Expense:</th>
                    <td width="10%"><strong id="print_total_expense">'.$a->total_expense.'</strong></td>
                    <th width="20%">Total Income:</th>
                    <td width="10%"><strong id="print_total_income">'.$a->total_income.'</strong></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="row p-4" style="margin-top:20px">
        <div style="display:flex">
        <table class="printablea4 table" id="testreport" style="width:70%">
            <tbody>
                <tr>
                    <th width="20%">Issue By</th>
                    <td id="by">'.$a->email.'</td>

                </tr>
            </tbody>
        </table>
     
    </div>
    </div>';
    return response()->json($print);

    }
}
