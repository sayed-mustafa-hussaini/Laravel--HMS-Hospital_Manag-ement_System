@extends('layouts.admin')
@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            
            <a href="javascript:viod();" data-backdrop="static" data-toggle="modal" data-target="#create"
                class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New OPD</a>
            <a href="javascript:viod();" data-backdrop="static" data-toggle="modal" data-target="#createopdAppoinment"
                class="pull-right btn btn-primary d-inline mr-1"><i class="ti-plus"></i> &nbsp;Add OPD from Appoinments</a>
        </div>
        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PID</th>
                        <th>Patient </th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Docter</th>
                        <th>Author</th>
                        <th>Referral Person</th>
                        <th>Register Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($opd as $row)
                        <tr id="row{{ $row->opd_id }}">
                            <td>{{ $counter++ }}</td>
                            <td>{{ 'OPD-' . $row->patient_id }}</td>
                            <td>{{ $row->o_f_name.' '.$row->o_l_name }}</td>
                            <td>{{ $row->age }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->department_name }}</td>
                            <td>{{ $row->f_name . ' ' . $row->l_name }}</td>
                            
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->referral_person }}</td>
                            <td>{{ $row->created_at }}</td>

                            <td>
                                <a data-delete="{{ $row->opd_id }}"
                                    class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>

                                <a data-toggle="modal" data-target="#edit" data-id="{{ $row->opd_id }}"
                                    class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    <a 
                                        class="btn btn-primary btn-sm text-white mr-2 print"  
                                        data-patent="{{$row->o_f_name.' '.$row->o_l_name}}"
                                        data-age="{{$row->age}}"
                                        data-phone="{{$row->phone}}"
                                        data-no="{{'OPD-' . $row->patient_id}}"
                                        data-date="{{$row->created_at}}"
                                        data-department="{{$row->department_name}}" >Print
                                    </a>
                                    <a href="{{route('opd.show',$row->opd_id)}}" class="btn btn-success btn-sm text-white mr-2"  >Show</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div id="create" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Create OPD</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
            
                    <form method="post" class="p-3 createform1">
                        <div class="alert alert1 alert-danger">
                            <ul id="error"></ul>
                        </div>
                        <div class="form-group">
                            <label>Patient FirstName</label>
                            <input name="first_name" type="text" class="form-control" placeholder="First Name" >
                        </div>

                        <div class="form-group">
                            <label>Patient LastName</label>
                            <input name="last_name" type="text" class="form-control"  placeholder="Last Name" >
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input name="age" type="text" class="form-control age"placeholder="Age" >
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phone" type="text" class="form-control phone" placeholder="Phone number" >
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="" selected >select gender</option>
                                <option >Male</option>
                                <option >Female</option>
                                <option > Rather not say</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Date</label>
                            <input name="date" type="date" class="form-control "  placeholder="Date" >
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <select name="department" class="form-control deps">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $row)
                                    <option value="{{ $row->dep_id }}">{{ $row->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Docter</label>
                            <select name="docter"  class="form-control pos">
                                <option value="" selected disabled>Select Docter</option>
                            </select>
                        </div>
                
                        <div class="form-group">
                            <label class="form-label">Referral Person</label>
                            <input type="text" class="form-control" name="referral_person"  placeholder="Referral person..">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create OPD</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
   
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>
    <div id="createopdAppoinment" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Add OPD From Appoinments</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
           
                        <div class="d-flex p-3" style="justify-content: space-between">
                            <div class="foat-left">
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input check" name="example-radios" value="phone">
                                    <span class="custom-control-label">Serach Via phone Number</span>
                                </label>
                            </div>
                            <div >
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input check" name="example-radios" value="number">
                                    <span class="custom-control-label">Serach Via Appoinments Patient Number</span>
                                </label>
                            </div>
                        </div>

                       <form id="search1" class=" search_form d-none">
                        <div class="form-group p-3" id="phone">
                            <label>Phone Number</label>
                            <div class="input-group ">
                                <input type="text" name="phone_number" class="form-control phone"  required placeholder="Search for phone number...">
                                <input type="hidden" value="phone" name="phone">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Serach!</button>
                                </span>
                            </div>
                        </div>
                     </form>

                       <form  id="search2" class=" search_form d-none">
                        <div class="form-group p-3">
                            <label>Patient Number</label>
                            <div class="input-group " id="patient">
                                <input type="text" class="form-control" name="patient_number" required placeholder="Search for patient number...">
                                <input type="hidden" value="number" name="number">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary" type="button">Serach!</button>
                                </span>
                            </div>
                        </div>
                     </form>
                        
                        
                    <form method="post" class="createform1 p-3">
                        <div class="alert alert2 alert-danger">

                            <ul id="error"></ul>
                        </div>
                        <div class="form-group">
                            <label>Patient FirstName</label>
                            <input name="first_name" type="text" class="form-control" id="f_name" placeholder="First Name" readonly>
                        </div>

                        <div class="form-group">
                            <label>Patient LastName</label>
                            <input name="last_name" type="text" class="form-control" id="l_name" placeholder="Last Name" readonly>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input name="age" type="text" class="form-control age" id="age" placeholder="Age" readonly>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phone" type="text" class="form-control phone" id="phonee" placeholder="Phone number" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label>Date</label>
                            <input name="date" type="date" class="form-control " id="date"  placeholder="Date" readonly >
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <input  id="department" type="text" class="form-control" placeholder="Department" readonly>
                            <input name="department" id="dep_id" type="hidden">

                        </div>
                        <div class="form-group">
                            <label>Docter</label>
                            <input  id="docter" type="text" class="form-control" placeholder="Docter" readonly>
                            <input name="docter" id="doc_id" type="hidden">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="" selected >select gender</option>
                                <option >Male</option>
                                <option >Female</option>
                                <option > Rather not say</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create OPD</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>

    <div id="edit" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Edit OPD</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert3 alert-danger">
                        <ul id="error"></ul>
                    </div>

                    <form method="post" id="updateForm">
                        <div class="form-group">
                            <label>Patient FirstName</label>
                            <input name="first_name" type="text" class="form-control" placeholder="First Name" id="first_name1" >
                            <input type="hidden" id="opd_id" name="opd_id">
                        </div>

                        <div class="form-group">
                            <label>Patient LastName</label>
                            <input name="last_name" type="text" class="form-control"  placeholder="Last Name" id="last_name1" >
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input name="age" type="text" class="form-control age"placeholder="Age" id="age1" >
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input name="phone" type="text" class="form-control phone" placeholder="Phone number"  id="phone_number1">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" id="gender1">
                                <option value="" selected >select gender</option>
                                <option >Male</option>
                                <option >Female</option>
                                <option > Rather not say</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Date</label>
                            <input name="date" type="date" class="form-control "  placeholder="Date"  id="date1">
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <select name="department" class="form-control deps" id="department1">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $row)
                                    <option value="{{ $row->dep_id }}">{{ $row->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Docter</label>
                            <select name="docter"  class="form-control pos" id="docter1">
                                <option value="" selected disabled>Select Docter</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Referral Person </label>
                            <input type="text" class="form-control" name="referral_per"  placeholder="Referral person"  id="referral_person">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit OPD</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>

    <div id="print" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Print</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20" id="DivIdToPrint">
                   <div style="text-align: center"><img src="{{url('public/hlogo.png')}}" width="200" height="80" alt=""></div> 
                   <h4 style="text-align: center;margin-top:4px;margin-bottom:0px">Morwarid Medical Complex</h4>
                   <h4 style="text-align: center;margin-top:0px;">OPD</h4>
                <div style="text-align: center;">
                    <div style="height: 80px;border-bottom:1px solid black">
                        <div style=";color: #000; width: 48%;float: left;">   
                            <div style="text-align:left">
                                   <p>Patient Name : <strong id="p_reg-patient"></strong></p>
                                   <p>Age :<strong id="p_age"></strong></p>
                                   <p>Phone Number :<strong id="p_phone"></strong></p>
                               </div>
                            </div>
                            <div style="color: #000;width: 48%;float: right;">
                                <div style="text-align:left">
                                       <p>Register Date :<strong id="p_reg_date"></strong></p>
                                       <p>Department :<strong id="p_reg-dep"></strong></p>
                                       <p>Patient Register Number :<strong id="p_reg-no"></strong></p>

                                   </div>
                                </div>  
                    </div>
      
                 </div>
                 <div class="text-center" style="height:630px;border-bottom:1px solid black"><span style="margin-top:4px">Impotant Note:....</span></div>
                   <div style="height:105px;overflow: hidden;margin-top:4px">
                
                    <div style="color: #000;height: 400px; width: 48%;float: left;">   
                        <div style="">
                               <p>Address: Opposite Haji Sahib Gul Karim Center, Next to Tribal Directorate , 1st Zone, Professor Morwarid Safi Curative Hospital</p>
                               <p>Hospital No.:+93 78 55555 44</p>
                               <p>Ambulance Number: +93 74 55555 44</p>
                               <p>Email:info@pmsmedicalcomplex.com</p>
                               <p>https://pmsmedicalcomplex.com</p>
                           </div>
                        </div>
                        <div style="color: #000;height: 400px;width: 48%;float: right;text-align:right">
                            <div style="">
                                   <p> آدرس: قبایلو ریاست تر څنګ حاجی صیب ګل کریم مرکز ته مخامخ، اوله ناحیه ، پروفیسر مروارید صافی معالجوی روغتون</p>
                                   <p>0093 785555544:روغتون اړیکه</p>
                                   <p>0093 745555544:امبولانس اړیکه</p>
                                   <p>info@pmsmedicalcomplex.com :ایمیل ادرس</p>
                                   <p>https://pmsmedicalcomplex.com</p>
                               </div>
                            </div>  
                  </div> 
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- MODAL DIALOG -->
    </div>
@endsection
@section('directory')
    <li class="breadcrumb-item active" aria-current="page">OPD</li>
@endsection
@section('jquery')
    <script src="{{ asset('public/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script>
        var emp="";
    </script>

    <script>
        $('body').on('click','.print',function() {
          $('#p_reg-patient').html( $(this).attr('data-patent'));
          $('#p_age').html($(this).attr('data-age'));
          $('#p_phone').html($(this).attr('data-phone'));
          $('#p_reg_date').html($(this).attr('data-date'));
          $('#p_reg-dep').html( $(this).attr('data-department'));
          $('#p_reg-no').html($(this).attr('data-no'));
          $('#print').modal('show');
        });
        $('#print').on('shown.bs.modal', function () {
            printDiv();
            $('#print').modal('hide');
        });
        function printDiv() {
            var divToPrint=document.getElementById('DivIdToPrint');
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><style>@media print { body{hight: 100%;}}p, ul, ol {margin:0px}</style></head> <body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            newWin.document.close();
            setTimeout(function(){newWin.close();},10);
            }

      
    </script>
    
    <script>
        $(document).ready(function() {
            $('.phone').inputmask('(0)-999-999-999');
            $('.age').inputmask('99');
        });
        $(document).ready(function() {
           $('.check').change(function() {
            if($(this).val()=="number"){
                $('#search2').removeClass('d-none');
                $('#search1').addClass('d-none');
            }else{
                $('#search1').removeClass('d-none');
                $('#search2').addClass('d-none');
            }
           });
        });
        $('.search_form').submit(function(e) {
            $('.alert').css('display','none');
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '@php echo csrf_token() @endphp'}});
            $.ajax({
                url: '{{ url("app_serach") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                 if(data != ""){
                    $('#f_name').val(data[0].p_f_name);
                    $('#l_name').val(data[0].p_l_name);
                    $('#phonee').val(data[0].appphone);
                    $('#age').val(data[0].apage);
                    $('#department').val(data[0].department_name);
                    $('#date').val(data[0].appdate);
                    $('#docter').val(data[0].f_name+' '+data[0].l_name);
                    $('#doc_id').val(data[0].emp_id);
                    $('#dep_id').val(data[0].dep_id);                   

                 }else{
                     $('.alert').css('display','block');
                     $(".alert").find("ul").html('<li>No record found !</li>');
                    $("#createform1")[0].reset();
                 }
                },
                error: function(data) {
                  
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

    <script>
        $('#example').DataTable();
        $('.alert').hide();

    </script>
    <script>
        $(".createform1").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '@php echo csrf_token() @endphp ' }});
            $.ajax({
                url: '{{ url("opd") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table').load(document.URL + ' .table');
                    $('#create').modal('hide');
                    $('#createform1')[0].reset();
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });
                },
                error: function(data) {
                    $(".alert").find("ul").html('');
                    if($('#create').hasClass('show')==true){
                        $(".alert1").css('display', 'block');
                    }else{
                        $(".alert2").css('display', 'block');
                    }
                    $.each(data.responseJSON.errors, function(key, value) {
                        $(".alert").find("ul").append('<li>' + value + '</li>');
                    });
                    $('.modal').animate({
                        scrollTop: 0
                    }, '500');

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $('.deps').change(function() {
            id = ($(this).val());
            url = '{{ url('appoinments_get_position') }}/' + id;
            var Hdata = "";
            $.ajax({
                type: 'get',
                url: url,
                success: function(data) {
                    if (data != '') {
                        Hdata = '<option value="" selected disabled>Select Docter</option>';
                        for (var i = 0; i < data.length; i++) {
                            Hdata += '<option value="' + data[i].emp_id + '">' + data[i]
                                .f_name + ' ' + data[i]
                                .l_name + '</option>';
                            $(".pos").html(Hdata);
                        }
                        if(emp != ""){
                            $(".pos").val(emp).trigger('change');
                        }
                    } else {
                        $(".pos").html(
                            '<option value="" selected disabled>No Record Found</option>');
                    }
                },
                error: function() {}
            })

        });

        $('body').on('click','.edit',function() {
            $.ajax({
                type: 'get',
                url: '{{ url("opd") }}/'+$(this).attr('data-id')+'/'+'edit',
                success: function(data) {
                        $('#first_name1').val(data.o_f_name);
                        $('#last_name1').val(data.o_l_name);
                        $('#age1').val(data.age);
                        $('#phone_number1').val(data.phone);
                        $('#date1').val(data.date);
                        $('#gender1').val(data.gender);
                        $('#department1').val(data.dep_id).trigger('change');
                        $('#opd_id').val(data.opd_id);
                        $('#referral_person').val(data.referral_person);
                        console.log(data.referral_person);

                        if(data.emp_id != ""){
                            emp=data.emp_id;
                        }
                },
                error: function() {}
            })

        });
        $("#updateForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '@php echo csrf_token() @endphp ' }});
            $.ajax({
                url: '{{ url("opd_update") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table').load(document.URL + ' .table');
                    $('#edit').modal('hide');
                    $('#updateForm')[0].reset();
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });
                },
                error: function(data) {
                    $(".alert3").css('display', 'block');

                    $.each(data.responseJSON.errors, function(key, value) {
                        $(".alert").find("ul").append('<li>' + value + '</li>');
                    });
                    $('.modal').animate({
                        scrollTop: 0
                    }, '500');

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });


$('body').on('click','.delete',function(){  
var id=$(this).attr('data-delete');
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.value) {
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': '@php echo csrf_token() @endphp ' }});
            $.ajax({
                    type:'DELETE',
                    url:'{{url("opd")}}/'+id,
                    success:function(data){ 
                    Swal.fire(
                      'Deleted!',
                      'Your recorde has been deleted.',
                      'success'
                    )
                    $('#row'+id).hide(1500);
                    },
                    error:function(error){
                    Swal.fire(
                      'Faild!',
                      'Opd record has related data first delete related data',
                      'error'
                    )
                    }
                });
            }
          })
              
});
    </script>
  
@endsection
