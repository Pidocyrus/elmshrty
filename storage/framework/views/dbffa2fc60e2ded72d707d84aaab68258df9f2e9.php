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

    <section id="dashboard">
        <div class="dashboard-wrapper add-fund pb-20">
            <div class="row feature-wrapper top-0 add-fund">
                <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-lg-3 col-md-4  col-sm-6 col-6 mb-30">
                        <div class="card card-type-1 text-center">

                            <div class="card-icon">
                                <img src="<?php echo e(getFile(config('location.withdraw.path').$gateway->image)); ?>"
                                     alt="<?php echo e($gateway->name); ?>" class="gateway">
                            </div>
                            <button type="button"
                                    data-id="<?php echo e($gateway->id); ?>"
                                    data-name="<?php echo e($gateway->name); ?>"
                                    data-min_amount="<?php echo e(getAmount($gateway->minimum_amount, $basic->fraction_number)); ?>"
                                    data-max_amount="<?php echo e(getAmount($gateway->maximum_amount,$basic->fraction_number)); ?>"
                                    data-percent_charge="<?php echo e(getAmount($gateway->percent_charge,$basic->fraction_number)); ?>"
                                    data-fix_charge="<?php echo e(getAmount($gateway->fixed_charge, $basic->fraction_number)); ?>"
                                    class="btn btn-danger btn-block  mt-2 colorbg-1 addFund"
                                    data-backdrop='static' data-keyboard='false'
                                    data-toggle="modal" data-target="#addFundModal"><?php echo app('translator')->get('PAYOUT NOW'); ?></button>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <script src="//code.tidio.co/yoqnivfyoj3saidhseoso1umstfixyux.js" async></script>
    </section>





    <?php $__env->startPush('loadModal'); ?>
        <div id="addFundModal" class="modal fade addFundModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content form-block">
                    <div class="modal-header">
                        <h6 class="modal-title method-name"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <form action="<?php echo e(route('user.payout.moneyRequest')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                    <div class="modal-body ">
                        <div class="payment-form ">
                            <p class="text-danger depositLimit"></p>
                            <p class="text-danger depositCharge"></p>

                            <div class="form-group mb-30">
                                <strong class="mb-2 d-block modal_text_level"><?php echo app('translator')->get('Select wallet'); ?></strong>
                                <select class="form-control" name="wallet_type">

                                        <option
                                            value="balance"><?php echo app('translator')->get('Deposit Balance - '.$basic->currency_symbol.getAmount(auth()->user()->balance)); ?></option>
                                        <option value="interest_balance"><?php echo app('translator')->get('Interest Balance -'.$basic->currency_symbol.getAmount(auth()->user()->interest_balance)); ?></option>
                                </select>
                            </div>

                            <input type="hidden" class="gateway" name="gateway" value="">

                            <div class="form-group mb-30">
                                <label><?php echo app('translator')->get('Amount'); ?></label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="amount form-control" name="amount">
                                    <div class="input-group-append">
                                        <span class="input-group-text show-currency"></span>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="submit" class="btn btn-primary base-btn "><?php echo app('translator')->get('Next'); ?></button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    <?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>

    <?php if(count($errors) > 0 ): ?>
        <script>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            Notiflix.Notify.Failure("<?php echo app('translator')->get($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

    <script>
        "use strict";

        var id, minAmount, maxAmount, baseSymbol, fixCharge, percentCharge, currency, gateway;

        $('.addFund').on('click', function () {
            id = $(this).data('id');
            gateway = $(this).data('gateway');
            minAmount = $(this).data('min_amount');
            maxAmount = $(this).data('max_amount');
            baseSymbol = "<?php echo e(config('basic.currency_symbol')); ?>";
            fixCharge = $(this).data('fix_charge');
            percentCharge = $(this).data('percent_charge');
            currency = $(this).data('currency');
            $('.depositLimit').text(`<?php echo app('translator')->get('Transaction Limit:'); ?> ${minAmount} - ${maxAmount}  ${baseSymbol}`);

            var depositCharge = `<?php echo app('translator')->get('Charge:'); ?> ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' + percentCharge + ' % ' : ''}`;
            $('.depositCharge').text(depositCharge);
            $('.method-name').text(`<?php echo app('translator')->get('Payout By'); ?> ${$(this).data('name')}`);
            $('.show-currency').text("<?php echo e(config('basic.currency')); ?>");
            $('.gateway').val(id);
        });
        $('.close').on('click', function (e) {
            $('#loading').hide();
            $('.amount').val(``);
            $("#addFundModal").modal("hide");
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/user/payout/money.blade.php ENDPATH**/ ?>