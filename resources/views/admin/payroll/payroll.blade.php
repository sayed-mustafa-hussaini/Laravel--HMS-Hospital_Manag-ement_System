@extends('layouts.admin')
@section('css')
<link href="{{asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
<link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />


    
@endsection

@section('content')

<div class="card">
    <div class="ml-auto d-block  m-3">
        <div class="float-right btn-list ">
            @if (!empty(Helper::getpermission('_payroll--create')))
                <a data-toggle="modal" data-backdrop="static" data-target="#modal" class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Process Payroll</a>
            @endif
        </div>
    </div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table  table-sm " id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee FullName</th>
                    <th>Tax %</th>
                    <th>Tax</th>
                    <th>Net Salary</th>
                    <th>Deduction</th>
                    <th>Deduction Description</th>
                    <th>Year & Month</th>
                    <th>Author</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                    <th>Action</th>
               </tr>
            </thead>
            <tbody>
                @php $counter=1; @endphp
                @foreach ($pay as $row)
                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$row->f_name.' '.$row->l_name}}</td>
                    <td>{{$row->tax_precentage.'%'}}</td>
                    <td>{{$row->tax_amount}}</td>
                    <td>{{$row->net_salary}}</td>
                    <td>@if(empty($row->deduction)){{'N/A'}} @else{{$row->deduction}} @endif</td>
                    <td>@if(empty($row->deduction_description)) {{'N/A'}} @else {{$row->deduction_description}} @endif</td>
                    <td>{{$row->month_year}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->created_at}}</td>
                    <td> 
                        @if ($row->status=="Pending")
                        <span class="badge badge-danger">{{$row->status}}</span>
                        @else
                        <span class="badge badge-success">{{$row->status}}</span>    
                        @endif
                    </td>

                    <td>
                        @if (!empty(Helper::getpermission('_payroll--edit')))
                            <a href="javascript:void(0);" data-backdrop="static" data-target="#edit" data-toggle="modal" data-id="{{$row->pay_id}}" class="edit_pay"><i class="fa fa-pencil-square-o fa-lg" ></i></a>
                        @endif
                            <a href="javascript:void(0);"><i class="fa fa-trash-o fa-lg"></i><a>
                    </td>
                </tr>     
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- LARGE MODAL -->
<div id="modal" class="modal fade" >
	<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content h-100">
            <div class="modal-header pd-x-20">
				<h5 class="modal-title">Process Payroll</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="alert alert-danger"><ul id="error"></ul></div>
            <form  method="post" id="formpayroll">
                @csrf
          <div class="row mt-1 pl-4 pr-4">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Month</label>
                      <input type="month" name="month" class="form-control" id="month">
                  </div>
              </div>
              <div class="col-md-6 d-none" id="emp">
                <div class="form-group">
                    <label>Employee</label>
                    <select name="employee" class="form-control" id="employee">
                        <option value="" selected disabled>Select Employee</option>
                        @foreach ($emp as $item)
                        <option value="{{$item->emp_id}}">{{$item->f_name.' '.$item->l_name.' '.$item->position}}</option>                            
                        @endforeach
                    </select>
                </div>
              </div>
         </div>
         <div class="data d-none">
         <div class="row pl-4 pr-4">
             <div class="col-md-12">
                <div class="form-group">
                    <label>Basic Salary</label>
                       <input type="text" class="form-control " readonly name="basic_salary" id="basicsalary"> 
                </div>
             </div>
         </div>
         <div class="row pl-4 pr-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tax %</label>
                       <input type="text" class="form-control " readonly name="tax_precentage" id="tax_precentage">  
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label>Tax</label>
                       <input type="number" class="form-control " readonly name="tax_amount" id="tax_amount"> 
                </div>
             </div>
         </div>
         <div class="row pl-4 pr-4">
            <div class="col-md-12 ">
               <div class="form-group">
                   <label>Deduction</label>
                      <input type="number" class="form-control " name="deduction" id="deduction"> 
               </div>
            </div>
        </div>
        <div class="row pl-4 pr-4">
            <div class="col-md-12 ">
               <div class="form-group">
                   <label>Deduction Description</label>
                      <input type="text" class="form-control " name="deduction_description"> 
               </div>
            </div>
        </div>
         <div class="row pl-4 pr-4">
            <div class="col-md-12 ">
               <div class="form-group">
                   <label>Net Salary</label>
                      <input type="text" class="form-control " readonly name="net_salary" id="net_salary" min="0"> 
               </div>
            </div>
        </div>
        </div>
            <div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-primary" disabled="true">Process</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
        </form>
		</div>
	</div><!-- MODAL DIALOG -->
