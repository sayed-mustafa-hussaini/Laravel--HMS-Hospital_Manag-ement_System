
@extends('./master')
@section('content')    
<section class="login-section">
    <div class="auto-container ">

    <div class="login-box text-center ">
       <h4 class="font-weight-bold">What do you want to regsiter as?</h4>
       <div class=" p-4">
        <div class="text-center p-1">
            <img class="img-fluid" src="{{asset('public/assist/images/coach.png')}}" style="height:150px;width:150px" >   
            <a href="mentor-registration"><button class="btn btn-success  font-semibold">Register as a Mentor/Coach</button></a>
        </div>

        <div class="text-center p-1">
            <img class="img-fluid" src="{{asset('public/assist/images/idea.png')}}" >            
            <a href="entreprenuer-registration"><button class="btn  btn-success  ">Register as an Entreprenuer</button></a>
        </div>

        </div>
  </div>

    </div>
</section>
@endsection

@section('jquery')

@endsection

