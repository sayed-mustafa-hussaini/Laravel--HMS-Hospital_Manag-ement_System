<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PartialPaymentBilling;
use App\Models\Birth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BirthController extends Controller
{

    public function index()
    {
        $birth=Birth::orderBy('created_at','DESC')->get();
        return view('admin.birth&DeathRecord.birth',compact('birth'));
    }

    public function store(Request $request)
    {
        $datavalidate=$request->validate([
            'child_name'=>'required',
            'gender'=>'required',
            'birth_date'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'phone_number'=>'required',
            'weight'=>'required',
        ]);
        if($datavalidate)
        {
            $birth=new Birth;
            $birth->child_name=$request->child_name;
            $birth->gender=$request->gender;
            $birth->birth_date=$request->birth_date;
            $birth->father_name=$request->father_name;
            $birth->mother_name=$request->mother_name;
            $birth->phone_number=$request->phone_number;
            $birth->weight=$request->weight;
            $birth->user_id=Auth()->id();
            $birth->save();

            return response()->json(['success'=>'Birth added successfully']);    
        }
    }

    public function edit($id)
    {
        $birth=Birth::find($id);
        return Response()->json($birth);  
    }

    public function update(Request $request)
    {
        $datavalidate=$request->validate([
            'child_name'=>'required',
            'gender'=>'required',
            'birth_date'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'phone_number'=>'required',
            'weight'=>'required',
        ]);
        if($datavalidate)
        {
            $birth=Birth::find($request->hidden_id);
            $birth->child_name=$request->child_name;
            $birth->gender=$request->gender;
            $birth->birth_date=$request->birth_date;
            $birth->father_name=$request->father_name;
            $birth->mother_name=$request->mother_name;
            $birth->phone_number=$request->phone_number;
            $birth->weight=$request->weight;
            $birth->save();

            return response()->json(['success'=>'Birth updated successfully']);    
        }
    }

    public function destroy($id)
    {
        Birth::find($id)->delete();
        return response()->json(['success'=>'Record successfully deleted']);  
    }
    
    
}