</div>


<!-- MESSAGE MODAL -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="example-Modal3">Payroll Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form  id="status_form">
			<div class="modal-body">
				<div class="form-group">
                    <label >Change Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="" selected disabled>Select Status</option>
                        <option value="Approve">Approve</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <input type="hidden" id="id" name="id">
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
        </form>
		</div>
	</div>
</div>
<!-- MESSAGE MODAL CLOSED -->

<!-- LARGE MODAL CLOSED -->

@endsection
@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Payroll</li>
@endsection

@section('jquery')
<script src="{{asset('public/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js')}}"></script>
<script src="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>


<script>
    var amount="";
	$('#example').DataTable();
    $('#month').change(function(){
        $('#emp').removeClass('d-none');
    });
    $('#employee').change(function() {
       var emp_id=$(this).val();
       $('#submit').attr('disabled',false);
       var tax="";
       var Taxamount="";
       $.ajax({
        url: "{{url('payroll')}}"+'/'+emp_id,
        type: 'get',
        success: function (data) {
            if(data.salary<5000){
                 tax=0;
            }else if(data.salary>5000 && data.salary<12500){
                tax=2;
            }else if(data.salary>12500 && data.salary<100000){
                tax=10;
            }
            else{
                tax=20;
            }
           Taxamount=data.salary*tax/100;
           amount=data.salary-Taxamount;
           $('.data').removeClass('d-none');
           $('#basicsalary').val(data.salary);           
           $('#tax_precentage').val(tax+'%');
           $('#tax_amount').val(Taxamount);
           $('#net_salary').val(amount);  
           $('#deduction').attr('max',amount);
                   
        },
        error:function(data){
  
        },
        cache: false,
        contentType: false,
        processData: false
    });
    });
    $('#deduction').keyup(function(event) {
        var ded=$(this).val();
        var net=$('#net_salary').val();
        var total=amount-ded;
        $('#net_salary').val(total);    
        if (event.keyCode == 8) {
        $('#net_salary').val(amount); 
        if(!ded==""){
            var total=amount-ded;
        }else{
            var total=amount;
        }
        $('#net_salary').val(total);    
        }   
    });
</script>
<script>
     $(".alert").css('display','none');
        $("#formpayroll").submit(function(e) {
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
        $.ajax({
            url: "{{url('payroll')}}",
            type: 'POST',
            data: formData,
            success: function (data) {
                if(!data.error==""){
                    $(".alert").find("ul").html('');
                    $(".alert").css('display','block');
                    $(".alert").find("ul").append('<li>'+data.error+'</li>');

                }else{
                $(".alert").css('display','none');
                $('.table').load(document.URL +  ' .table');
                $('#modal').modal('hide');
                $('#formpayroll')[0].reset();
                    return $.growl.notice({
                    message: data.notif,
                    title: 'Success !',
                });
                }
              
            },
            error:function(data){
                $(".alert").find("ul").html('');
                $(".alert").css('display','block');
            $.each( data.responseJSON.errors, function( key, value ) {
                    $(".alert").find("ul").append('<li>'+value+'</li>');
                });     
    
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<script>
$('.edit_pay').click(function() {
    $('#id').val($(this).attr('data-id'));   
});
$('#status').change(function() {
    $value=$(this).val();
      Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, Change it!'
          }).then((result) => {
              if (result.value) {
                $("#status_form").submit();
            }
          }) 
});
$("#status_form").submit(function(e) {
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
        $.ajax({
            url: "{{url('payroll_status')}}",
            type: 'POST',
            data: formData,
            success: function (data) {
                $(".alert").css('display','none');
                $('.table').load(document.URL +  ' .table');
                $('#edit').modal('hide');
                $('#status_form')[0].reset();
                
                Swal.fire(
                    'Successfull!',
                    'Payroll status changed successfully.',
                    'success'
                );
                    return $.growl.notice({
                    message: data.success,
                    title: 'Success !',
                });
            },
            error:function(data){
        
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
@endsection