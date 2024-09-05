<?php $__env->startSection('title',__($page_title)); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('navigator'); ?>
        <!-- PAGE-NAVIGATOR -->
        <section id="page-navigator">
            <div class="container-fluid">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"
                                                       class="cursor-inherit">Send Money</a></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- /PAGE-NAVIGATOR -->
    <?php $__env->stopPush(); ?>


    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card secbg form-block br-4">
                        <div class="card-body">
                            <div class="card-body-inner">
                                <form class="form-row" action="" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label><?php echo app('translator')->get('Receiver Email Address'); ?></label>
                                            <input class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Receiver Email Address'); ?>">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label><?php echo app('translator')->get('Amount'); ?></label>
                                            <input class="form-control" type="text" name="amount" value="<?php echo e(old('amount')); ?>" placeholder="<?php echo app('translator')->get('Enter Amount'); ?>"  onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Select Wallet'); ?></label>
                                            <select name="wallet_type" id="wallet_type"  class="form-control form-control-lg">
                                                <option value="balance"><?php echo e(trans('Main balance')); ?></option>
                                                <option value="interest_balance"><?php echo e(trans('Interest Balance')); ?></option>
                                            </select>

                                            <?php $__errorArgs = ['wallet_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label><?php echo app('translator')->get('Enter Password'); ?></label>
                                            <input class="form-control" type="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo app('translator')->get('Your Password'); ?>" >
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <button type="submit"
                                                    class=" btn btn-rounded btn-primary base-btn btn-block">
                                                <span><?php echo app('translator')->get('Submit'); ?></span></button>

                                        </div>
                                    </div>



                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/money-transfer.blade.php ENDPATH**/ ?>