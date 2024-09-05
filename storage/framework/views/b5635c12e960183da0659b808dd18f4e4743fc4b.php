<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Transaction'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('navigator'); ?>
        <!-- PAGE-NAVIGATOR -->
        <section id="page-navigator">
            <div class="container-fluid">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"
                                                       class="cursor-inherit"><?php echo e(trans('Transaction')); ?></a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- /PAGE-NAVIGATOR -->
    <?php $__env->stopPush(); ?>

    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div class="row justify-content-between">
                <div class="col-md-12">
                    <div class="card secbg form-block p-0 br-4">
                        <div class="card-body">
                            <form action="<?php echo e(route('user.transaction.search')); ?>" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <input type="text" name="transaction_id"
                                                   value="<?php echo e(@request()->transaction_id); ?>"
                                                   class="form-control"
                                                   placeholder="<?php echo app('translator')->get('Search for Transaction ID'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <input type="text" name="remark" value="<?php echo e(@request()->remark); ?>"
                                                   class="form-control"
                                                   placeholder="<?php echo app('translator')->get('Remark'); ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                            <input type="date" class="form-control" name="datetrx" id="datepicker"/>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-2 h-fill">
                                            <button type="submit" class="btn btn-primary btn-lg base-btn w-fill h-fill">
                                                <i class="fas fa-search"></i> <?php echo app('translator')->get('Search'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-30">
                <div class="col-md-12">
                    <div class="card secbg">
                        <div class="card-body ">

                            <div class="table-responsive">
                                <table class="table table table-hover table-striped text-white " id="service-table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th><?php echo app('translator')->get('SL No.'); ?></th>
                                        <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                                        <th><?php echo app('translator')->get('Amount'); ?></th>
                                        <th><?php echo app('translator')->get('Remarks'); ?></th>
                                        <th><?php echo app('translator')->get('Time'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td data-label="<?php echo app('translator')->get('SL No.'); ?>"><?php echo e(loopIndex($transactions) + $loop->index); ?></td>
                                            <td data-label="<?php echo app('translator')->get('Transaction ID'); ?>"><?php echo app('translator')->get($transaction->trx_id); ?></td>
                                            <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                        <span
                                            class="font-weight-bold text-<?php echo e(($transaction->trx_type == "+") ? 'success': 'danger'); ?>"><?php echo e(($transaction->trx_type == "+") ? '+': '-'); ?><?php echo e(getAmount($transaction->amount, config('basic.fraction_number')). ' ' . trans(config('basic.currency'))); ?></span>
                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Remarks'); ?>"> <?php echo app('translator')->get($transaction->remarks); ?></td>
                                            <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                                <?php echo e(dateTime($transaction->created_at, 'd M Y h:i A')); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <tr class="text-center">
                                            <td colspan="100%"><?php echo e(__('No Data Found!')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>



                            <?php echo e($transactions->appends($_GET)->links($theme.'partials.pagination')); ?>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//code.tidio.co/yoqnivfyoj3saidhseoso1umstfixyux.js" async></script>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/transaction/index.blade.php ENDPATH**/ ?>