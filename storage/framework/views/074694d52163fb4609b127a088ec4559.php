

<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-section" id="text-section">
    <p>This is a brief description or message for the profile page. Below you will find important dates and projects.</p>
</div>

<div class="content-section">
    <!-- Left container -->
    <div class="left-container">
        <h3>Select Date</h3>
        <div class="calendar-container">
            <img src="<?php echo e(asset('css/pics/calendar.webp')); ?>" alt="Calendar" class="calendar-image">
            <!-- Inner container for dates/text -->
            <div class="date-list">
                <b>August 21, 2024</b><br> Homework 1: Examples of websites or apps for each framework architecture<br><br>
                <b>August 26, 2024</b><br> Laboratory 1: Setup<br><br>
                <b>September 5, 2024</b><br> Laboratory 2: Routes<br><br>
                <b>September 18, 2024</b><br> Laboratory 3: Layout<br><br>
                <b>October 2, 2024</b><br> Laboratory 4: Middleware<br><br>
            </div>
        </div>
    </div>

    <!-- Right container -->
    <div class="right-container">
        <h3>Projects</h3>
        <div class="images-grid">
            <div class="project-card">
                <img src="<?php echo e(asset('css/pics/ass.png')); ?>" alt="Project 1">
                <div class="text-container">
                    <h4>Homework: <br>August 21, 2024</h4>
                    <p>Websites for each framework architecture</p>
                </div>
            </div>
            <div class="project-card">
                <img src="<?php echo e(asset('css/pics/ass.png')); ?>" alt="Project 1">
                <div class="text-container">
                    <h4>Individual Project</h4>
                    <p>Title: Mingkai's Life</p>
                </div>
            </div>
        </div>
        <div class="text-container">
            <h3>Title: Mingkai's Life</h3>
            <h4>Individual and Group Activity</h4>
            <a href="https://github.com/sarahaba-ux/laravel" target="_blank">GitHub Repository</a>
        </div>
        <br>
        <p>To learn more or access a laboratory, click the button for the one you want to see.</p>
        <a href="<?php echo e(url('lab1')); ?>" class="learn-more-button">Lab 1: Setup</a>
        <a href="<?php echo e(url('lab1')); ?>" class="learn-more-button">Lab 2: Routes</a>
        <a href="<?php echo e(url('lab1')); ?>" class="learn-more-button">Lab 3: Layout</a>
        <a href="<?php echo e(url('lab1')); ?>" class="learn-more-button">Lab 4: Middleware</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master_about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/about.blade.php ENDPATH**/ ?>