   <?php
   
  	use App\Http\helpers as Helpers;
use App\Models\AdmissionBill;
use App\Models\AdmissionBill_info;
use App\Models\Appoinments;
use App\Models\companyBill;
use App\Models\EndOfTheDay;
use App\Models\PurchaselabMaterial;
use App\Models\PurchaseMidicines;
use App\Models\patientOperation;
use App\Models\pharmaBill;
use App\Models\pharmaBill_info;      
use App\Models\LabBill;
use App\Models\LabBill_info;
use App\Models\NurseBill;
use App\Models\OvertimePay;
use App\Models\PartialPaymentBilling;
use App\Models\User;
use Illuminate\Support\Facades\DB;
    use Composer\DependencyResolver\Request;

class Helper{
    
    public static function getappoinmentdata($emp_id,$date)
    {
      $app=Appoinments::
      join('users','users.id','appoinments.author')
      ->where('emp_id',$emp_id)
      ->where('date',$date)
      ->get();
      // dd($app);
      return $app;
    }
    // medicine
    public static function getmedicinequantity($id){
      $total=PurchaseMidicines::where('midi_id',$id)->sum('quantity');
      return $total;
    }
    public static function getmedicinesaleprice($id){
      $sale=PurchaseMidicines::select('sale_price')->where('midi_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($sale as $key => $item) {
      return $item;
    }
      
    }
    public static function getmedicinepurchaseprice($id){
      $purchase=PurchaseMidicines::select('purchase_price')->where('midi_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($purchase as $key => $item) {
      return $item;
    }
      
    }
    public static function getmedicineexpirydate($id){
      $expire=PurchaseMidicines::select('expiry_date')->where('midi_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($expire as $key => $item) {
      return $item;
    }
      
    }
   
  //lab 
    public static function getquantity($id){
      $total=PurchaselabMaterial::where('lab_m_id',$id)->sum('quantity');
      return $total;
    }
        public static function getlabsaleprice($id){
      $sale=PurchaselabMaterial::select('sale_price')->where('lab_m_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($sale as $key => $item) {
      return $item;
    }
      
    }
    public static function getlabpurchaseprice($id){
      $purchase=PurchaselabMaterial::select('purchase_price')->where('lab_m_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($purchase as $key => $item) {
      return $item;
    }
      
    }
    public static function getlabexpirydate($id){
      $expire=PurchaselabMaterial::select('expiry_date')->where('lab_m_id',$id)->orderBy('created_at','DESC')->limit(1)->get();
    
      foreach ($expire as $key => $item) {
      return $item;
    }
      
    }

    public static function getsurgery($id)
    {
      $patient=patientOperation::select('surgery_name')
      ->join('surgeries','patient_operations.surgery_id','surgeries.surgery_id')
      ->where('patient_s_del_pro_id',$id)->get();
      return $patient;
    }
    public static function getprocedure($id)
    {
      $patient=patientOperation::select('procedure_name')

      ->join('procedures','patient_operations.procedure_id','procedures.procedure_id')
      ->where('patient_s_del_pro_id',$id)->get();
      return $patient;
    }

    public static function getpharmacyBillNo()
    {
      $billNo=pharmaBill::select(DB::raw('MAX(bill_no)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }
    public static function getlabBillNo()
    {
      $billNo=LabBill::select(DB::raw('MAX(bill_no)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }

    

    public static function getTotalpharmacyBill($id)
    {
      $total=pharmaBill_info::where('bill_id',$id)->sum('total');
      return  $total;
    }
    
    public static function getTotallabBill($id)
    {
      $total=LabBill_info::where('bill_id',$id)->sum('total');
      return  $total;
    }
    
    public static function getadmissionBillNo()
    {
      $billNo=AdmissionBill::select(DB::raw('MAX(bill_number)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }
    public static function getadmissionBill_total($id)
    {
      $total=AdmissionBill_info::where('admission_id',$id)->sum('amount');
      return $total;
    }


    public static function getovertimeBillNo()
    {      
      $billNo=OvertimePay::select(DB::raw('MAX(bill_number)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }

    public static function getnurseBillNo()
    {
      $billNo=NurseBill::select(DB::raw('MAX(bill_number)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }
    public static function getcompanyBillNo()
    {
      $billNo=companyBill::select(DB::raw('MAX(bill_number)as max'))->get();
      $bill=$billNo[0]->max;
      return $bill+1;
    }
    public static function getBillNum(){
      $billNum=PartialPaymentBilling::select(DB::raw('Max(bill_number) as max'))->get();
       $billNum=$billNum[0]->max;
       return $billNum+1;
    }

        // End Of The Day Helper
    public static function getEndOfTheDayBillNum(){
      $billNum=EndOfTheDay::select(DB::raw('Max(bill_number) as max'))->get();
        $billNum=$billNum[0]->max;
        return $billNum+1;
    }

    // permission
    public static function getroles($id){
      $roles=DB::table('role_has_permissions')
      ->join('permissions','permissions.id','role_has_permissions.permission_id')
      ->where('role_id',$id)->get();
      return $roles;
    }

    public static function getNameRole($id){
      $role_name=DB::table('role_has_permissions')->select('roles.name')
      ->join('roles','roles.id','role_has_permissions.role_id')->where('role_id',$id)->get();
      return $role_name;
    }


    public static function getpermission($access_key){
      $role_id = auth()->user()->role_id;
      $value='';
      $permission= DB::table('role_has_permissions')
      ->join('permissions','permissions.id','role_has_permissions.permission_id')
      ->select('name')
      ->where('role_id',$role_id)->get();
      
      foreach($permission as $key){
        if($key->name== $access_key){
          return $value=$key->name;
        }
      }
      return $value='';
    }
    // Birth
    public static function getBirthAuthor($id){
      $user=User::find($id);
      return $user->email;
    }


    
  }