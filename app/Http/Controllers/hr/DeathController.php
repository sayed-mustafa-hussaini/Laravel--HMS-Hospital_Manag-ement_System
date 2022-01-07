<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PartialPaymentBilling;
use App\Models\Death;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeathController extends Controller
{
    public function index()
    {
        $death=Death::orderBy('created_at','DESC')->get();
        return view('admin.birth&DeathRecord.death',compact('death'));
    }

    public function store(Request $request)
    {
        $datavalidate=$request->validate([
            'patient_name'=>'required',
            'gender'=>'required',
            'death_date'=>'required',
            'guardian'=>'required',
        ]);
        if($datavalidate)
        {
            $birth=new Death;
            $birth->patient_name=$request->patient_name;
            $birth->gender=$request->gender;
            $birth->death_date=$request->death_date;
            $birth->guardian=$request->guardian;
            $birth->report=$request->report;
            $birth->user_id=Auth()->id();
            $birth->save();

            return response()->json(['success'=>'Death added successfully']);    
        }
    }

    public function edit($id)
    {
        $death=Death::find($id);
        return Response()->json($death);  
    }

    public function update(Request $request)
    {
        $datavalidate=$request->validate([
            'patient_name'=>'required',
            'gender'=>'required',
            'death_date'=>'required',
            'guardian'=>'required',
        ]);

        if($datavalidate)
        {
            $birth=Death::find($request->hidden_id);
            $birth->patient_name=$request->patient_name;
            $birth->gender=$request->gender;
            $birth->death_date=$request->death_date;
            $birth->guardian=$request->guardian;
            $birth->report=$request->report;
            $birth->save();

            return response()->json(['success'=>'Death updated successfully']);    
        }
    }

    public function destroy($id)
    {
        Death::find($id)->delete();
        return response()->json(['success'=>'Record successfully deleted']);  
    }

}
