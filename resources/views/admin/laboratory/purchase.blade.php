@extends('layouts.admin')

@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_purchaseLabMaterial--create')) )
                <a href="javascript:viod();" data-toggle="modal" data-target="#createdept"
                    class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Purchase New Medicine</a>
            @endif
        </div>
        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Material Name</th>
                        <th>Suppiler Name</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Sale Price</th>
                        <th>Total Amount</th>
                        <th>Expiry Date</th>
                
                        <th>Author</th>
                        <th>Created Date</th>
                        {{-- @if (!empty(Helper::getpermission('_purchaseLabMaterial--delete')) &&  !empty(Helper::getpermission('_purchaseLabMaterial--edit'))  ) --}}
                            <th>Action</th>
                        {{-- @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($mid as $row)
                        <tr id="row">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $row->material_name }}</td>
                            <td>{{ $row->supplier_name }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->purchase_price }}</td>
                            <td>{{ $row->sale_price }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->expiry_date }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->created_at }}</td>
                            {{-- @if (!empty(Helper::getpermission('	_purchaseLabMaterial--delete')) && !empty(Helper::getpermission('_purchaseLabMaterial--edit')) ) --}}
                                <td>
                                    {{-- @if (!empty(Helper::getpermission('_purchaseLabMaterial--delete')) ) --}}
                                        <a data-delete="{{$row->ph_main_cat_id}}" class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                    {{-- @endif --}}

                                    {{-- @if (!empty(Helper::getpermission('_purchaseLabMaterial--edit')) ) --}}
                                        <a  data-toggle="modal" data-target="#editdept" data-id="{{$row->lab_purchase_id}}" class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    {{-- @endif --}}
                                </td>
                            {{-- @endif --}}
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
                    <h6 class="modal-title">Purchase Material</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert-danger"><ul id="error"></ul></div>
                    <form method="post" id="createform">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input name="supplier_name" type="text" class="form-control" placeholder="Supplier Name" >
                        </div>

                        <div class="form-group">
                            <label>Material Catagory</label>
                            <select name="material_catagory " class="form-control mat_cat" id="">
                                <option value="" selected disabled>select catagory</option>
                                @foreach ($cat as $item)
                                    <option value="{{$item->lab_cat_id}}">{{$item->lab_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Material Name</label>
                           <select name="material" class="form-control med">
                               <option value="" selected disabled>select material</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="number" class="form-control" placeholder="Quantity" >
                        </div>
                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input name="purchase_price" type="number" class="form-control" placeholder="Purchase Price" >
                        </div>
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input name="sale_price" type="number" class="form-control" placeholder="Sale Price" >
                        </div>
                        <div class="form-group">
                            <label>Expiry Name</label>
                            <input name="expiry_date" type="month" class="form-control"  >
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Purchase</button>
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
                    <h6 class="modal-title">Material Edit</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <div class="alert alert1 alert-danger"><ul id="error"></ul></div>

                    <form method="post" id="editform">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input name="supplier_name" type="text" class="form-control" placeholder="Supplier Name" id="supplier_name" >
                            <input type="hidden" name="purchase_id" id="purchase_id">
                        </div>

                        <div class="form-group">
                            <label>Material Catagory</label>
                            <select name="material_catagory" class="form-control mat_cat">
                                <option value="" selected disabled>select catagory</option>
                                @foreach ($cat as $item)
                                    <option value="{{$item->lab_cat_id}}">{{$item->lab_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Material Name</label>
                           <select name="material" class="form-control med">
                               <option value="" selected disabled>select material</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" type="number" class="form-control" placeholder="Quantity" id="quant">
                        </div>
                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input name="purchase_price" type="number" class="form-control" placeholder="Purchase Price" id="purch_price" >
                        </div>
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input name="sale_price" type="number" class="form-control" placeholder="Sale Price" id="sale_price" >
                        </div>
                        <div class="form-group">
                            <label>Expiry Name</label>
                            <input name="expiry_date" type="month" class="form-control" id="expiry_date" >
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Edit purchase</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div><!-- modal-body -->
            </div>
        </div><!-- MODAL DIALOG -->
    </div>

@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Purchase Lab Material</li>
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

        $('.mat_cat').change(function() {
            id = ($(this).val());
            url = '{{url("material_filter")}}' +'/'+ id;
            var Hdata = "";
            $.ajax({
                type: 'get',
                url: url,
                success: function(data) {
                    if (data != '') {
                        Hdata = '<option value="" selected disabled>select Material</option>';
                        for (var i = 0; i < data.length; i++) {
                            Hdata += '<option value="' + data[i].lab_m_id + '">' + data[i]
                                .material_name + ' ' + data[i]
                                .company + '</option>';
                            $(".med").html(Hdata);
                        }
                    } else {
                        $(".med").html(
                            '<option value="" selected disabled>No Record Found</option>');
                    }
                },
                error: function() {}
            })

        });

    $("#createform").submit(function(e) {
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
        $.ajax({
            url: "{{url('lab-purchase-materials')}}",
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
      var id =$(this).attr('data-id');
      var Hdata="";

        $.ajax({
            type: 'get',
            url: "{{url('lab-purchase-materials')}}"+'/'+id+'/'+'edit',
            success: function(data) {
                // if (data.mat != '') {
                Hdata = '<option value="" selected disabled>select Material</option>';
                
                if (data.mat != '') {
                Hdata = '<option value="" selected disabled>Select material</option>';
                for (let i = 0; i < data.mat.length; i++) {
                    Hdata += '<option value="' +data.mat[i].lab_m_id + '">' + data.mat[i]
                        .material_name + ' ' + data.mat[i]
                        .company + '</option>';
                    $(".med").html(Hdata);
                }
            }
                $('.mat_cat').val(data.cat);
                $('.med').val(data.purchase.lab_m_id);
                $('#supplier_name').val(data.purchase.supplier_name);
                $('#quant').val(data.purchase.quantity);
                $('#purch_price').val(data.purchase.purchase_price);
                $('#sale_price').val(data.purchase.sale_price);
                $('#expiry_date').val(data.purchase.expiry_date);
                $('#purchase_id').val(data.purchase.lab_purchase_id);
             
            },
            error: function() {}
        })

    });

    $("#editform").submit(function(e) {
        e.preventDefault();   
        var formData = new FormData(this);
        $.ajaxSetup({headers: {'X-CSRF-TOKEN':'@php echo csrf_token() @endphp '}});  
        $.ajax({
            url:'{{ url("materials_update")}}',
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
                    url:'{{url("medicines_cat")}}/'+id,
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
                      'Catagory has related data first delete Catagory data',
                      'error'
                    )
                    }
                });
            }
          })
              
});
    </script>

@endsection
