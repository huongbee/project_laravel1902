<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-container">
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <?php if(Session::has('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(Session::get('error')); ?>

    </div>
    <?php endif; ?>
    <form class="form-signin" method="post" action="login">
        <?php echo csrf_field(); ?>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
    </form><!-- /form -->
    <a href="forget-password" class="forgot-password">
        Forgot the password?
    </a>
    <br>
    <a href="login/google" class="forgot-password">
       Login by Google
    </a>
</div><!-- /card-container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/admin/Desktop/project_laravel1902/resources/views/user/login.blade.php */ ?>