@extends('layouts.admin')

@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_endOfTheDay--create')))
                <a href="javascript:viod();"  data-toggle="modal" data-target="#create"
                    class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New End Of The Day</a>
            @endif
        </div>
        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bill No</th>
                        <th>User Name</th>
                        <th>Total Expense</th>
                        <th>Total Income</th>
                        <th>Created Date</th>
                        @if (!empty(Helper::getpermission('_endOfTheDay--edit')) || !empty(Helper::getpermission('_endOfTheDay--delete')))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody >
                    @php $counter=1; @endphp
                    @foreach ($eod as $row)
                         <tr id="row{{$row->id}}" class="tbody123">
                            <td>{{$counter++ }}</td>
                            <td> {{ $row->bill_number }} </td>
                            <td> {{ $row->user_name }} </td>
                            <td> {{ $row->total_expense }} </td>
                            <td> {{ $row->total_income }} </td>
                            <td> {{ $row->created_at }} </td>

                            @if (!empty(Helper::getpermission('_endOfTheDay--edit')) || !empty(Helper::getpermission('_endOfTheDay--delete')))
                                <td>
                                    @if (!empty(Helper::getpermission('_endOfTheDay--edit')))
                                        <a data-id="{{$row->id}}" data-bill-number="{{$row->bill_number}}" data-total-expense="{{$row->total_expense}}" data-total-income="{{$row->total_income}}" data-bill-created_at="{{$row->created_at}}" data-toggle="modal" data-target="#print_modal" class="btn btn-success btn-sm text-white mr-2 reset">Print</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_endOfTheDay--delete')))
                                        <a data-delete="{{$row->id}}" class="btn btn-danger btn-sm text-white mr-2 user_delete">Delete</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_endOfTheDay--edit')))
                                        <a data-id="{{$row->id}}" data-bill-number="{{$row->bill_number}}" data-total-expense="{{$row->total_expense}}" data-total-income="{{$row->total_income}}"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    @endif
                                </td>
                            @endif
                 
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

{{-- Add User Modal  --}}
    <div id="create" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Add End Of The Day</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert1 alert-danger">
                        <ul id="error"></ul>
                    </div>
                    <form method="post" id="createform">
                        <div class="form-group" id="refresh1212">
                            <label>Bill Number</label>
                            <input name="bill_number" readonly type="text" class="form-control" value="<?php echo Helper::getEndOfTheDayBillNum() ?>" autocomplete="off" id="bill_num">
                        </div>
                        <div class="form-group mt-2">
                            <label>Total Expense</label>
                            <input name="total_expense" type="number" class="form-control" placeholder="Total expense"  autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Total Income</label>
                            <input name="total_income" type="number" class="form-control" placeholder="Total income"  autocomplete="off">
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="submit" class="btn btn-primary">Create End Of The Day</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>{{--End Add User Modal  --}}

    {{-- Edit User Modal  --}}
    <div id="edit" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Edit End Of The Day</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert1 alert-danger">
                        <ul id="error"></ul>
                    </div>
                    <form method="post" id="editform">
                        <div class="form-group">
                            <label>Bill Number</label>
                            <input name="bill_number" readonly type="text" class="form-control" value="" autocomplete="off" id="bill_number">
                        </div>
                        <div class="form-group mt-2">
                            <label>Total Expense</label>
                            <input name="total_expense" type="number" class="form-control" placeholder="Total expense"  autocomplete="off" id="total_expense">
                        </div>
                        <div class="form-group mt-2">
                            <label>Total Income</label>
                            <input name="total_income" type="number" class="form-control" placeholder="Total income"  autocomplete="off" id="total_income">
                        </div>
                        <div class="modal-footer mt-3">
                            <input type="hidden" name="hidden_id" value="" id="hidden_id">
                            <button type="submit" class="btn btn-primary">Update End Of The Day</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>{{--End Add User Modal  --}}

    


    <div id="print_modal" class="modal fade" style="z-index:100000">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">End Of The Day</h6>
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
                                    <th width="20%">User Name:</th>
                                    <td width="20%"><label id="print_user_name"></label></td>
                                    <th width="20%">Total Expense:</th>
                                    <td width="10%"><strong id="print_total_expense"></strong></td>
                                    <th width="20%">Total Income:</th>
                                    <td width="10%"><strong id="print_total_income"></strong></td>
                                    <th width="20%">Total Amount:</th>
                                    <td width="10%"><label id="print_total_amount"></label></td>
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
    <li class="breadcrumb-item active" aria-current="page">End Of The Day</li>
@endsection

@section('jquery')
    <script src="{{ asset('public/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js')}}"></script>
    <script src="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>

    <script>
        $('#example').DataTable();
        $(".alert").css('display','none');
        
        $("#createform").submit(function(e) {
            e.preventDefault();   
            var formData = new FormData(this);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
            $.ajax({
                url: "{{url('end-of-the-day')}}",
                type: 'POST',
                data: formData,
                success: function (data) {
                    $(".alert").css('display','none');
                    $('.table').load(document.URL +  ' .table');
                    $('#create').modal('hide');
                    $('#createform')[0].reset();
                    $('#refresh1212').load(document.URL +' #refresh1212'); 
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });  
                   
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



        $('body').on('click','.edit',function(){
            var id =$(this).attr('data-id');
            $('#hidden_id').val(id);
            $('#bill_number').val($(this).attr('data-bill-number'));
            $('#total_expense').val($(this).attr('data-total-expense'));
            $('#total_income').val($(this).attr('data-total-income'));;
        });
        $("#editform").submit(function(e) {
            e.preventDefault();   
            var formData = new FormData(this);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
            $.ajax({
                url:'{{url("end-of-the-day_update")}}',
                type: 'post',
                data: formData,
                success: function (data) {
                    $(".alert1").css('display','none');
                    $('.table').load(document.URL +  ' .table');
                    $('#edit').modal('hide');
                    $('#editform')[0].reset();
                    
                    return $.growl.notice({
                        message: data.success,
                        title: 'Success !',
                    });
                },
                error:function(data){
                    $(".alert1").find("ul").html('');
                    $(".alert1").css('display','block');
                $.each( data.responseJSON.errors, function( key, value ) {
                        $(".alert1").find("ul").append('<li>'+value+'</li>');
                    });     
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });


        // Delelte User
        $('body').on('click','.user_delete',function(){  
            var id =$(this).attr('data-delete');
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
                        url:'{{url("end-of-the-day")}}/'+id,
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
                        'Ooops, something wrong appended.',
                        'error'
                        )
                        }
                    });
                }
            })
              
        });
        

    </script>


    {{-- billing code --}}
    <script>
        $('body').on("click",'.print_slip',function() {
            $('.bill_id').val($(this).attr('data-id'));
            $('#bill_no1').html($(this).attr('data-bill'));

            $('#print_bill_number').html($(this).attr('data-bill-number'));
            $('#print_user_name').html($(this).attr('data-user_name'));
            
            $('#print_user_expense').html($(this).attr('data-total-expense'));

            $('#print_user_income').html($(this).attr('data-total-income'));
            $('#bill_date1').html($(this).attr('data-bill-created_at'));
            $('#total_amount').html($(this).attr('data-amount'));
            $('#by').html($(this).attr('data-by'));
            $('#totals1').html($(this).attr('data-amount'));
        });
        
        // $('#print_modal').on('shown.bs.modal', function() {
        //     printDiv();
        //     $('#print_modal').modal('hide');
        // });f
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