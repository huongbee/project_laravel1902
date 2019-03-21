<?php /* /Users/admin/Desktop/project_laravel1902/resources/views/pages/home.blade.php */ ?>
<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Admin</b>
                </div>
                <div class="panel-body">
                    content
                </div>
            </div>
        </section>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>