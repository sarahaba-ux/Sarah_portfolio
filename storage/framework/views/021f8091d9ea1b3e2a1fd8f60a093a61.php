<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home - Sarah C. Abane'); ?>

<?php $__env->startSection('content'); ?>
    <div class="intro">
        <img src="<?php echo e(asset('css/pics/bg.jpg')); ?>" alt="Background Image" id="bg-photo">
        <div class="intro-content">
            <div class="left-text">
                <h3>Welcome to my portfolio</h3>
                <h1>Sarah C. Abane</h1>
            </div>
        </div>
    </div>

    <div class="about-me" style="background-color: #d9c6b5; padding: 20px; border-radius: 8px;">
        <h2 style="color: #6f4c3e;">Portfolio</h2>
        <p style="color: #4e3b31;">Hi! I’m Sarah C. Abane, a 3rd-year BS Information Technology student at Bicol University with a passion for web development.</p>
        <p style="color: #4e3b31;">This portfolio showcases the projects and activities I have completed as part of my journey toward becoming a skilled IT professional.</p>
        <p style="color: #4e3b31;">My work includes web development, network simulations, database design, and much more. Each project demonstrates my growing expertise in different IT domains and reflects my commitment to learning and innovation.</p>
    </div>

    <div class="buttons" style="margin-top: 20px;">
        <button onclick="location.href='<?php echo e(url('about')); ?>'" style="background-color: #4e3b31; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Learn more about me</button>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/home.blade.php ENDPATH**/ ?>