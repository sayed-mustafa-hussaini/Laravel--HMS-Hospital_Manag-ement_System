@extends('layouts.admin')

@section('css')
<link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>

@endsection

@section('content')

    <div class="row ">
        <div class="col-12 mb-5">
            <div class="pb-3">
                <div class="float-right btn-list ">
                    <a href="{{url('employees/create/option')}}" class="pull-right btn btn-primary d-inline"><i class="ti-plus"></i> &nbsp;Add New Employee</a>
                </div>
            </div>
        </div>
        @foreach ($emp as $row)
            
        <div class=" col-xl-3 col-md-6 col-sm-12 ">
            <div class="card text-center">
                <div class="ml-auto">
                <div class="btn-group mt-2 mr-2 mb-2 float-right">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('employees.edit',$row->emp_id)}}">Edit</a></li>
                        <li><a href="#">Delete</a></li>                  
                    </ul>
                </div>
            </div>

                @if(!empty($row->photo)) 
                <img src="{{url('storage/app')}}/{{$row->photo}}" alt="img" class="" style="height:200px;object-fit:contain;width:100%">
                @else
                <img src="{{asset('public/empty.png')}}" alt="img" class="" style="height:200px;object-fit: contain;width:100%">
                @endif
                <div class="card-body">
                    <h3 class="mb-3">{{$row->f_name.' '. $row->l_name}}</h3>
                    <p style="margin-bottom:0px">{{$row->position}}</p>
                    <p style="margin-bottom:0px">{{$row->department_name}}</p>
                    <p>Employee ID:{{'PMS-EMP00'.$row->emp_identify_id}}</p>

                    @if ($row->emp_identify_id % 2) 
                    <a href="{{route('employees.show',$row->emp_id)}}"  class="btn btn-primary">-Read More</a>
                    @else
                    <a href="{{route('employees.show',$row->emp_id)}}" class="btn btn-secondary">-Read More</a>
                    @endif
                </div>
            </div>
        </div><!-- COL-END -->
        @endforeach
        
    </div>

{{-- models --}}

@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Employee</li>
@endsection


@section('jquery')

<script src="{{ asset('public/assets/plugins/notify/js/jquery.growl.js')}}"></script>



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
