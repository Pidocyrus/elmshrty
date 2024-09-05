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
                                                       class="cursor-inherit"><?php echo e(__($page_title)); ?></a></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- /PAGE-NAVIGATOR -->
    <?php $__env->stopPush(); ?>

    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card secbg br-4">
                        <div class="card-header media justify-content-between">
                            <h5 class="card-title mb-3"><?php echo app('translator')->get($page_title); ?></h5>
                            <a href="<?php echo e(route('user.ticket.create')); ?>" class="btn btn-sm btn-success"> <i class="fa fa-plus-circle"></i> <?php echo app('translator')->get('Create Ticket'); ?></a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-white text-white">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('Subject'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Last Reply'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td data-label="<?php echo app('translator')->get('Subject'); ?>">
                                                    <span
                                                        class="font-weight-bold"> [<?php echo e(trans('Ticket#').$ticket->ticket); ?>

                                                        ] <?php echo e($ticket->subject); ?> </span>
                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                <?php if($ticket->status == 0): ?>
                                                    <span
                                                        class="badge badge-pill badge-success"><?php echo app('translator')->get('Open'); ?></span>
                                                <?php elseif($ticket->status == 1): ?>
                                                    <span
                                                        class="badge badge-pill badge-primary"><?php echo app('translator')->get('Answered'); ?></span>
                                                <?php elseif($ticket->status == 2): ?>
                                                    <span
                                                        class="badge badge-pill badge-warning"><?php echo app('translator')->get('Replied'); ?></span>
                                                <?php elseif($ticket->status == 3): ?>
                                                    <span class="badge badge-pill badge-dark"><?php echo app('translator')->get('Closed'); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Last Reply'); ?>">
                                                <?php echo e(diffForHumans($ticket->last_reply)); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                <a href="<?php echo e(route('user.ticket.view', $ticket->ticket)); ?>"
                                                   class="btn btn-sm base-btn"
                                                   data-toggle="tooltip" title="" data-original-title="Details">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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

                            <?php echo e($tickets->appends($_GET)->links($theme.'partials.pagination')); ?>




                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/support/index.blade.php ENDPATH**/ ?>