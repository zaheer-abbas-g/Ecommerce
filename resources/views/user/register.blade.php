@extends('layouts.app')


@section('content')
{{-- <section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
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
                <a href="#" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section> --}}

    <div class="container">
        <form action="{{ route('register') }}" method="POST"  class="register-form" id="register-form">
            @csrf
           <div class="row">
               <h2 class="text-center">Sign up</h2>
                <div class="col-sm-6">
                     <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="number" name="re_pass" id="re_pass" placeholder="Enter Mobile Number"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="number" name="re_pass" id="re_pass" placeholder="Enter Cnic"/>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                           Gender
                         </div><br>
                        
                        <div class="form-check form-check-inline" style="margin-left: 25px">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M"> M
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="F"> F
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                           City
                         </div> <br>
                        <div class="form-check form-check-inline">
                            <select name="city" id="city" class="form-select" aria-label="Default select example" class="form-control">
                                <option value="" selected disabled>city</option>
                                <option value="" >Sukkur</option>
                                <option value="" >Karachi</option>
                                <option value="" >Lahore</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                           Image
                         </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" type="file" name="image" id="image" >
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
                
            
            {{-- <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
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
                <a href="#" class="signup-image-link">I am already member</a>
            </div> --}}
      

@endsection