@extends('layouts.admin')
@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/time/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/time/jquery.timepicker.css') }}" rel="stylesheet" />



@endsection
@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_birth--create')))
                <a href="javascript:viod();" data-backdrop="static" data-toggle="modal" data-target="#create"
                    class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New Birth</a>
            @endif
        </div>

        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Child Name</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Mother Name</th>
                        <th>Father Name</th>
                        <th>Phone Number</th>
                        <th>Weight</th>
                        <th>Author</th>
                        <th>Created Date</th>
                        @if (!empty(Helper::getpermission('_birth--delete')) || !empty(Helper::getpermission('_birth--edit')))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($birth as $row)
                        <tr id="row{{ $row->id }}">
                            <td >{{$counter++}}</td>
                            <td> {{$row->child_name}} </td>
                            <td style="text-transform:capitalize"> 
                                @if ($row->gender=="rather")
                                    Rather not say
                                @else
                                    {{$row->gender}}
                                @endif     
                            </td>
                            <td> {{$row->birth_date}} </td>
                            <td> {{$row->mother_name}} </td>
                            <td> {{$row->father_name}} </td>
                            <td> {{$row->phone_number}} </td>
                            <td>  {{$row->weight}} GR</td>
                            <td>
                                @php echo Helper::getBirthAuthor($row->user_id); @endphp
                            </td>
                            <td> {{$row->created_at}} </td>

                            @if (!empty(Helper::getpermission('_birth--delete')) || !empty(Helper::getpermission('_birth--edit')))
                                <td>
                                    @if (!empty(Helper::getpermission('_birth--edit')))
                                        <a  data-print="" class="btn btn-success btn-sm text-white mr-2 print_slip"  data-toggle="modal" data-target="#print_modal" >Print</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_birth--delete')))
                                        <a  data-id="{{$row->id}}" class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_birth--edit')))
                                        <a data-toggle="modal" data-target="#edit" data-id="{{$row->id}}"  class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    @endif
                                </td>
                            @endif
                            
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
                    <h6 class="modal-title">Add Birth</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert  alert-danger">
                        <ul id="error"></ul>
                    </div>
                    <form method="post" id="createform">
                        <div class="form-group mt-2" id="refresh1212">
                            <label>Child Name</label>
                            <input type="text"  name="child_name" class="form-control" placeholder="Child name">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="" selected >select gender</option>
                                <option value="male" >Male</option>
                                <option value="female" >Female</option>
                                <option value="rather" > Rather not say</option>
                            </select>
                        </div>
                        <div class="form-group  mt-2">
                            <label>Birth Date</label>
                            <input name="birth_date" type="date" class="form-control" placeholder="Birth date">
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Mother Name</label>
                                    <input name="mother_name" type="text" class="form-control" placeholder="Mother name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Father Name</label>
                                    <input name="father_name" type="text" class="form-control" placeholder="Father name">
                                </div>
                            </div>
                          </div>

                          <div class="form-row mt-2">
                                <label>Phone Number</label>
                                <input name="phone_number" type="text" class="form-control phone" placeholder="Phone number">
                          </div>

                        <div class="form-group mt-2">
                            <label>Weight</label>
                            <input name="weight" type="number" class="form-control" placeholder="Weight">
                        </div>
                        
                        <div class="modal-footer  mt-2">
                            <button type="submit" class="btn btn-primary">Create Birth</button>
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
                    <h6 class="modal-title">Edit Birth</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pd-20">
                    <div class="alert alert1 alert-danger">
                        <ul id="error"></ul>
                    </div>

                    <form method="post" id="editform">
                        <div class="form-group mt-2" id="refresh1212">
                            <label>Child Name</label>
                            <input type="text"  name="child_name" class="form-control" placeholder="Child name" id="child_name">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option value="" selected >select gender</option>
                                <option value="male" >Male</option>
                                <option value="female" >Female</option>
                                <option value="rather" > Rather not say</option>
                            </select>
                        </div>
                        <div class="form-group  mt-2">
                            <label>Birth Date</label>
                            <input name="birth_date" type="date" class="form-control" placeholder="Birth date" id="birth_date">
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Mother Name</label>
                                    <input name="mother_name" type="text" class="form-control" placeholder="Mother name" id="mother_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Father Name</label>
                                    <input name="father_name" type="text" class="form-control" placeholder="Father name" id="father_name">
                                </div>
                            </div>
                          </div>

                          <div class="form-row mt-2">
                                <label>Phone Number</label>
                                <input name="phone_number" type="text" class="form-control phone" placeholder="Phone number" id="phone_number">
                          </div>

                        <div class="form-group mt-2">
                            <label>Weight</label>
                            <input name="weight" type="number" class="form-control" placeholder="Weight" id="weight">
                        </div>

                        <div class="modal-footer  mt-2">
                            <input type="hidden" name="hidden_id" id="hidden_id">
                            <button type="submit" class="btn btn-primary">Update Birth</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->

            </div>
        </div><!-- MODAL DIALOG -->
    </div>


    {{-- Print Modal --}}
    <div id="print_modal" class="modal fade" style="z-index:100000">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Birth</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="divtoprint">
                    <img src="{{ url('public/payslip.png') }}" width="100%" alt="">
                    
    
                    <div class="form-group mt-2" id="refresh1212">
                        <label>Bill Number</label>
                        <input type="hidden" readonly  name="bill_number" value="" id="print_bill_number_hidden">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label>Doctor Full Name</label>
                                <input name="doctor_name" type="text" class="form-control" placeholder="Full Name" id="print_doctor_name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Doctor Phone Number</label>
                                <input name="doctor_phone" type="text" class="form-control phone" placeholder="Phone number" id="print_doctor_phone">
                            </div>
                        </div>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label>Patient Full Name</label>
                                <input name="patient_name" type="text" class="form-control" placeholder="Full Name" id="print_patient_name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Doctor Phone Number</label>
                                <input name="patient_phone" type="text" class="form-control phone" placeholder="Phone number" id="print_patient_phone">
                            </div>
                        </div>
                      </div>

                    <div class="form-group mt-2">
                        <label>Department</label>
                        <input name="department" type="text" class="form-control" placeholder="Department" id="print_department">
                    </div>
                    <div class="form-group  mt-2">
                        <label>Date</label>
                        <input name="date" type="date" class="form-control" placeholder="Date" id="date">
                    </div>
                    <div class="form-group  mt-2">
                        <label>Services Charges</label>
                        <input name="services_charges" type="number" class="form-control" placeholder="Services charges" id="print_services_charges">
                    </div>
                    <div class="form-group  mt-2">
                        <label>Facility Charges</label>
                        <input name="facility_charges" type="number" class="form-control" placeholder="Facility charges" id="print_facility_charges">
                    </div>
                    <div class="form-group  mt-2" >
                        <label>Description</label>
                        <textarea name="description" class="form-control"  rows="4" placeholder="Write Description" id="print_description"></textarea>
                    </div>

                    <div class="modal-footer  mt-2">
                        <input type="hidden" name="hidden_id" id="print_hidden_id">
                        <button type="submit" class="btn btn-primary">Update Partial Bill</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
        


                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>




