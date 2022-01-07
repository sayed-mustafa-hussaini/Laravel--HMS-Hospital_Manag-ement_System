<?php


namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PartialPaymentBilling;
use App\Models\BloodDonation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use App\Models\Birth;

class BloodDonationController extends Controller
{
    
    public function index(){
        $bloodDonation=BloodDonation::orderBy('created_at','DESC')->get();
        return view('admin.bloodDonation.index',compact('bloodDonation'));
    }

    public function store(Request $request)
    {
        $datavalidate=$request->validate([
            'receiver_name'=>'required',
            'receiver_phone'=>'required',
            'blood_group'=>'required',
            'gender'=>'required',
            'donor_name'=>'required',
            'donor_phone'=>'required',
            'blag_no'=>'required',
        ]);

        if($datavalidate)
        {
            $birth=new BloodDonation;
            $birth->receiver_name=$request->receiver_name;
            $birth->receiver_phone=$request->receiver_phone;
            $birth->blood_group=$request->blood_group;
            $birth->gender=$request->gender;
            $birth->donor_name=$request->donor_name;
            $birth->donor_phone=$request->donor_phone;
            $birth->blag_no=$request->blag_no;
            $birth->user_id=Auth()->id();
            $birth->save();

            return response()->json(['success'=>'blood Donation added successfully']);    
        }
    }

    public function edit($id)
    {
        $birth=BloodDonation::find($id);
        return Response()->json($birth);  
    }

    public function update(Request $request)
    {
        $datavalidate=$request->validate([
            'receiver_name'=>'required',
            'receiver_phone'=>'required',
            'blood_group'=>'required',
            'gender'=>'required',
            'donor_name'=>'required',
            'donor_phone'=>'required',
            'blag_no'=>'required',
        ]);

        if($datavalidate)
        {
            $birth=BloodDonation::find($request->hidden_id);
            $birth->receiver_name=$request->receiver_name;
            $birth->receiver_phone=$request->receiver_phone;
            $birth->blood_group=$request->blood_group;
            $birth->gender=$request->gender;
            $birth->donor_name=$request->donor_name;
            $birth->donor_phone=$request->donor_phone;
            $birth->blag_no=$request->blag_no;
            $birth->save();

            return response()->json(['success'=>'Blood Donation updated successfully']);    
        }
    }


    public function destroy($id)
    {
        BloodDonation::find($id)->delete();
        return response()->json(['success'=>'Record successfully deleted']);  
    }




}
