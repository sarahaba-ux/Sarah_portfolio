

<?php $__env->startSection('title', 'Laboratory 3: Layout'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-section" id="text-section">
    <p><b>Laboratory 3: Layout<br></b> September 18, 2024. Installation of Laravel </p>
</div>

<div class="journal-container">
    <h1 style="color: rgb(122, 103, 78);"> ˚ʚ♡ɞ˚ </h1>
    
    <div id="journal-cover" style="color: rgb(122, 103, 78);">
        <h2 style="color: rgb(122, 103, 78);">Laboratory 3</h2>
        <p>Laboratory 3: Layout<br>Click the button to open the journal.</p>
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
    title: "Blade Template Files", 
    content: "<ul>" +
         "<li><b>Layout File:</b> `Views/Components/Layout.blade.php` defines the overall structure of our web pages, enabling separation of layout and content for better organization.</li><br>" +
         "<li><b>Controller Logic:</b>" +
         "<ul>" +
         "<li>The `homepage()` method in `LoginController` retrieves the username.</li>" +
         "<li>Defaults to 'Guest' if not provided and passes it as `$message`.</li> <br>" +
         "</ul></li>" +
         "<li><b>Route Logic:</b>" +
         "<ul>" +
         "<li>Uses `Route::get()` in `web.php` to link requests to the controller.</li>" +
         "<li>Displays a personalized message ('Welcome, [username]') or defaults to 'Guest.'</li>" +
        "</ul></li>",
    imageBelow: "../css/pics/layout.png" // Add image below
    },
    {
        title: "Laravel Routing and Layouts", 
        content: "" +
         "<li><b>Extending the Layout and Inserting Content:</b></li>" +
         "<ul>" +
    "<li><b>Breakdown of the Routes:</b>" +
    "<ul>" +
        "<li><i>Homepage:</i> Serves the main homepage view.</li>" +
        "<li><i>About Page:</i> Displays information about the website or company.</li>" +
        "<li><i>Content Page:</i> Can be used for displaying specific content (e.g., articles, resources).</li>" +
        "<li><i>Contact Page:</i> Displays a contact form.</li>" +
        "<li><i>Contact Form Submission:</i> Handles POST requests from the contact form, sends an email using the ContactMe Mailable, and redirects back to the contact page with a success message.</li>" +
        "<li><i>Newsfeed:</i> Displays a newsfeed based on an optional category parameter, using the NewsfeedController.</li>" +
    "</ul></li>" +
"</ul></li>" +
"</ul>",
        imageRight: "../css/pics/layout1.png" // Path for the right image
    },
    {
        title: "", 
        content: "<br>" +
        "" +
         "<ul>" +
         "<li><b>Challenges Faced:</b><br>We frequently had to modify the .env and database configuration files to accommodate different environments, which often made the setup process cumbersome. Each time we cloned the project into a new environment, we had to sync the configuration files and ensure everything was aligned properly, adding extra complexity and sometimes leading to configuration mismatches. Managing these environment-specific settings became one of the more time-consuming aspects of development, especially when working across multiple machines or deployment stages.</li>" +
         "<li><b> Understanding Blade Templates:</b><br> As we worked more with Blade templates, it became crucial to understand how to create reusable UI elements that could accept dynamic content, making our components more flexible and efficient. This approach helped maintain consistency across our layouts while still providing flexibility for each page's unique content.</li>" +
         "</ul>" +
         "" +
         "<ul>" +
         "" +
         "</ul>" +
         "</ul><br>",
        imageRight: "../css/pics/part2_1.png" // Path for the right image
    },
    {
        title: "Summary:", 
        content: "<br>" +
        "" +
         "<ul>" +
         "<li>In summary, slot is for components, while yield is for views extending layouts.</li>" +
         "" +
         "</ul>" +
         "" +
         "<ul>" +
         "" +
         "</ul>" +
         "</ul><br>",
        imageRight: "../css/pics/summary.png" // Path for the right image
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

<?php echo $__env->make('layout.master_lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/lab3.blade.php ENDPATH**/ ?>