<?php $__env->startSection('title','Register'); ?>


<?php $__env->startSection('content'); ?>
    <section id="about-us" class="about-page secbg-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-block py-5">
                        <form class="login-form" action="<?php echo e(route('register')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="signin">
                                <h3 class="title mb-30"><?php echo app('translator')->get('SIGN UP FORM'); ?></h3>

                                <div class="row">
                                    <?php if(session()->get('sponsor') != null): ?>
                                        <div class="col-md-12">
                                            <div class="form-group mb-30">
                                                <label><?php echo app('translator')->get('Sponsor Name'); ?></label>
                                                <input type="text" name="sponsor" class="form-control" id="sponsor"
                                                       placeholder="<?php echo e(trans('Sponsor By')); ?>"
                                                       value="<?php echo e(session()->get('sponsor')); ?>" readonly>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control" type="text" name="firstname"
                                                   value="<?php echo e(old('firstname')); ?>" placeholder="<?php echo app('translator')->get('First Name'); ?>">
                                            <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control " type="text" name="lastname"
                                                   value="<?php echo e(old('lastname')); ?>" placeholder="<?php echo app('translator')->get('Last Name'); ?>">
                                            <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-30">
                                            <input class="form-control " type="text" name="username"
                                                   value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Username'); ?>">
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group mb-30">
                                            <input class="form-control" type="text" name="email"
                                                   value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Email Address'); ?>">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger  mt-1"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-30">
                                            <?php
                                                $country_code = (string) @getIpInfo()['code'] ?: null;
                                                $myCollection = collect(config('country'))->map(function($row) {
                                                    return collect($row);
                                                });
                                                $countries = $myCollection->sortBy('code');
                                            ?>

                                            <div class="input-group ">
                                                <div class="input-group-prepend w-50">
                                                    <select name="phone_code" class="form-control country_code dialCode-change">
                                                        <?php $__currentLoopData = config('country'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value['phone_code']); ?>"
                                                                    data-name="<?php echo e($value['name']); ?>"
                                                                    data-code="<?php echo e($value['code']); ?>"
                                                                <?php echo e($country_code == $value['code'] ? 'selected' : ''); ?>

                                                            > <?php echo e($value['name']); ?> (<?php echo e($value['phone_code']); ?>)

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <input type="text" name="phone" class="form-control dialcode-set"
                                                       value="<?php echo e(old('phone')); ?>"
                                                       placeholder="<?php echo app('translator')->get('Your Phone Number'); ?>">
                                            </div>


                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger mt-1"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <input type="hidden" name="country_code" value="<?php echo e(old('country_code')); ?>"
                                                   class="text-dark">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <input class="form-control" type="password" name="password"
                                                   placeholder="<?php echo app('translator')->get('Password'); ?>">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger mt-1"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-20">
                                            <input class="form-control" type="password" name="password_confirmation"
                                                   placeholder="<?php echo app('translator')->get('Confirm Password'); ?>">
                                        </div>
                                    </div>

                                </div>



                                <div class="btn-area">
                                    <button class="btn-login login-auth-btn" type="submit"><span><?php echo app('translator')->get('Sign Up'); ?></span>
                                    </button>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get("Already have an account? Login"); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });
            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }

        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/auth/register.blade.php ENDPATH**/ ?>