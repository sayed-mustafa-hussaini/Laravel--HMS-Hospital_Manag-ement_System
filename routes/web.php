<?php

use Illuminate\Support\Facades\Route;
// use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
// use Illuminate\Support\Facades\Storage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/


Route::group(['middleware' => 'auth:sanctum','verified'], function () {
Route::group(['middleware' => ['verified']], function () {

 Route::get('/','HomeController@index');
// patients
Route::resource('patients','patient\PatientsController');
Route::post('patients_update','patient\PatientsController@update');
// end patients
// department
Route::resource('departments','hr\DepartmentsController');
Route::post('departments_update','hr\DepartmentsController@update');
// end department 

// // Position
// Route::resource('positions','hr\PositionController');
// Route::post('positions_update','hr\PositionController@update');
// // end Position 

// employee
Route::resource('employees','hr\EmployeeController');
Route::get('employees/create/option','hr\EmployeeController@regoption');
Route::get('employees/create/docter','hr\EmployeeController@docterCreate');


Route::post('employees_update','hr\EmployeeController@update');
Route::get('employees/doc/download/{id?}/{type?}','hr\EmployeeController@download');
// 
Route::resource('payroll','hr\payrollController');
Route::post('payroll_status','hr\payrollController@status_change');
Route::post('payroll_update','hr\payrollController@update');
// 

// appoinments
Route::resource('appoinments','patient\AppoinmentsController');
Route::get('appoinments_get_position/{id?}','patient\AppoinmentsController@getpostition');
Route::get('get_test_via_department/{id?}','patient\AppoinmentsController@get_test_dep');
Route::get('get_test_fee/{id?}','patient\AppoinmentsController@get_test_fee');

// room

// end

Route::get('getDocterFees/{id?}','patient\AppoinmentsController@getdocterfee');
Route::post('appoinments_update','patient\AppoinmentsController@update');
// appoinments

//opd
Route::resource('opd','patient\OpdController');
Route::post('opd_update','patient\OpdController@update');
Route::post('app_serach','patient\OpdController@serach');
Route::post('createRevisitRecord','patient\OpdController@revisitcreate');
Route::post('createtestRecord','patient\OpdController@testcreate');
Route::get('opdEditvisit/{id?}','patient\OpdController@getEditData');
Route::post('Updateopdvist','patient\OpdController@updateopdvisit');
Route::get('opdEdittest/{id?}','patient\OpdController@getTestEditData');
Route::post('Updateopdtest','patient\OpdController@updateopdtest');
// opd 
Route::resource('test','TestController');
Route::post('test_update','TestController@update');
// createRevisitRecord

// stock

// main Catagory pharmasi
Route::resource('medicines_cat','hr\PharmaMainCatagoryController');
Route::post('medicines_cat_update','hr\PharmaMainCatagoryController@update');
// main Catagory pharmasi

Route::resource('medicines','hr\MidicinesController');
Route::post('medicines_update','hr\MidicinesController@update');
Route::resource('purchase-mediciens','hr\PurchaseMidicinesController');
Route::get('medicineFiter/{id?}','hr\PurchaseMidicinesController@filter');
// 
// laboratory
Route::resource('lab-cat','hr\LabCatagoryController');
Route::post('lab_cat_update','hr\LabCatagoryController@update');


Route::resource('lab-materials','hr\LabMaterialController');
Route::resource('lab-purchase-materials','hr\PurchaselabMaterialController');
Route::post('materials_update','hr\PurchaselabMaterialController@update');

Route::get('material_filter/{id?}','hr\LabMaterialController@filter');


// suregery and delivery
Route::resource('surgery','hr\SurgeryController');
Route::post('surgery_update','hr\SurgeryController@update');

Route::resource('procedure','hr\ProcedureController');
Route::post('procedure_update','hr\ProcedureController@update');

Route::resource('surgery_registration','hr\patientOperationController');
Route::post('surgery_registration_update','hr\patientOperationController@update');
Route::get('operation_reg_docters/{dep_id?}/{type?}','hr\patientOperationController@docter_reg_operate');
//

// billing
// pharmacy
Route::resource('bill-pharmacy','hr\bill\PharmaBillController');
Route::post('bill-pharmacy_update','hr\bill\PharmaBillController@update');
Route::get('getMedicine_info/{id?}','hr\bill\PharmaBillController@getMedicine');
Route::post('pharmacy_add_medicine_bill','hr\bill\PharmaBillController@addmedicine_to_bill');
Route::get('bill_pharmacy_detail/{id?}','hr\bill\PharmaBillController@bill_pharmacy_detail');
Route::post('pharmacy-bill-discount','hr\bill\PharmaBillController@bill_pharmacy_discount');
Route::get('getMedicine_info_edit/{id?}','hr\bill\PharmaBillController@edit_medicine_info');
Route::post('pharmacy_update_medicine_bill','hr\bill\PharmaBillController@updatemedicine_to_bill');
Route::get('pharmacy_delete_medicine_bill/{id?}','hr\bill\PharmaBillController@deletemedicine_to_bill');
// end pharmacy


// laboratory
Route::resource('bill-lab','hr\bill\LabBillController');
Route::post('bill-lab_update','hr\bill\LabBillController@update');

Route::get('get_test_using_dep/{id?}','hr\bill\LabBillController@get_test_using_dep');
Route::get('gettest_info/{id?}','hr\bill\LabBillController@gettest_info');


Route::resource('bill_lab_info','hr\bill\LabBillInfoController');
Route::get('bill_lab_info_detail/{id?}','hr\bill\LabBillInfoController@bill_info_detail');
Route::get('getlab_info_edit/{id?}','hr\bill\LabBillInfoController@getlab_info_edit');

Route::post('lab_update_test_bill','hr\bill\LabBillInfoController@updatelab_info_edit');
Route::get('getsdocter/{id?}','hr\bill\LabBillController@getDocter');
Route::post('lab-bill-discount','hr\bill\LabBillController@discount');
// end lab

// room
Route::resource('room','setup\RoomController');
Route::post('room_update','setup\RoomController@update');

// end room
// admisssion
Route::resource('admission-bill',"hr\bill\AdmissionBillController");
Route::post('admission-bill_update',"hr\bill\AdmissionBillController@update");
Route::get('surger_data/{id?}',"hr\bill\AdmissionBillController@surgerygetdata");
Route::get('getRoomFees/{id?}','hr\bill\AdmissionBillController@getroomfees');
Route::post('add_room_to_bill','hr\bill\AdmissionBillController@addroomtobill');
Route::get('bill_add_info_detail/{id?}','hr\bill\AdmissionBillController@bill_info_detail');
Route::post('bill_add_charges','hr\bill\AdmissionBillController@bill_add_charges');
Route::post('bill_edit_charges','hr\bill\AdmissionBillController@bill_edit_charges');
Route::get('bill_edit_charges/edit/{id?}','hr\bill\AdmissionBillController@bill_edit_charges_edit');
Route::get('bill_delete_charges/{id?}','hr\bill\AdmissionBillController@bill_delete_charges');
Route::post('admission-bill-discount','hr\bill\AdmissionBillController@admission_discount');
// end admission
// overtime
Route::resource('over_time_payment','hr\bill\OvertimePayController');
Route::post('over_time_payment_update','hr\bill\OvertimePayController@update');
// end overtime
// nurse bill
Route::resource('nurse_bill','hr\bill\NurseBillController');
Route::post('nurse_bill_update','hr\bill\NurseBillController@update');
// end of nurse
// companyBill
Route::resource('medical_company_bill','hr\bill\CompanyBillController');
Route::post('medical_company_bill_update','hr\bill\CompanyBillController@update');
// endcompany
// finacial
Route::resource('finance/daily_expenses', 'finance\PettycashController');
Route::post('finance/daily_expenses_update', 'finance\PettycashController@update');
// 
// finacial statment
Route::get('finance/statment', 'finance\FinancialStatmentController@index');
Route::get('filter-financial-statment/{date?}', 'finance\FinancialStatmentController@filter');

// Route::post('finance/daily_expenses_update', 'finance\PettycashController@update');
// 

// Partial Payment Billing
Route::resource('partial-payment-billing', 'hr\PartialPaymentBillingController');
Route::get('partial-payment-billing/print/{id?}', 'hr\PartialPaymentBillingController@print');
Route::post('part_p_b_update','hr\PartialPaymentBillingController@update');
// 

// End Of The Day
Route::resource('end-of-the-day', 'hr\EndOfTheDayController');
Route::post('end-of-the-day_update','hr\EndOfTheDayController@update');
// 

// User Management===
Route::resource('users', 'hr\UserController');
Route::post('user_update', 'hr\UserController@update');
Route::post('resetPassword', 'hr\UserController@reset_password');
// Permissions
Route::resource('permissions', 'hr\PermissionsController');
Route::post('permissions_update', 'hr\PermissionsController@update');
// Roles
Route::resource('roles', 'hr\RolesController');
Route::post('roles_update','hr\RolesController@update');

// Birth & Death Record
// Birth Record
Route::resource('birth-record', 'hr\BirthController');
Route::post('birth-record_update','hr\BirthController@update');

    // Death Record
Route::resource('death-record', 'hr\DeathController');
Route::post('death-record_update','hr\DeathController@update');


// Blood Donation
Route::resource('blood-donation', 'hr\BloodDonationController');
Route::post('blood-donation_update','hr\BloodDonationController@update');



});
});




Route::get('index', function () {
    return view('admin.index');
});

Route::get('confirm', function () {
    return view('admin.confirm');
});