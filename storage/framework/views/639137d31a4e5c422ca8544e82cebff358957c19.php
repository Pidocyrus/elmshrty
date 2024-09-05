<?php $__env->startSection('title','Reset Password'); ?>


<?php $__env->startSection('content'); ?>

    <section id="about-us" class="about-page secbg-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="form-block py-5">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                <?php echo e(trans(session('status'))); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form class="login-form" action="<?php echo e(route('password.update')); ?>"   method="post">
                            <?php echo csrf_field(); ?>

                            <?php $__errorArgs = ['token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                <?php echo e(trans($message)); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                            <div class="signin">
                                <h3 class="title mb-30"><?php echo app('translator')->get('Reset Password'); ?></h3>

                                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                <input type="hidden" name="email" value="<?php echo e($email); ?>">



                                <div class="form-group mb-20">
                                    <input class="form-control" type="password" name="password" placeholder="<?php echo app('translator')->get('New Password'); ?>">
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



                                <div class="form-group mb-20">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="<?php echo app('translator')->get('Confirm Password'); ?>">
                                </div>


                                <div class="btn-area">
                                    <button class="btn-login login-auth-btn" type="submit"><span><?php echo app('translator')->get('Submit'); ?></span></button>
                                </div>

                                <div class="login-query mt-30 text-center">
                                    <a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get("Don't have any account? Sign Up"); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/auth/passwords/reset.blade.php ENDPATH**/ ?>