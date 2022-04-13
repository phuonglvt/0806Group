

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('custom-css'); ?>
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 d-md-none d-lg-block">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('/images/login-background.png')); ?>"
                            alt="Login background" class="w-100 vh-100"
                            style="object-fit: cover; object-position: left;"></a>
                </div>
                <div class="col-sm-12 col-lg-4 text-black">
                    <div class="container">
                        <div class="text-center">
                            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                            <img class="logo" src="<?php echo e(asset('/images/login-logo.png')); ?>" alt="login logo"
                                style="margin: auto; height: 100px;margin-top: 150px">
                        </div>

                        <div class="align-items-center">

                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <h3 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">LOGIN</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example18">Email address</label>
                                    <input type="email" id="form2Example18" name="email"
                                        class="form-control form-control-lg" value="<?php echo e(old('email')); ?>" />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example28">Password</label>
                                    <input type="password" id="form2Example28" name="password"
                                        class="form-control form-control-lg" value="<?php echo e(old('password')); ?>" />
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if(session('error')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" style="width: 100%"
                                        type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devApp\0806Group\project\resources\views/auth/login.blade.php ENDPATH**/ ?>