<?php $__env->startSection('content'); ?>








<div class="container">
    <form action="<?php echo e(route('register')); ?>" method="POST"  class="register-form" id="register-form" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       <div class="row">
           <h2 class="text-center">Sign up</h2>
            <div class="col-sm-6">
                 <div class="form-group">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('name')); ?>"  autocomplete="name" autofocus/>    
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" placeholder="Your Email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('email')); ?>"  autocomplete="email"/>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo e(old('password')); ?>" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="new-password"/>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                    <input type="password" name="password_confirmation" id="password-confirmation" value="<?php echo e(old('password')); ?>" placeholder="Repeat your password"/>
                    
                </div>
                <div class="form-group">
                    <label for="re-pass"><i class="zmdi zmdi-smartphone"></i></label>
                    <input type="number" name="mobile_number" id="mobile-number" value="<?php echo e(old('mobile_number')); ?>" class="<?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Mobile Number"/>
                    <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="re-pass"><i class="zmdi zmdi-email"></i></label>
                    <input type="number" name="cnic" id="cnic" value="<?php echo e(old('cnic')); ?>" class="<?php $__errorArgs = ['cnic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Cnic"/>
                    <?php $__errorArgs = ['cnic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span style="color:rgb(246, 92, 92)">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        <figure><img src="<?php echo e(asset('admin_assets/login/images/signup-image.jpg')); ?>" alt="sing up image"></figure>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce\resources\views/auth/register.blade.php ENDPATH**/ ?>