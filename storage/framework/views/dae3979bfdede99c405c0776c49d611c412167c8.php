<?php $__env->startSection('title',trans($title)); ?>

<?php $__env->startSection('content'); ?>
    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="contact-wrapper">
                <div class="d-flex align-items-start justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-details wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.35s">
                                    <div class="d-flex justify-content-center">
                                        <div class="mb-40 pb-40">
                                            <h2 class="h2 font-weight-medium text-uppercase"><?php echo app('translator')->get(@$contact->heading); ?></h2>
                                            <h6 class="h6 fontlato"><?php echo app('translator')->get(@$contact->sub_heading); ?></h6>
                                        </div>
                                    </div>

                                    <div class="contact-info">
                                        <h4 class="h4 mb-30 font-weight-medium"><?php echo app('translator')->get(@$contact->title); ?></h4>
                                        <div class="media mb-30">
                                            <img src="<?php echo e(asset($themeTrue.'images/icon/contact_icon_1.png')); ?>" alt="Image Missing">
                                            <div class="media-body ml-20">
                                                <p class="p"><?php echo app('translator')->get(@$contact->address); ?></p>
                                            </div>
                                        </div>
                                        <div class="media mb-30">
                                            <img src="<?php echo e(asset($themeTrue.'images/icon/contact_icon_2.png')); ?>" alt="Image Missing">
                                            <div class="media-body ml-20">
                                                <p class="p"><?php echo app('translator')->get(@$contact->email); ?></p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <img src="<?php echo e(asset($themeTrue.'images/icon/contact_icon_3.png')); ?>" alt="Image Missing">
                                            <div class="media-body ml-20">
                                                <p class="p"><?php echo app('translator')->get(@$contact->phone); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-wrapper wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.35s">
                                    <form class="contact-form" action="<?php echo e(route('contact.send')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <h6 class="h6 fontlato mb-10"><?php echo app('translator')->get('Name'); ?></h6>

                                            <input class="form-control " name="name" value="<?php echo e(old('name')); ?>" type="text"
                                                   placeholder="<?php echo app('translator')->get('Name'); ?>">
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="h6 fontlato mb-10"><?php echo app('translator')->get('Email Address'); ?></h6>
                                            <input class="form-control " name="email" value="<?php echo e(old('email')); ?>"
                                                   type="email" placeholder="<?php echo app('translator')->get('Email Address'); ?>">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group">
                                            <h6 class="h6 fontlato mb-10"><?php echo app('translator')->get('Subject'); ?></h6>
                                            <input class="form-control" type="text" name="subject"
                                                   value="<?php echo e(old('subject')); ?>" placeholder="<?php echo app('translator')->get('Subject'); ?>">

                                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group">
                                            <h6 class="h6 fontlato mb-10"><?php echo app('translator')->get('Message'); ?></h6>
                                            <textarea class="textarea-control" cols="30" rows="5" name="message" placeholder="<?php echo app('translator')->get('Message'); ?>"><?php echo e(old('message')); ?></textarea>
                                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>
                                        <button class="btn-contact" type="submit"><?php echo e(trans('Send Message')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /CONTACT -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elmshrty/public_html/resources/views/themes/deepblue/contact.blade.php ENDPATH**/ ?>