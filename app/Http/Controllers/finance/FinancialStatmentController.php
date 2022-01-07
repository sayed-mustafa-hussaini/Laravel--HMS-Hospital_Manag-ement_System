<?php

namespace App\Http\Controllers\finance;
use App\Http\Controllers\Controller;
use App\Models\FinanceLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class FinancialStatmentController extends Controller
{
    public function index()
    { 

     $statment=FinanceLog::select('users.email','finance_logs.*')
     ->join('users','users.id','finance_logs.author')
     ->whereMonth('finance_logs.created_at',Date('m'))
     ->orderBy('finance_logs.created_at',"DESC")->paginate(50);

     $totalEx=FinanceLog::select('finance_logs.*')
     ->whereMonth('finance_logs.created_at',Date('m'))
     ->where('finance_logs.type','Expense')
     ->sum('total');
     
     $totalin=FinanceLog::select('finance_logs.*')
     ->whereMonth('finance_logs.created_at',Date('m'))
     ->where('finance_logs.type',null)
     ->sum('total');

    return view('admin.finance.financial_statment',compact('statment','totalin','totalEx'));
    }
    public function filter(Request $request)
    {
        $date=explode('-',$request->date);
        $date1=$date[0];
        $date2=$date[1];
        
        $start = Carbon::parse($date1)->startOfDay();  
        $end = Carbon::parse($date2)->endOfDay();
        $d="salam";


      $statment=FinanceLog::whereBetween('finance_logs.created_at', [$start, $end])
      ->join('users','users.id','finance_logs.author')->get();
      
      $totalEx=FinanceLog::select('finance_logs.*')
      ->whereBetween('finance_logs.created_at', [$start, $end])
      ->where('finance_logs.type','Expense')
      ->sum('total');
      
      $totalin=FinanceLog::select('finance_logs.*')
      ->whereBetween('finance_logs.created_at', [$start, $end])
      ->where('finance_logs.type',null)
      ->sum('total');
      return view('admin.finance.financial_statment',compact('statment','totalin','totalEx','d'));
        
    }
   
}
