

<?php $__env->startSection('title', 'Laboratory 1: Setup'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-section" id="text-section">
    <p><b>Laboratory 1: Setup<br></b> August 26, 2024. Installation of Laravel <b><br><br> https://github.com/sarahaba-ux/laravel</b></p>
</div>

<div class="journal-container">
    <h1 style="color: rgb(122, 103, 78);"> ˚ʚ♡ɞ˚ </h1>
    
    <div id="journal-cover" style="color: rgb(122, 103, 78);">
        <h2 style="color: rgb(122, 103, 78);">Laboratory 1</h2>
        <p>Laboratory 1: Setup<br>Click the button to open the journal.</p>
        <button onclick="openJournal()">Open</button>
    </div>

    <div id="journal" style="display: none;">
        <button id="close" class="icon-button close-button" onclick="closeJournal()">&#x2715;</button>
        
        <div class="left-page">
            <div id="entry-left"></div>
        </div>
        
        <div class="right-page">
            <div id="entry-right"></div>
        </div>
        
        <button id="prev" class="icon-button prev-button" onclick="prevEntry()">&#x276E;</button>
        <button id="next" class="icon-button next-button" onclick="nextEntry()">&#x276F;</button>
    </div>
</div>

<script>
    const entries = [
    { 
        title: "Key Directories and Files in Laravel", 
        content: "1. 'app/': Contains the core code of the application.\n <br>" +
                 "2. 'bootstrap/': Initializes and configures the Laravel framework.\n <br>" +
                 "3. 'config/': Contains all the application's configuration files.\n <br>"+ 
                 "4. ‘public/’: The web server's root directory. \n <br><br>" +  
                 "Access more documentation at: <b> https://github.com/sarahaba-ux/laravel <b>",
        imageBelow: "../css/pics/act1.png" // Add image below
    },
    {
        title: "Setup", 
        content: "In the lab, I successfully completed a comprehensive series of tasks that involved several critical steps, each contributing to the overall objectives of the project.<br><ul>" +
                 "<li>Installed and configured Laravel</li>" +
                 "<li>Created a project</li>" +
                 "<li>Edited the PHP file</li>" +
                 "<li>Set up a Git repository with a remote</li>" +
                 "<li>Configured the `.env` file</li>" +
                 "<li>Created views (Homepage, About, Content)</li>" +
                 "<li>Set up and tested routes</li>" +
                 "<li>Navigated and edited the pages</li>" +
                 "</ul><br><b>Final Output:<b>"+
                 "</ul><br><b>Mingkai's Life<b>"+
                  "</ul><br>",
        imageRight: "../css/pics/final.png" // Path for the right image
    },
    { 
        title: "Configuration", 
        content: "I configured the .env file to establish the database connection, ensuring that the application can communicate effectively with the database server. I took the time to carefully adjust the file paths, ensuring that all links across the project were established for optimal functionality.<br><br><b>In Herd:<b>",
        imageBelow: "../css/pics/configuration.png" // Add image below Configuration
    },
    { 
        title: "Project Creation", 
        content: "Created the project structure and added remote repository in GitHub.",
        imageRight: "../css/pics/creation.png" // Add image below Project Creation
    },
    { 
        title: "Editing the php file", 
        content: "Ensure that `variables_order` includes `GPCS` (GET, POST, COOKIE, SERVER) to maintain Laravel compatibility. \n <br><br><b>.php file<b>",
        imageBelow: "../css/pics/php.png" // Add image below Project Creation
    },
    { 
        title: "Creating Views & Creating and Running Routes", 
        content: "I created views for the Homepage, which serves as the main entry point for users to navigate the application, the About page, designed to share detailed information about the organization, and the Content page, which highlights the various resources and offerings available to users.<br><br><b>Paths:</b>",
        imageRight: "../css/pics/views.png" // Add image below Creating Views
    },
    { 
        title: "Starting Laravel Server & Testing of Routes", 
        content: "I started the Laravel server and tested the routes to ensure that all functionalities are working as intended and that users can navigate through the application seamlessly.",
        imageBelow: "../css/pics/test.png" // Add image below Navigation and Routes
    },
    { 
        title: "Editing the Routes (web.php)", 
        content: "The ->name('...') method is a way to give a route a specific name, making URL generation, redirection, and code maintenance easier and more flexible. ",
        imageRight: "../css/pics/webphp.png" // Add image below Navigation and Routes
    },
    { 
        title: "Navigating the Pages", 
        content: "The navigation bar on my homepage that allow me to navigate to the Home, About, and Content pages. ",
        imageBelow: "../css/pics/navigation.png" // Add image below Navigation and Routes
    },
    { 
        title: "Final Output:", 
        content: "To see more, just access the github link provided: <br><br><b>https://github.com/sarahaba-ux/laravel <b>",
        imageRight: "../css/pics/final.png" // Add image below Navigation and Routes
    },
];

    let currentLeftEntry = 0;
    let currentRightEntry = 1;

    function updateEntry() {
    const leftEntry = entries[currentLeftEntry];
    const rightEntry = entries[currentRightEntry];

    // Update left page
    document.getElementById('entry-left').innerHTML = '';
    if (leftEntry.imageLeft) {
        document.getElementById('entry-left').innerHTML = `<img src="${leftEntry.imageLeft}" alt="Image for ${leftEntry.title}" style="width: 100%;">`;
    } else {
        document.getElementById('entry-left').innerHTML += `<h2>${leftEntry.title}</h2><p>${leftEntry.content}</p>`;
        if (leftEntry.imageBelow) {
            document.getElementById('entry-left').innerHTML += `<img src="${leftEntry.imageBelow}" alt="Image for ${leftEntry.title}" style="width: 100%; margin-top: 10px;">`;
        }
    }

    // Update right page
document.getElementById('entry-right').innerHTML = '';
if (rightEntry.imageRight) {
    document.getElementById('entry-right').innerHTML = `<h2>${rightEntry.title}</h2><p>${rightEntry.content}</p>`; // Add content before image
    document.getElementById('entry-right').innerHTML += `<img src="${rightEntry.imageRight}" alt="Image for ${rightEntry.title}" style="width: 100%;">`;
} else {
    document.getElementById('entry-right').innerHTML += `<h2>${rightEntry.title}</h2><p>${rightEntry.content}</p>`;
}


    // Log entries for debugging
    console.log('Left Entry:', leftEntry);
    console.log('Right Entry:', rightEntry);

    applyFont();
}


    function nextEntry() {
        if (currentRightEntry < entries.length - 1) {
            currentLeftEntry += 2;
            currentRightEntry += 2;
            updateEntry();
        }
    }

    function prevEntry() {
        if (currentLeftEntry > 0) {
            currentLeftEntry -= 2;
            currentRightEntry -= 2;
            updateEntry();
        }
    }

    function openJournal() {
        document.getElementById('journal-cover').style.display = 'none';
        document.getElementById('journal').style.display = 'flex';
        updateEntry();
    }

    function closeJournal() {
        document.getElementById('journal').style.display = 'none';
        document.getElementById('journal-cover').style.display = 'block';
        currentLeftEntry = 0;
        currentRightEntry = 1;
    }

    function applyFont() {
        document.querySelectorAll('#entry-left, #entry-right').forEach(function(element) {
            element.style.fontFamily = "'Baloo 2', sans-serif";
        });
    }

    window.onload = function() {
        applyFont();
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master_lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/lab1.blade.php ENDPATH**/ ?>