@endsection
@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Birth Record</li>
@endsection
@section('jquery')
    <script src="{{ asset('public/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/assets/time/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/assets/time/jquery.timepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.phone').inputmask('(0)-999-999-999');
        });
        $('#example').DataTable();
        $('.alert').hide();
    </script>

    <script>

        $("#createform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '@php echo csrf_token() @endphp '
                }
            });
            $.ajax({
                url: '{{ url("birth-record") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table').load(document.URL + ' .table');
                    $('#create').modal('hide');
                    $('#createform')[0].reset();
                    $('#refresh1212').load(document.URL +' #refresh1212'); 
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });
                },
                error: function(data) {
                    $(".alert").find("ul").html('');
                    $(".alert").css('display', 'block');
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


        $('body').on('click', '.edit', function() {
            id = $(this).attr('data-id');
            url = '{{ url("birth-record") }}' + '/' + id + '/' + "edit";
            $.get(url, function(data) {
                $('#child_name').val(data.child_name);
                $('#gender').val(data.gender);
                $('#birth_date').val(data.birth_date);
                $('#father_name').val(data.father_name);
                $('#mother_name').val(data.mother_name);                  
                $('#phone_number').val(data.phone_number);
                $('#weight').val(data.weight);
               
                $('#hidden_id').val(data.id);
                
            });
        });

        $("#editform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '@php echo csrf_token() @endphp '
                }
            });
            $.ajax({
                url: '{{ url("birth-record_update") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                    $(".alert1").css('display', 'none');
                    $('.table').load(document.URL + ' .table');
                    $('#edit').modal('hide');
                    $('#editform')[0].reset();
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });
                },
                error: function(data) {
                    $(".alert1").find("ul").html('');
                    $(".alert1").css('display', 'block');
                    $.each(data.responseJSON.errors, function(key, value) {
                        $(".alert1").find("ul").append('<li>' + value + '</li>');
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
        var id =$(this).attr('data-id');
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
                $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  

            $.ajax({
                    type:'DELETE',
                    url:'{{url("birth-record")}}/'+id,
                    type:'Delete',
                    success:function(data){ 
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                    $('#row'+id).hide(1500);
                    },
                    error:function(error){
                    Swal.fire(
                      'Faild!',
                      'Birth has related data first delete departments data',
                      'error'
                        )
                    }
                 });
                }
            })
              
        });


        // print code

        // $('body').on("click",'.print_slip',function() {
        //     id = $(this).attr('data-print');
        //     url = '{{ url("partial-payment-billing") }}' + '/' + id + '/' + "edit";
        //     $.get(url, function(data) {
        //         console.log(data);
        //         $('#print_doctor_name').val(data.doctor_name);
        //         $('#print_bill_number').val(data.bill_number);
        //         $('#print_bill_number_hidden').val(data.bill_number);
        //         $('#print_doctor_phone').val(data.doctor_phone_number);
        //         $('#print_patient_name').val(data.patient_name);                  
        //         $('#print_patient_phone').val(data.patient_phone_number);
        //         $('#print_department').val(data.department);
        //         $('#print_date').val(data.date);
        //         $('#print_services_charges').val(data.services_charges);
        //         $('#print_facility_charges').val(data.facility_charges);
        //         $('#print_description').val(data.description);
        //         $('#print_hidden_id').val(data.id);
        //     });

        // });
        // $('#print_modal').on('shown.bs.modal', function() {
        //     printDiv();
        //     $('#print_modal').modal('hide');
        // });
        // function printDiv() {
        //     var divToPrint = document.getElementById('divtoprint');
        //     var newWin = window.open('', 'Print-Window');
        //     newWin.document.open();
        //     newWin.document.write(
        //         '<html><head><style>@media  print { body{hight: 100%;}}</style></head> <body onload="window.print()">' +
        //         divToPrint.innerHTML + '</body></html>');
        //     newWin.document.close();
        //     setTimeout(function() {
        //         newWin.close();
        //     }, 10);
        // }

    </script>
@endsection
