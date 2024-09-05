<?php $__env->startSection('title', trans($title)); ?>
<?php $__env->startPush('navigator'); ?>
    <!-- PAGE-NAVIGATOR -->
    <section id="page-navigator">
        <div class="container-fluid">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo app('translator')->get($title); ?></a></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- /PAGE-NAVIGATOR -->
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section id="feature" class="about-page secbg-1 py-5">
        <div class="feature-wrapper add-fund">
            <div class="container-fluid ">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-type-1 text-center">
                            <ul class="list-group">
                                <li class="list-group-item font-weight-bold bg-transparent">
                                    <img
                                        src="<?php echo e(getFile(config('location.withdraw.path').optional($withdraw->method)->image)); ?>"
                                        class="card-img-top w-50" alt="<?php echo e(optional($withdraw->method)->name); ?>">
                                </li>
                                <li class="list-group-item font-weight-bold bg-transparent"><?php echo app('translator')->get('Request Amount'); ?> :
                                    <span
                                        class="float-right text-success"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->amount)); ?> </span>
                                </li>
                                <li class="list-group-item font-weight-bold bg-transparent"><?php echo app('translator')->get('Charge Amount'); ?> :
                                    <span
                                        class="float-right text-danger"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->charge)); ?> </span>
                                </li>
                                <li class="list-group-item font-weight-bold bg-transparent"><?php echo app('translator')->get('Total Payable'); ?> :
                                    <span
                                        class="float-right text-danger"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->net_amount)); ?> </span>
                                </li>
                                <li class="list-group-item font-weight-bold bg-transparent"><?php echo app('translator')->get('Available Balance'); ?> :
                                    <span
                                        class="float-right text-success"><?php echo e(@$basic->currency_symbol); ?><?php echo e($remaining); ?> </span>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="card card-type-1 ">
                            <div class="card-header custom-header text-center">
                                <h5 class="card-title"><?php echo app('translator')->get('Additional Information To Withdraw Confirm'); ?></h5>
                            </div>

                            <div class="card-body">

                                <form action="" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                                    <?php echo csrf_field(); ?>
                                    <?php if(optional($withdraw->method)->input_form): ?>
                                        <?php $__currentLoopData = $withdraw->method->input_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($v->type == "text"): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group  mt-2">
                                                        <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                                    <span class="text-danger">*</span>  <?php endif; ?></strong></label>
                                                        <input type="text" name="<?php echo e($k); ?>"
                                                               class="form-control bg-transparent"
                                                               <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                                        <?php if($errors->has($k)): ?>
                                                            <span
                                                                class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php elseif($v->type == "textarea"): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                                    <span class="text-danger">*</span>  <?php endif; ?>
                                                            </strong></label>
                                                        <textarea name="<?php echo e($k); ?>" class="form-control bg-transparent"  rows="3" <?php if($v->validation == "required"): ?> required <?php endif; ?>></textarea>
                                                        <?php if($errors->has($k)): ?>
                                                            <span class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php elseif($v->type == "file"): ?>

                                                <div class="col-md-12">
                                                    <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                                <span class="text-danger">*</span>  <?php endif; ?>
                                                        </strong></label>

                                                    <div class="form-group mt-2">
                                                        <div class="fileinput fileinput-new " data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail withdraw-thumbnail"
                                                                 data-trigger="fileinput">
                                                                <img class="w-150px"
                                                                     src="<?php echo e(getFile(config('location.default'))); ?>"
                                                                     alt="...">
                                                            </div>
                                                            <div
                                                                class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                                            <div class="img-input-div">
                                                                <span class="btn btn-info btn-file">
                                                                    <span
                                                                        class="fileinput-new "> <?php echo app('translator')->get('Select'); ?> <?php echo e($v->field_level); ?></span>
                                                                    <span
                                                                        class="fileinput-exists"> <?php echo app('translator')->get('Change'); ?></span>
                                                                    <input type="file" name="<?php echo e($k); ?>" accept="image/*"
                                                                           <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                                                </span>
                                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                                   data-dismiss="fileinput"> <?php echo app('translator')->get('Remove'); ?></a>
                                                            </div>

                                                        </div>
                                                        <?php if($errors->has($k)): ?>
                                                            <br>
                                                            <span
                                                                class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


                                    <div class="col-md-12">
                                        <div class=" form-group">
                                            <button type="submit" class="btn btn-base btn-block text-white">
                                                <span><?php echo app('translator')->get('Confirm Now'); ?></span>
                                            </button>

                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
        <script src="//code.tidio.co/yoqnivfyoj3saidhseoso1umstfixyux.js" async></script>
    </section>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-fileinput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('extra-js'); ?>
    <script src="<?php echo e(asset($themeTrue.'js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/payout/preview.blade.php ENDPATH**/ ?>