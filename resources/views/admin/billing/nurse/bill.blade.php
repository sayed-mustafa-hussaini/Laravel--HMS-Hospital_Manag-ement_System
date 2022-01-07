@extends('layouts.admin')

@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_nurseBill--create')))
                <a href="javascript:viod();" data-toggle="modal" data-target="#createdept"
                    class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Generate Bill</a>
            @endif
        </div>
        <div class="mt-5 tables table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer table-main"
                id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bill No</th>
                        <th>Employee</th>
                        <th>Patient Name</th>
                        <th>Author</th>
                        <th>Issue Date</th>
                        <th>Fees</th>
                        <th>Description</th>
                        @if (!empty(Helper::getpermission('_nurseBill--edit')) || !empty(Helper::getpermission('_nurseBill--delete')))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($bill as $row)
                        <tr id="row{{ $row->nurse_bill_id }}">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $row->bill_number }}</td>
                            <td>{{ $row->f_name . ' ' . $row->l_name }}</td>
                            <td>{{ $row->patient_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->fees }}</td>
                            <td> @if (!empty($row->description)){{$row->description}} @else {{'N/A'}} @endif</td>
                            
                            @if (!empty(Helper::getpermission('_nurseBill--edit')) || !empty(Helper::getpermission('_nurseBill--delete')))
                                <td>
                                    @if (!empty(Helper::getpermission('_nurseBill--edit')))
                                        <a data-toggle="modal" data-target="#print_modal"
                                            class="btn btn-success btn-sm text-white mr-2 print_slip " 
                                            data-by="{{$row->email}}" data-bill="{{ $row->bill_number }}"
                                            data-docter="{{ $row->f_name . ' ' . $row->l_name }}"
                                            data-patient="{{ $row->patient_name}}"
                                            data-fees="{{ $row->fees}}"
                                            data-description="@if(!empty($row->description)){{$row->description}} @else{{'N/A'}}@endif"
                                            data-date="{{ $row->date }}">Print Bill</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_nurseBill--delete')))
                                        <a data-delete="{{ $row->nurse_bill_id }}"
                                            class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_nurseBill--edit')))
                                        <a data-toggle="modal" data-target="#edit_modal" data-id="{{ $row->nurse_bill_id }}"
                                            class="btn btn-info btn-sm text-white mr-2 edit_bills">Edit</a>
                                    @endif
                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div id="createdept" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Generate Bill</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert-danger">
                        <ul id="error"></ul>
                    </div>

                    <form method="post" id="createform">
                        <div class="form-group billll">
                            <label>Bill Number</label>
                            <input type="text" readonly name="bill_number" class="form-control" value="@php $max=helper::getnurseBillNo()@endphp {{ $max }}">
                        </div>
                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Patient Name">
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <select name="department" class="form-control deps">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $item)
                                    <option value="{{ $item->dep_id }}">{{ $item->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Employee</label>
                            <select name="employee" class="form-control pos">
                                <option value="" selected disabled>Select</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Issue date</label>
                            <input type="date" class="form-control" name="issue_date">
                        </div>
                        <div class="form-group">
                            <label>Fees</label>
                            <input type="number" class="form-control" name="fees" placeholder="Fees">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary float-left">Generate</button>
                        </div>
                    </form>

                </div><!-- modal-body -->


            </div>
        </div><!-- MODAL DIALOG -->
    </div>
    <div id="edit_modal" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title"> Edit Bill</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert-danger">
                        <ul id="error"></ul>
                    </div>

                    <form method="post" id="editform">
                        <div class="form-group">
                            <label>Bill Number</label>
                            <input type="text" readonly name="bill_number" class="form-control" id="bill1">
                            <input type="hidden" name="pay" id="pay">
                        </div>
                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" id="patient_name">
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <select name="department" class="form-control deps"  id="deps1">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $item)
                                    <option value="{{ $item->dep_id }}">{{ $item->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Employee</label>
                            <select name="employee" class="form-control pos">
                                <option value="" selected disabled>Select</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Issue date</label>
                            <input type="date" class="form-control" name="issue_date" id="issue_date1">
                        </div>
                        <div class="form-group">
                            <label>Fees</label>
                            <input type="number" class="form-control" name="fees" placeholder="Fees" id="fees1">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Description" id="description1"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary float-left">Update</button>

                        </div>
                    </form>

                </div><!-- modal-body -->


            </div>
        </div><!-- MODAL DIALOG -->
    </div>

    <div id="print_modal" class="modal fade" style="z-index:100000">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Edit Bill Medicine</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20" id="divtoprint">
                    <img src="{{ url('public/payslip.png') }}" width="100%" alt="">
                    <div style="display:flex;margin-top: 20px">
                        <div style="width:50%;text-align: left">
                            <div class="form-group ">
                                <label>Bill #: <strong id="bill_no1"></strong></label>
                            </div>
                        </div>
                        <div style="width: 50%;text-align:right">
                            <div class="form-group float-right">
                                <label>Date: <strong id="bill_date1"></strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-4 table-sm table " style="margin-top: 20px">
                        <table class="printablea4" cellspacing="0" cellpadding="0" width="100%">
                            <tbody>
                                <tr>

                                    <th>Employee Name:</th>
                                    <td ><small id="employee"></small></td>
                                    <th >Patient Name</th>
                                    <td ><small id="patient_name1"></small></td>
                                    <th >Description</th>
                                    <td ><small id="description134334"></small></td>
                                    
                                    <th >Fees</th>
                                    <td ><small id="fees11"></small></td>
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row p-4" style="margin-top:20px">
                        <div style="display:flex">
                        <table class="printablea4 table" id="testreport" style="width:70%">
                            <tbody>
                                <tr>
                                    <th width="20%">Issue By</th>
                                    <td id="by"></td>

                                </tr>
                            </tbody>
                        </table>
                        <table class="printablea4" style="width: 30%; float: right;">
                            <tbody>
                                <tr>
                                    <th>Total</th>
                                    <td id="totals1"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    {{-- <div class="d-flex" >
              <div >
                
            </div>
           </div> --}}


                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>
@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Nurse Bill</li>
@endsection

@section('jquery')
    <script src="{{ asset('public/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <script>
        $('#example').DataTable({
            dom: 'Blfrtip',
            "bLengthChange": false,
            "pageLength": 50,
            buttons: [{
                    extend: 'pdf',
                    footer: true,
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 8;
                        doc.defaultStyle.width = "100%";

                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6,7],
                    }
                },
                {
                    extend: 'print',
                    footer: false,
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6,7]
                    }
                },

            ],
        });
        $('.buttons-print, .buttons-pdf ,.buttons-colvis').addClass('btn btn-primary mr-1');
        $('.select2').select2({width: '100%',color: '#384364'});
        $(".alert").css('display', 'none');
    </script>

    <script>
        $('.deps').change(function() {
            id = ($(this).val());
            url = '{{ url('appoinments_get_position') }}/' + id;
            var Hdata = "";
            $.ajax({
                type: 'get',
                url: url,
                success: function(data) {
                    if (data != '') {
                        Hdata = '<option value="" selected disabled>Select employee</option>';
                        for (var i = 0; i < data.length; i++) {
                            Hdata += '<option value="' + data[i].emp_id + '">' + data[i]
                                .f_name + ' ' + data[i]
                                .l_name + '</option>';
                            $(".pos").html(Hdata);
                        }
                        if (emp != "") {
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

        $("#createform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '@php echo csrf_token() @endphp '
                }
            });
            $.ajax({
                url: "{{ url('nurse_bill') }}",
                type: 'POST',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table-main').load(document.URL + ' .table-main');
                    $('.billll').load(document.URL +  ' .billll');
                    $('#createdept').modal('hide');
                    $('#createform')[0].reset();
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

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $('body').on("click",'.edit_bills',function() {
            $.ajax({
                url: "{{ url('nurse_bill') }}/" + $(this).attr('data-id') + '/edit',
                type: 'get',
                success: function(data) {
                    $('#bill1').val(data.pay['bill_number']);
                    $('#deps1').val(data.dep[0]['dep_id']);
                    $('#patient_name').val(data.pay['patient_name']);
                    $('#issue_date1').val(data.pay['date']);
                    $('#fees1').val(data.pay['fees']);
                    $('#description1').val(data.pay['description']);
                  
                    
                    $('#deps1').change();
                    if (data.pay['emp_id'] != "") {
                        emp = data.pay['emp_id'];
                    }
                    $('#issue_date1').val(data.pay['date']);
                    $('#pay').val(data.pay['nurse_bill_id']);


                },
                error: function(data) {


                },
            });
        });

        $("#editform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '@php echo csrf_token() @endphp'
                }
            });
            $.ajax({
                url: "{{ url('nurse_bill_update') }}",
                type: 'POST',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table-main').load(document.URL + ' .table-main');
                    $('#edit_modal').modal('hide');
                    $('#editform')[0].reset();
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

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('body').on('click', '.delete', function() {
            var id = $(this).attr('data-delete');
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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '@php echo csrf_token() @endphp '
                        }
                    });
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ url('nurse_bill/') }}/' + id,
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('#row' + id).hide(1500);
                        },
                        error: function(error) {
                            Swal.fire(
                                'Faild!',
                                'Server Error',
                                'error'
                            )
                        }
                    });
                }
            })

        });

    </script>


    <script>
        $('body').on("click",'.print_slip',function() {
            $('.bill_id').val($(this).attr('data-id'));
            $('#bill_no1').html($(this).attr('data-bill'));

            $('#employee').html($(this).attr('data-docter'));
            $('#bill_date1').html($(this).attr('data-date'));

            $('#patient_name1').html($(this).attr('data-patient'));
            $('#description134334').html($(this).attr('data-description'));
            $('#fees11').html($(this).attr('data-fees'));

            $('#by').html($(this).attr('data-by'));
            $('#totals1').html($(this).attr('data-fees'));
        });
        $('#print_modal').on('shown.bs.modal', function() {
            printDiv();
            $('#print_modal').modal('hide');
        });
        function printDiv() {
            var divToPrint = document.getElementById('divtoprint');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(
                '<html><head><style>@media  print { body{hight: 100%;}}</style></head> <body onload="window.print()">' +
                divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        }

    </script>
@endsection
