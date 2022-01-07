@extends('layouts.admin')
@section('content')
    
@endsection

@section('directory')
<li class="breadcrumb-item active" aria-current="page"></li>

<form action="{{route('logout')}}" method="POST">
@csrf
<button type="submit">Logout</button>
</form>
@endsection