@extends('layouts.app')

@section('content')



{{-- <div class="main">
    <!-- Sign up form -->
    <section class="signup justify-content-center">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="{{ route('register') }}" method="POST"  class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email"  class="@error('email') is-invalid @enderror" placeholder="Your Email"/> 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password"  class="@error('password') is-invalid @enderror" placeholder="Password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password"  id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass">/label>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M"> M
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F"> F
                              </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('admin_assets/login/images/signup-image.jpg')}}" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div> --}}




<div class="container">
    <form action="{{ route('register') }}" method="POST"  class="register-form" id="register-form" enctype="multipart/form-data">
        @csrf
       <div class="row">
           <h2 class="text-center">Sign up</h2>
            <div class="col-sm-6">
                 <div class="form-group">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="@error('name') is-invalid @enderror"  value="{{ old('name') }}"  autocomplete="name" autofocus/>    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" placeholder="Your Email" class="@error('email') is-invalid @enderror"  value="{{ old('email') }}"  autocomplete="email"/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" value="{{old('password')}}" class="@error('password') is-invalid @enderror" autocomplete="new-password"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input type="password" name="password_confirmation" id="password-confirmation" value="{{old('password')}}" placeholder="Repeat your password"/>
                    
                </div>
                <div class="form-group">
                    <label for="re-pass"><i class="zmdi zmdi-smartphone"></i></label>
                    <input type="number" name="mobile_number" id="mobile-number" value="{{old('mobile_number')}}" class="@error('mobile_number') is-invalid @enderror" placeholder="Enter Mobile Number"/>
                    @error('mobile_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="re-pass"><i class="zmdi zmdi-email"></i></label>
                    <input type="number" name="cnic" id="cnic" value="{{old('cnic')}}" class="@error('cnic') is-invalid @enderror" placeholder="Enter Cnic"/>
                    @error('cnic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                       Gender
                     </div><br>
                    
                    <div class="form-check form-check-inline" style="margin-left: 25px">
                        <input class="form-check-input" type="radio"  name="gender" id="gender" value="M"> M
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  name="gender" id="gender" value="F"> F
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                       City
                     </div> <br>
                    <div class="form-check form-check-inline">
                        <select name="city" id="city"  class="form-select form-control"  >
                            <option value="" selected disabled>select</option>
                            <option value="Sukkur" >Sukkur</option>
                            <option value="Karachi" >Karachi</option>
                            <option value="Lahore" >Lahore</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                       Image
                     </div>
                    <div class="form-check form-check-inline">
                        <input class="form-control" type="file" name="image" id="image" >
                        @error('image')
                        <span style="color:rgb(246, 92, 92)">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                      </div>  
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">     
                </div>
                <div class="form-group">     
                </div>
                <div class="form-group">     
                </div>
                <div class="form-group">
                        <figure><img src="{{asset('admin_assets/login/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
               </div>
               <div class="form-group">     
                </div>
                <div class="form-group">     
                </div>
           </div>
           <div class="form-group form-button">
            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
        </div>
       </div>
    </form>
    </div> 
@endsection
