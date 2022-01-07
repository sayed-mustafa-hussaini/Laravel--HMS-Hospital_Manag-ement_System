@extends('layouts.admin')

@section('css')
<link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
<link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@endsection
@section('content')
<div class="card p-3">
    <div class="btn-list ">
        @if (!empty(Helper::getpermission('_surgery&Delivery--create')))
            <a href="javascript:viod();" data-toggle="modal" data-target="#createdept"
                class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New</a>
        @endif
    </div>
    <div class="mt-5 table-responsive">
        <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Patient Number</th>
                    <th>Departement</th>
                    <th>Docter</th>
                    <th>Operation type</th>
                    <th>Operation Name</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>referral_person</th>
                    <th>Created Date</th>
                    @if (!empty(Helper::getpermission('_surgery&Delivery--delete')) ||  (!empty(Helper::getpermission('_surgery&Delivery--edit'))) )
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $counter=1; @endphp
                @foreach ($operate as $row)
                    <tr id="row{{$row->procedure_id}}">
                        <td>{{ $counter++ }}</td>
                        <td>{{ $row->f_name.' '. $row->l_name }}</td>
                        <td>{{'p-'. $row->patient_idetify_number }}</td>
                        <td>{{ $row->department_name }}</td>
                        <td>{{$row->emp_f_name.' '.$row->emp_f_name}}</td>
                        <td>{{$row->type}}</td>
                        <td>
                            @if(!empty($row->surgery_id))
                            @php $surg=helper::getsurgery($row->patient_s_del_pro_id) @endphp
                            {{$surg[0]->surgery_name}}
                            @endif
                            @if (!empty($row->procedure_id))
                            @php $proc=helper::getprocedure($row->patient_s_del_pro_id) @endphp
                            {{$proc[0]->procedure_name}}
                            @endif
                            @if (empty($row->surgery_id) || empty($row->procedure_id))
                                {{'Normal Delivery'}}
                            @endif
                        </td>

                        <td>{{ $row->email }}</td>
                        <td>{{ $row->date }}</td>
                        <td>{{$newDateTime = date('h:i A', strtotime($row->time))}}
                        </td>
                        <td>{{ $row->referral_person }}</td>
                        <td>{{ $row->created_at }}</td>
                        @if (!empty(Helper::getpermission('_surgery&Delivery--delete')) ||  !empty(Helper::getpermission('_surgery&Delivery--edit')))
                            <td>
                                @if (!empty(Helper::getpermission('_surgery&Delivery--delete')) )
                                    <a data-delete="{{$row->procedure_id}}" class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                @endif
                                @if (!empty(Helper::getpermission('_surgery&Delivery--edit')) )
                                    <a data-dep="{{$row->dep_id}}" data-pro="{{$row->procedure_name}}" data-toggle="modal" data-target="#editdept" data-id="{{$row->procedure_id}}" class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
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
                <h6 class="modal-title">Registeration</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="alert alert-danger"><ul id="error"></ul></div>

                <form method="post" id="createform" class="p-3">
                    <div class="form-group">
                        <label>Patient</label>
                        <select name="patient" class="select2">
                            <option value="" disabled selected>Select Department</option>
                                @foreach ($patient as $row)
                                    <option value="{{ $row->patient_id }}">{{ $row->f_name.' '.$row->l_name.' P-00'.$row->patient_idetify_number }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Operation Type</label>
                        <select name="type" class="form-control type">
                            <option value="" selected disabled>select type</option>
                            <option value="surgery">Surgery</option>
                            <option value="procedure">Procedure</option>
                            <option value="normal delivery">Normal Delivery</option>
                        </select>
                    </div>
                    <div class="form-group d-none" id="d">
                        <label>Department Name</label>
                        <select name="department" class="form-control deps">
                            <option value=""  selected>Select Department</option>
                            @foreach ($dep as $row)
                                <option value="{{ $row->dep_id }}">{{ $row->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="doc">
                        <label>Docter</label>
                        <select name="docter" class="form-control pos">
                        </select>
                    </div>
                    <div class="form-group d-none" id="surgery">
                        <label>Surgery</label>
                        <select name="surgery" id="surg" class="form-control">

                        </select>
                    </div>
                    <div class="form-group d-none" id="procedure">
                        <label>Procedure</label>
                        <select name="procedure" id="pro" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                       <input type="date" name="date" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                       <input type="time" name="time" class="form-control "   >
                    </div>
                    <div class="form-group">
                        <label>Referral Person</label>
                       <input type="text" name="referral_person" class="form-control "  placeholder="Referral person">
                    </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div><!-- modal-body -->
        </div>
    </div><!-- MODAL DIALOG -->
</div>

@endsection
@section('directory')
<li class="breadcrumb-item active" aria-current="page">Surgery & Delivery</li>

@endsection
@section('jquery')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('public/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js')}}"></script>
<script src="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>


    <script >
   $(document).ready(function() {
        $(".select2").select2({width: '100%',color:'#384364'});
            $('#example').DataTable();
            $(".alert").css('display','none');
        
        $('.type').change(function () {
          var val= $(this).val();
           if(val=="normal delivery"){
            $('#d').removeClass('d-none');
            $('.deps').prop('selectedIndex',0);
           }else if(val=="procedure"){
            $('#d').removeClass('d-none');
            $('.deps').prop('selectedIndex',0);
           }else{
            $('#d').removeClass('d-none');
            $('.deps').prop('selectedIndex',0);
           }
        }); 
        $('.deps').change(function() {
           var dep=$(this).val();
           var type=$('.type').val();
           url = '{{ url("operation_reg_docters") }}/' +dep+'/'+type;
          
            var Hdata = "";
            var Hdata1 = "";
            var Hdata2 = "";

            $.ajax({
                type: 'get',
                url: url,
                success: function(data) {

                    if (data.emp != '') {
                        $('#doc').removeClass('d-none');
                        Hdata = '<option value="" selected disabled>Select Docter</option>';
                        for (var i = 0; i < data.emp.length; i++) {
                            Hdata += '<option value="' + data.emp[i].emp_id + '">' + data.emp[i]
                                .f_name + ' ' + data.emp[i]
                                .l_name + '</option>';
                            $(".pos").html(Hdata);
                        }
                    } else { $(".pos").html('<option value="" selected disabled>No Record Found</option>');}

                    if (data.pro != '') {
                        $('#procedure').removeClass('d-none');
                        $('#surgery').addClass('d-none');

                        Hdata1 = '<option value="" selected disabled>Select Procedure</option>';
                        for (var i = 0; i < data.pro.length; i++) {
                            Hdata1 += '<option value="' + data.pro[i].procedure_id + '">' + data.pro[i]
                                .procedure_name +'</option>';
                            $("#pro").html(Hdata1);
                        }
                    } else { $("#pro").html('<option value="" selected disabled>No Record Found</option>');}

                    if (data.sur != '') {
                        $('#procedure').addClass('d-none');
                        $('#surgery').removeClass('d-none');

                        Hdata2 = '<option value="" selected disabled>Select Surgery</option>';
                        for (var i = 0; i < data.sur.length; i++) {
                            Hdata2 += '<option value="' + data.sur[i].surgery_id + '">' + data.sur[i]
                                .surgery_name +'</option>';
                            $("#surg").html(Hdata2);
                        }
                    } else { $("#surg").html('<option value="" selected disabled>No Record Found</option>');}


                    if (data.normal != '') {
                        $('#procedure').addClass('d-none');
                        $('#surgery').addClass('d-none');
                        $('#surgery').prop('selectedIndex',0);
                        $('#procedure').prop('selectedIndex',0);

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
                url: '{{ url("surgery_registration") }}',
                type: 'post',
                data: formData,
                success: function(data) {
                    $(".alert").css('display', 'none');
                    $('.table').load(document.URL + ' .table');
                    $('#create').modal('hide');
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
                    $('.modal').animate({
                        scrollTop: 0
                    }, '500');

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
@endsection