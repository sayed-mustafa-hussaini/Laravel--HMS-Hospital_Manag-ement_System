@extends('master')
@section('css')
 <link rel="stylesheet" href="{{asset('public/assist/build/css/intlTelInput.min.css')}}">


@endsection
@section('content')    
<section class="register-section">
    <div class="auto-container">
        <div class="register-box">
            
            <!-- Title Box -->
            <div class="title-box">
                <h2>Mentor Register</h2>
                <div class="text"><span class="theme_color">Welcome!</span> Please confirm that you are visiting</div>
            </div>
            
            <!-- Login Form -->
            <div class="styled-form">
                <form method="post" action="{{url('/register')}}">
                    @csrf
                    
                    <div class="row clearfix">
                        
                        <!-- Form Group -->
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Full Name</label>
                            <input type="text" name="full_name" value="{{old('full_name')}}" @if($errors->first('full_name')) style="border:1px solid red" @endif  placeholder="Full Name" >
                            {!!$errors->first('full_name', '<small class="text-danger">:message</small>')!!}
                        </div>                        
                        <!-- Form Group -->
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Email Address</label>
                            <input type="email" name="email" value="{{old('email')}}" @if($errors->first('email')) style="border:1px solid red" @endif   placeholder="abcd@gmail.com" >
                            {!!$errors->first('email', '<small class="text-danger">:message</small>')!!}
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Country</label>
                            <select @if($errors->first('country')) style="border:1px solid red" @endif  name="country">
                            <option value="" selected disabled>---Select country ---</option> 
                                @foreach ($country as $co)
                                <option @if(old("country")==$co->co_name) selected @endif>{{$co->co_name}}</option>
                                @endforeach
                            </select>                     
                            {!!$errors->first('country', '<small class="text-danger">:message</small>')!!}

                        </div>

                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Province</label>
                            <input type="text" name="province" value="{{old('province')}}"  @if($errors->first('province')) style="border:1px solid red" @endif  placeholder="Province" >
                            {!!$errors->first('province', '<small class="text-danger">:message</small>')!!}
                        </div>
                        <input type="hidden" name="type" value="mentor">

                        <!-- Form Group -->
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">    
                            <label>Phone Number</label>
                            <input  type="tel" id="phone"  name="phonee" @if($errors->first('phone')) style="border:1px solid red" @endif  value="{{ old('phonee') }}" class="form-control">
                            <input type="hidden" value="{{old('phone')}}"  class="form-control" id="hide" name="phone"  @if($errors->first('phone')) style="border:1px solid red" @endif  value="{{ old('phone') }}" >  
                            <span id="valid-msg" class="text-success"></span>
                            {!!$errors->first('phone', '<small class="text-danger">:message</small>')!!}
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>How did you hear about us?</label>
                            <select name="how_did_you_hear_about_us"   @if($errors->first('how_did_you_hear_about_us')) style="border:1px solid red" @endif>
                                <option value="" selected disabled>---Select an option ---</option> 
                                <option  @if(old("how_did_you_hear_about_us")=='Social Media') selected @endif>Social Media</option>
                                 <option  @if(old("how_did_you_hear_about_us")=='Search Engines') selected @endif>Search Engines</option> 
                                 <option  @if(old("how_did_you_hear_about_us")=='Incubation Programs') selected @endif>Incubation Programs</option>
                                 <option  @if(old("how_did_you_hear_about_us")=='Events') selected @endif>Events</option>
                                 <option  @if(old("how_did_you_hear_about_us")=='Referred By Friends') selected @endif>Referred By Friends</option> 
                            </select>         
                            {!!$errors->first('how_did_you_hear_about_us', '<small class="text-danger">:message</small>')!!}

                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Password</label>
                            <span class="eye-icon flaticon-eye"></span>
                            <input type="password" name="password"  value="{{old('password')}}"  placeholder="Password" @if($errors->first('password')) style="border:1px solid red" @endif >
                            {!!$errors->first('password', '<small class="text-danger">:message</small>')!!}

                        </div>
                        
                        <!-- Form Group -->
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label>Confirm Password</label>
                            <span class="eye-icon flaticon-eye"></span>
                            <input type="password" name="password_confirmation"   value="{{old('password_confirmation')}}" placeholder="Password" @if($errors->first('confirmed')) style="border:1px solid red" @endif >
                            {!!$errors->first('password_confirmation', '<small class="text-danger">:message</small>')!!}
                       
                        </div>
                        
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column col-lg-3 col-md-4 col-sm-12">
                                    <div class="radio-box">
                                        <input type="radio"  id="type1" name="gender" value="male" @if(old('gender')=="male") checked @endif> 
                                        <label for="type1">Male</label>
                                    </div>
                                    {!!$errors->first('gender', '<small class="text-danger">:message</small>')!!}

                                </div>
                                <!-- Column -->
                                <div class="column col-lg-3 col-md-4 col-sm-12">
                                    <div class="radio-box">
                                        <input type="radio" id="type2"  name="gender" value="female" @if(old('gender')=="female") checked @endif> 
                                        <label for="type2">Female</label>
                                    </div>
                                </div>                                    
                                <div class="column col-lg-12 col-md-12 col-sm-12">
                                    <div class="check-box">
                                        <input type="checkbox" name="remember-password" id="type-4" > 
                                        <label for="type-4">I agree the user agreement and <a href="privacy.html">Terms &amp; Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                            <button type="submit" class="theme-btn btn-style-three"><span class="txt">Sign Up <i class="fa fa-angle-right"></i></span></button>
                        </div>
                        
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="users">Already have an account? <a href="login.html">Sign In</a></div>
                        </div>
                        
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</section>
@endsection
@section('jquery')
<script src="{{asset('public/assist/build/js/intlTelInput.min.js')}}"></script>


<script>

    
    var input = document.querySelector("#phone"),
      output = document.querySelector("#valid-msg");
    
    var iti = window.intlTelInput(input, {
        initialCountry: "af",
        // initialCountry: "auto",
            // geoIpLookup: function(callback) {
            //     $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp && resp.country) ? resp.country : "us";
            //     callback(countryCode);
            //     });
            // },
            
      utilsScript: "{{asset('public/assist/build/js/utils.js')}}?1590403638580", // just for formatting/placeholders etc
    });
    var handleChange = function() {
      if (iti.isValidNumber()) {
        var text="✓ Valid " + iti.getNumber();
        $('#submits').attr('disabled',false);
        $('#valid-msg').attr('class','text-success');

      }else{
        var text="Please enter a valid number";
        $('#submits').attr('disabled',true);
        $('#valid-msg').attr('class','text-danger');
    
      }
      var textNode = document.createTextNode(text);
      output.innerHTML = "";
      output.appendChild(textNode);
      $('#hide').val(iti.getNumber());
    };
    
    // listen to "keyup", but also "change" to update when the user selects a country
    input.addEventListener('change', handleChange);
    // input.addEventListener('keyup', handleChange);
    
      </script>
@endsection
