@extends('layouts.admin')

@section('css')
    <link href="{{ asset('public/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{asset('public/assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
    <div class="card p-3">
        <div class="mt-5 table-responsive">
            <table class="table table-striped table-bordered table-sm text-nowrap w-100 dataTable no-footer" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter=1;
                    $mydata=0;
                    @endphp
                    @foreach ($activityLog as $row)
                         <tr id="row{{$row->roles_id}}">
                            <td>{{$counter++ }}</td>
                            <td class="d-flex">
                                <div>
                                    @if (empty($row->user_img))
                                            <img src="{{url('public/assets/images/icon.jpg')}}" alt="user" style="width:50px;height:50px;border-radius:50px;" >
                                    @else
                                            <img src="{{url('storage/app')}}/{{$row->user_img}}" alt="user" style="width:50px;height:50px;border-radius:50px;">
                                    @endif
                                </div>
                                <div class="ml-5">
                                    <p class="m-0 p-0 mb-2" >{{$row->user_name}}</p>
                                    <p class="m-0 p-0">{{$row->user_email}}</p>
                                </div>
                            </td>
                            <td> {{$row->description}} </td>
                            <td> {{$row->created_at}} </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('directory')
    <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
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

    </script>

@endsection