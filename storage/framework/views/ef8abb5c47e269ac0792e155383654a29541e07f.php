<?php $__env->startSection('title','500'); ?>


<?php $__env->startSection('content'); ?>
    <section id="add-recipient-form" class="wow fadeInUp" data-wow-delay=".2s" data-wow-offset="300">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 text-center">
                    <span class="display-1 d-block"><?php echo app('translator')->get('Internal Server Error'); ?></span>
                    <div class="mb-4 lead"><?php echo app('translator')->get("The server encountered an internal error misconfiguration and was unable to complate your request. Please contact the server administrator."); ?></div>
                    <a class="btn-base text-white" href="<?php echo e(url('/')); ?>" ><?php echo app('translator')->get('Back To Home'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/errors/500.blade.php ENDPATH**/ ?>