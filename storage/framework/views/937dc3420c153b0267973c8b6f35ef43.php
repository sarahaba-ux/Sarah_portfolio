<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style_about.css')); ?>">
</head>
<body>

    <header class="header" style="position: relative;">
        <div class="background-image">
            <img src="<?php echo e(asset('css/pics/bg.jpg')); ?>" alt="Background image">
        </div>
        <div class="profile-image">
            <img src="<?php echo e(asset('css/pics/profile.jpg')); ?>" alt="Profile image">
        </div>
    </header>

    <div class="search-section">
        <input type="text" placeholder="Search..." id="search-bar">
        <button type="button" onclick="searchFunction()">Search</button>
    </div>

    <nav>
        <ul>
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
            <li><a href="<?php echo e(url('/lab1')); ?>">Laboratory 1</a></li>
            <li><a href="<?php echo e(url('/lab2')); ?>">Laboratory 2</a></li>
            <li><a href="<?php echo e(url('/lab3')); ?>">Laboratory 3</a></li>
            <li><a href="<?php echo e(url('/lab4')); ?>">Laboratory 4</a></li>
        </ul>
    </nav>

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer>
        <p>&copy; 2024 Sarah C. Abane. All rights reserved.</p>
    </footer>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/layout/master_about.blade.php ENDPATH**/ ?>