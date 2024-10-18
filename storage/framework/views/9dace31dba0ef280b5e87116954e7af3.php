<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title> <!-- Placeholder for page-specific titles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style_home.css')); ?>">
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <a href="#"><img src="<?php echo e(asset('css/pics/logo.png')); ?>" alt="Sarah logo" style="height:40px;"></a>
        <ul>
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
            <li><a href="<?php echo e(url('/lab1')); ?>">Laboratory 1</a></li>
            <li><a href="<?php echo e(url('/lab2')); ?>">Laboratory 2</a></li>
            <li><a href="<?php echo e(url('/lab3')); ?>">Laboratory 3</a></li>
            <li><a href="<?php echo e(url('/lab4')); ?>">Laboratory 4</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?> <!-- Placeholder for page-specific content -->
    </div>

    <!-- Footer (Optional) -->
    <footer>
        <p>&copy; 2024 Sarah C. Abane. All rights reserved.</p>
    </footer>

</body>
</html>
<?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/layout/master.blade.php ENDPATH**/ ?>