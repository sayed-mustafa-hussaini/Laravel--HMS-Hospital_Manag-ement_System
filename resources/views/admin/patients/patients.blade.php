@extends('layouts.admin')

@section('css')
<link href="{{asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
<link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>

@endsection

@section('content')
    <div class="card p-3">
        <div class="btn-list ">
            @if (!empty(Helper::getpermission('_patients--create')))
                <a href="{{route('patients.create')}}" class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New Patient</a>
            @endif
        </div>
        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer table-sm" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PID</th>
                        <th>Patients FullName</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>phone Number</th>
                        <th>Registred Date</th>
                        @if (!empty(Helper::getpermission('_patients--create')) || !empty(Helper::getpermission('_patients--edit')) || !empty(Helper::getpermission('_patients--view')))
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php $counter=1; @endphp
                    @foreach ($patients as $row)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>P-00{{$row->patient_idetify_number}}</td>
                            <td>{{$row->f_name.' '.$row->l_name}}</td>
                            <td>{{$row->dob}}</td>
                            <td>{{$row->gender}}</td>
                            <td>{{$row->department_name}}</td>
                            <td>{{$row->phone_number}}</td>
                            <td>{{$row->created_at}}</td>

                            @if (!empty(Helper::getpermission('_patients--create')) || !empty(Helper::getpermission('_patients--edit')) || !empty(Helper::getpermission('_patients--view')))
                                <td>
                                    @if (!empty(Helper::getpermission('_patients--view')))    
                                        <a href="{{route('patients.show',$row->patient_id)}}"  class="btn btn-success btn-sm text-white mr-2 delete">View</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_patients--delete')))
                                        <a data-delete="{{$row->patient_id}}" class="btn btn-danger btn-sm text-white mr-2 delete">Delete</a>
                                    @endif
                                    @if (!empty(Helper::getpermission('_patients--edit')))
                                        <a href="{{route('patients.edit',$row->patient_id)}}" class="btn btn-info btn-sm text-white mr-2 edit">Edit</a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


{{-- models --}}

@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Patients</li>
@endsection


@section('jquery')
<script src="{{asset('public/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js')}}"></script>

<script>
	$('#example').DataTable();

</script>

@if(session()->has('notif'))
<script>
      $.growl.notice({
        message: "{{session()->get('notif')}}",
        title: 'Success !',
        position: {
            from: "top",
            align: "left"
        },
    });
  
</script>       
@endif



@endsection
