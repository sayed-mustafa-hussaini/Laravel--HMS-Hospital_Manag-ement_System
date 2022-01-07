<?php

namespace App\Http\Controllers\hr\bill;
use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\FinanceLog;
use App\Models\pharmaBill;
use App\Models\Pharma_Main_Catagory;
use App\Models\patients;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use App\Models\PurchaseMidicines;
use App\Models\Midicines;
use App\Models\pharmaBill_info;



class PharmaBillController extends Controller
{
    public function index()
    {
             
        $bill=pharmaBill::
        select('department_name','discount','users.email','bill_no','total','patients.f_name as f','patients.l_name as l','employees.f_name as ef','employees.l_name as el','pharma_bills.created_at as date','bill_id')
        ->join('departments','departments.dep_id','pharma_bills.dep_id')
        ->join('patients','patients.patient_id','pharma_bills.patient_id')
        ->join('employees','employees.emp_id','pharma_bills.emp_id')
        ->join('users','users.id','pharma_bills.author')
        ->groupBy('bill_id')
        ->orderBy('pharma_bills.created_at','DESC')
        ->get();
        $cat=Pharma_Main_Catagory::all();
        $patient=patients::all();
        $department=Departments::all();

       return view('admin.billing.pharmacy.bill',compact('cat','patient','department','bill'));
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
            $bill=new pharmaBill;
            $bill->bill_no=$request->bill_number;
            $bill->patient_id=$request->patient_name;
            $bill->emp_id=$request->docter_name;
            $bill->dep_id=$request->department;
            $bill->note=$request->note;
            $bill->author=Auth::id();
            $bill->save();
            // 					
            $fin= new FinanceLog();
            $fin->payment_type="Pharmacy bill payment";
            $fin->bill_id=$bill->bill_id;
            $fin->total=null;
            $fin->status="Pending";
            $fin->author=Auth::id();
            $fin->save();
            

            return  response()->json(['success'=>'Pharmacy Bill generated Successfully']);
        }
    }

    public function edit($id)
    {
        $bill=pharmaBill::find($id);
        return response()->json($bill);
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
            $bill=pharmaBill::find($request->bill_number_id);
            $bill->bill_no=$request->bill_number;
            $bill->patient_id=$request->patient_name;
            $bill->emp_id=$request->docter_name;
            $bill->dep_id=$request->department;
            $bill->note=$request->note;
            $bill->save();
            return  response()->json(['success'=>'Pharmacy Bill updated successfully']);
        }
    }
    public function destroy($id)
    {
        pharmaBill::find($id)->delete();
    }
    public function getMedicine($id)
    {
      $total=PurchaseMidicines::select(DB::raw('Sum(quantity)as quant'),
       DB::raw("(SELECT sale_price FROM purchase_midicines WHERE midi_id=1 ORDER by created_at DESC LIMIT 1)as sale_price"),
       DB::raw("(SELECT expiry_date FROM purchase_midicines WHERE midi_id=1 ORDER by created_at DESC LIMIT 1)as expiry_date"))
       ->where('midi_id',$id)
      ->orderBY('created_at','ASC')
      ->limit(1)
      ->get();

      $mid=Midicines::where('midi_id',$id)->sum('sold_quantity');
       $avaliable=$total[0]->quant-$mid;
     
       return Response()->json(array(
        'avaliable' => $avaliable,
        'total' => $total,
        ));   

    }
    public function addmedicine_to_bill(Request $request)
    {
       
       $datavalidate=$request->validate([
           'midicine_catagory'=>'required',
           'medicine'=>'required',
           'quantity'=>'required',
           'sale_price'=>'required',
           'midicine_catagory'=>'required',
           'amount'=>'required',
           'expiry_date'=>'required',
       ]);
        if($datavalidate){

          $info= new pharmaBill_info;
          $info->bill_id=$request->bill_id;
          $info->midi_id=$request->medicine;
          $info->expiry_date=$request->expiry_date;
          $info->quanitity=$request->quantity;
          $info->price=$request->sale_price;
          $info->total=$request->amount;
          $info->save();

          $fin=FinanceLog::where('bill_id',$request->bill_id)
          ->where('payment_type',"Pharmacy bill payment")->get();
           $total=$fin[0]->total+$request->amount;
          $fin=FinanceLog::where('bill_id',$request->bill_id)
          ->where('payment_type',"Pharmacy bill payment")
          ->update(['status'=>'Paid','total'=>$total]);

          $mid=Midicines::find($request->medicine);
          $mid->sold_quantity+=(int)$request->quantity;

          $mid->save();
          return  response()->json(['success'=>'Medicine Added to Bill Successfully']);
        }
    }
    
    public function bill_pharmacy_detail($id)
    {
     $info=pharmaBill_info::select('midicines.medicine_name','pharma_bill_infos.*')
        ->join('midicines','midicines.midi_id','pharma_bill_infos.midi_id')
        ->where('bill_id',$id)->get();

        $discount=pharmaBill::find($id)->discount;
        $totals=pharmaBill_info::where('bill_id',$id)->sum('total');


        return Response()->json(array(
            'info' => $info,
            'totals' => $totals,
            'discount'=>$discount,
        ));   

    }

    public function bill_pharmacy_discount(Request $request)
    {
        $bill=pharmaBill::find($request->bill_id);
        $bill->discount=$request->discount;
        $bill->save();
        return  response()->json(['success'=>'Discount Add Successfully']);
    }
    public function edit_medicine_info($id)
    {
        $info=pharmaBill_info::find($id);
        $quant=PurchaseMidicines::select(DB::raw('Sum(quantity)as quant'))->where('midi_id',$info->midi_id)->orderBY('created_at','DESC')->get();
        $mid_cat=Midicines::find($info->midi_id)->ph_main_cat_id;
        $sold=Midicines::find($info->midi_id)->sold_quantity;
        $avaliable=$quant[0]->quant-$sold;
      
        return Response()->json(array(
            'info' => $info,
            'mid_cat' => $mid_cat,
            'avaliable' => $avaliable,

        ));      
    }

    public function updatemedicine_to_bill(Request $request)
    {
        $datavalidate=$request->validate([
            'midicine_catagory'=>'required',
            'medicine'=>'required',
            'quantity'=>'required',
            'sale_price'=>'required',
            'midicine_catagory'=>'required',
            'amount'=>'required',
            'expiry_date'=>'required',
        ]);
        if($datavalidate){
          
          $info=pharmaBill_info::find($request->bill_id);       
          //   finance
          $bi=pharmaBill::where('bill_id',$info->bill_id)->get();
          $fin=FinanceLog::where('bill_id',$bi[0]->bill_id)->where('payment_type',"Pharmacy bill payment")->get();
          $f=$fin[0]->total-$info->total;
          $total=$f+$request->amount;
         $fin=FinanceLog::where('bill_id',$bi[0]->bill_id)->where('payment_type',"Pharmacy bill payment")
         ->update(['total'=>$total]);
        // endfinance
          
          $mid=Midicines::find($request->medicine);
          $total=$mid->sold_quantity-$info->quanitity;
          $mid->sold_quantity =$total;
          $mid->save();
          $info->midi_id=$request->medicine;
          $info->expiry_date=$request->expiry_date;
          $info->quanitity=$request->quantity;
          $info->price=$request->sale_price;
          $info->total=$request->amount;
          $info->save();
         
      

          $mid1=Midicines::find($request->medicine);
          $mid1->sold_quantity +=(int)$request->quantity;
          $mid1->save();
          return  response()->json(['success'=>'Bill Medicine updated Successfully']);

        }
    }
    public function deletemedicine_to_bill($id)
    {
        $pharm=pharmaBill_info::find($id);
        
        $mid=Midicines::find($pharm->midi_id);
        $total=$mid->sold_quantity-$pharm->quanitity;
        $mid->sold_quantity =$total;
        $mid->save();

    
        $pharm->delete();

    }

}
