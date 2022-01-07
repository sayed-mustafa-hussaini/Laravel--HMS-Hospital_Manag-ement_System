
@extends('layouts.auth')
@section('content')    



<div class="page h-100">
    <div class="">
        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <div class="col col-login mx-auto mb-5">
					<div class="text-center">
						<img src="{{asset('public/sarey.png')}}" class="header-brand-img" alt="">
					</div>
				</div>
                <form class="login100-form validate-form" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-jet-validation-errors class="mb-4 text-danger text-center " />  
                    @if (session('status'))
                          <div class="mb-4 font-medium text-sm text-green-600 text-success text-center">
                              {{ session('status') }}
                          </div>
                    @endif

                    <p class="text-center">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            
                
                    <div class="container-login100-form-btn">
                        <button href="#" type="submit" class="login100-form-btn btn-primary">
                            Resend Verification Email
                        </button>
                    
                        <div class=" mt-5">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </form>
                 
                
               
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>

@endsection
