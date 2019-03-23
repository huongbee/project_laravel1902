
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <base href="<?php echo e(asset('')); ?>">
    <!-- Bootstrap core CSS -->
    <link href="admin-master/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin-master/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="admin-master/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="admin-master/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="admin-master/css/owl.carousel.css" type="text/css">
    <link href="admin-master/css/style-responsive.css" rel="stylesheet" />
    <link href="admin-master/css/login-form.css" rel="stylesheet">

    <link href="admin-master/css/my-style.css" rel="stylesheet">
</head>

  <body>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div><!-- /container -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="admin-master/js/jquery.js"></script>
    <script src="admin-master/js/bootstrap.min.js"></script>
    
  </body>
</html>

<?php /* /Users/admin/Desktop/project_laravel1902/resources/views/user/master.blade.php */ ?>