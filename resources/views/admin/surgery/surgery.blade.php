@extends('layouts.admin')

@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_surgery--create')))
                <a href="javascript:viod();" data-toggle="modal" data-target="#createdept"
                    class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New Surgery</a>
            @endif
        </div>
        <div class="mt-5 tables">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Surgery Name</th>
                        <th>Departement</th>
                        <th>Author</th>
                        <th>Created Date</th>
                        @if (!empty(Helper::getpermission('_surgery--delete')) || !empty(Helper::getpermission('_surgery--edit')))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($surgery as $row)
                        <tr id="row{{$row->surgery_id}}">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $row->surgery_name }}</td>
                            <td>{{ $row->department_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                @if (!empty(Helper::getpermission('_surgery--delete')) || !empty(Helper::getpermission('_surgery--edit')))
                                    @if (!empty(Helper::getpermission('_surgery--delete')))
                                        <a data-delete="{{$row->surgery_id}}" class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_surgery--edit')))
                                        <a data-dep="{{$row->dep_id}}" data-surg="{{$row->surgery_name}}" data-toggle="modal" data-target="#editdept" data-id="{{$row->surgery_id}}" class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    {{-- models --}}
    <!-- LARGE MODAL -->
    <div id="createdept" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Surgery Register</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert-danger"><ul id="error"></ul></div>

                    <form method="post" id="createform" class="p-3">
                        <div class="form-group">
                            <label>Department Name</label>
                            <select name="department" class="form-control deps">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $row)
                                    <option value="{{ $row->dep_id }}">{{ $row->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Surgery Name</label>
                           <input type="text" name="surgery_name" class="form-control" placeholder="Surgery Name">
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Add Surgery</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                    </form>
                    
                </div><!-- modal-body -->


            </div>
        </div><!-- MODAL DIALOG -->
    </div>
    <div id="editdept" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header pd-x-20">
                    <h6 class="modal-title">Surgery Edit</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert1 alert-danger"><ul id="error"></ul></div>

                    <form method="post" id="editform">
                        <div class="form-group">
                            <label>Department Name</label>
                            <select name="department" class="form-control deps" id="department">
                                <option value="" disabled selected>Select Department</option>
                                @foreach ($dep as $row)
                                    <option value="{{ $row->dep_id }}">{{ $row->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Surgery Name</label>
                           <input type="text" name="surgery_name" class="form-control" id="surgery_name"  placeholder="Surgery Name">
                           <input type="hidden" name="surg_id" id="surg_id">
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Edit Surgery</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>

@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Surgery</li>
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
            url: "{{url('surgery')}}",
            type: 'POST',
            data: formData,
            success: function (data) {
                $(".alert").css('display','none');
                $('.table').load(document.URL +  ' .table');
                $('#createdept').modal('hide');
                $('#createform')[0].reset();
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
      var dep=$(this).attr('data-dep');
      var surg=$(this).attr('data-surg');
      var id =$(this).attr('data-id');
        $('#department').val(dep);   
        $('#surgery_name').val(surg);   
        $('#surg_id').val(id);           
    });

    $("#editform").submit(function(e) {
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
        $.ajax({
            url:'{{ url("surgery_update")}}',
            type: 'post',
            data: formData,
            success: function (data) {
                $(".alert1").css('display','none');
                $('.table').load(document.URL +  ' .table');
                $('#editdept').modal('hide');
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

    $('body').on('click','.delete',function(){  
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
                    url:'{{url("surgery")}}/'+id,
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
                      'Record has related data first delete related data',
                      'error'
                    )
                    }
                });
            }
          })
              
});
    </script>

@endsection
