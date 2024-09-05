<?php $__env->startSection('title',trans($title)); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('navigator'); ?>
        <!-- PAGE-NAVIGATOR -->
        <section id="page-navigator">
            <div class="container-fluid">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"
                                                       class="cursor-inherit"><?php echo e(trans($title)); ?></a>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- /PAGE-NAVIGATOR -->
    <?php $__env->stopPush(); ?>

    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-50">
            <div id="feature">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card secbg ">
                            <div class="card-header media justify-content-between">
                                <h5 class="card-title mb-3"><?php echo app('translator')->get($title); ?></h5>
                            </div>

                            <div class="card-body ">
                                <div class="row mb-50">
                                    <div class="col-xl-12">
                                        <div class="form-group form-block br-4">
                                            <h5 class="mb-15"><?php echo app('translator')->get('Referral Link'); ?></h5>
                                            <div class="input-group mb-50">
                                                <input type="text" value="<?php echo e(route('register.sponsor',[Auth::user()->username])); ?>"
                                                       class="form-control form-control-lg bg-transparent" id="sponsorURL"
                                                       readonly>
                                                <div class="input-group-append">
                                            <span class="input-group-text copytext" id="copyBoard"
                                                  onclick="copyFunction()">
                                                <i class="fa fa-copy"></i>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <?php if(0 < count($referrals)): ?>
                                <div class="d-flex align-items-start">
                                    <div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <a class="nav-link <?php if($key == '1'): ?>  active  <?php endif; ?> " id="v-pills-<?php echo e($key); ?>-tab" data-toggle="pill" href="#v-pills-<?php echo e($key); ?>"  role="tab" aria-controls="v-pills-<?php echo e($key); ?>" aria-selected="true"><?php echo app('translator')->get('Level'); ?> <?php echo e($key); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="tab-content" id="v-pills-tabContent">

                                        <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tab-pane fade <?php if($key == '1'): ?> show active  <?php endif; ?> " id="v-pills-<?php echo e($key); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($key); ?>-tab">
                                                <?php if( 0 < count($referral)): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped text-white">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                                                <th scope="col"><?php echo app('translator')->get('Email'); ?></th>
                                                                <th scope="col"><?php echo app('translator')->get('Phone Number'); ?></th>
                                                                <th scope="col"><?php echo app('translator')->get('Joined At'); ?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $referral; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>

                                                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e($user->username); ?></td>
                                                                    <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e($user->email); ?></td>
                                                                    <td data-label="<?php echo app('translator')->get('Phone Number'); ?>">
                                                                        <?php echo e($user->mobile); ?>

                                                                    </td>
                                                                    <td data-label="<?php echo app('translator')->get('Joined At'); ?>">
                                                                        <?php echo e(dateTime($user->created_at)); ?>

                                                                    </td>

                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                                    <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//code.tidio.co/yoqnivfyoj3saidhseoso1umstfixyux.js" async></script>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        "use strict";
        function copyFunction() {
            var copyText = document.getElementById("sponsorURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            Notiflix.Notify.Success(`Copied: ${copyText.value}`);
        }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/referral.blade.php ENDPATH**/ ?>