<?php $__env->startSection('title',trans('Invest History')); ?>
<?php $__env->startSection('content'); ?>
    <script>
        "use strict"
        function getCountDown(elementId, seconds) {
            var times = seconds;
            var x = setInterval(function () {
                var distance = times * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "COMPLETE";
                }
                times--;
            }, 1000);
        }
    </script>

    <?php $__env->startPush('navigator'); ?>
        <!-- PAGE-NAVIGATOR -->
        <section id="page-navigator">
            <div class="container-fluid">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"
                                                       class="cursor-inherit"><?php echo e(trans('Invest History')); ?></a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- /PAGE-NAVIGATOR -->
    <?php $__env->stopPush(); ?>




    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div class="row">
                <div class="col-md-12">
                    <div class="card secbg">
                        <div class="card-body ">

                            <div class="table-responsive">
                                <table class="table table table-hover table-striped text-white " id="service-table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th><?php echo app('translator')->get('SL'); ?></th>
                                        <th><?php echo app('translator')->get('Business Design'); ?></th>
                                        <th ><?php echo app('translator')->get('Return Interest'); ?></th>
                                        <th><?php echo app('translator')->get('Received Amount'); ?></th>
                                        <th><?php echo app('translator')->get('Upcoming Payment'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>

                                            <td data-label="<?php echo app('translator')->get('SL'); ?>">
                                                <?php echo e(loopIndex($investments) + $key); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Plan'); ?>">
                                                <?php echo e(optional(@$invest->plan)->name); ?>

                                                <br> <?php echo e(getAmount($invest->amount).' '.trans($basic->currency)); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Return Interest'); ?>" class="text-capitalize">
                                                <?php echo e(getAmount($invest->profit)); ?> <?php echo e(trans($basic->currency)); ?>

                                                <?php echo e(($invest->period == '-1') ? trans('For Lifetime') : 'per '. trans($invest->point_in_text)); ?>


                                                <br>
                                                <?php echo e(($invest->capital_status == '1') ? '+ '.trans('Capital') :''); ?>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Received Amount'); ?>">
                                                <?php echo e($invest->recurring_time); ?> x <?php echo e($invest->profit); ?> =  <?php echo e(getAmount($invest->recurring_time*$invest->profit)); ?> <?php echo e(trans($basic->currency)); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Upcoming Payment'); ?>">
                                                <?php if($invest->status == 1): ?>
                                                    <p id="counter<?php echo e($invest->id); ?>" class="mb-2"></p>
                                                    <script>getCountDown("counter<?php echo e($invest->id); ?>", <?php echo e(\Carbon\Carbon::parse($invest->afterward)->diffInSeconds()); ?>);</script>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"  style="width: <?php echo e($invest->nextPayment); ?>"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo e($invest->nextPayment); ?></div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="badge badge-success"><?php echo app('translator')->get('Completed'); ?></span>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <tr class="text-center">
                                            <td colspan="100%"><?php echo e(trans('No Data Found!')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>


                            <?php echo e($investments->appends($_GET)->links($theme.'partials.pagination')); ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//code.tidio.co/yoqnivfyoj3saidhseoso1umstfixyux.js" async></script>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/transaction/investLog.blade.php ENDPATH**/ ?>