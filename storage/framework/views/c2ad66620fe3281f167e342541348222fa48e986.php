<?php /* /Users/admin/Desktop/project_laravel1902/resources/views/user/register.blade.php */ ?>
<?php $__env->startSection('title','Register'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-container" id="register-form">
    <div class="text-center">
        <h4>Register account</h4>
    </div>
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post" action="/register">
        <?php echo csrf_field(); ?>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus value="<?php echo e(old('username')); ?>">
        <?php if($errors->has('username')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('username')); ?>

            </div>
        <?php endif; ?>
        <input type="email" name="email" class="form-control" placeholder="Email address" required value="<?php echo e(old('email')); ?>">
        <?php if($errors->has('email')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('email')); ?>

            </div>
        <?php endif; ?>
        <input type="text" name="fullname" class="form-control" placeholder="Fullname" required value="<?php echo e(old('fullname')); ?>">
        <?php if($errors->has('fullname')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('fullname')); ?>

            </div>
        <?php endif; ?>
        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" required >
        <?php if($errors->has('birthdate')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('birthdate')); ?>

            </div>
        <?php endif; ?>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <?php if($errors->has('password')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('password')); ?>

            </div>
        <?php endif; ?>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
        <?php if($errors->has('password_confirmation')): ?>
            <div class="text-danger">
                <?php echo e($errors->first('password_confirmation')); ?>

            </div>
        <?php endif; ?>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
    </form><!-- /form -->
    <a href="/login" class="forgot-password">
        Have account? Login
    </a>
</div><!-- /card-container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>