

<?php $__env->startSection('title', 'Laboratory 2: Routes'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-section" id="text-section">
    <p><b>Laboratory 2: Routes<br></b> September 5, 2024. Installation of Laravel</p>
</div>

<div class="journal-container">
    <h1 style="color: rgb(122, 103, 78);"> ˚ʚ♡ɞ˚ </h1>
    
    <div id="journal-cover" style="color: rgb(122, 103, 78);">
        <h2 style="color: rgb(122, 103, 78);">Laboratory 2</h2>
        <p>Laboratory 2: Routes<br>Click the button to open the journal.</p>
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
        title: "Part 1: Defining Basic Routes", 
        content: "<ul>" +
             "<li><b>Blade View:</b> `homepage.blade.php` displays a welcome message.</li>" +
             "<li><b>Controller Logic:</b>" +
             "<ul>" +
             "<li>The `homepage()` method in `LoginController` retrieves the username.</li>" +
             "<li>Defaults to 'Guest' if not provided and passes it as `$message`.</li>" +
             "</ul></li>" +
             "<li><b>Route Logic:</b>" +
             "<ul>" +
             "<li>Uses `Route::get()` in `web.php` to link requests to the controller.</li>" +
             "<li>Displays a personalized message ('Welcome, [username]') or defaults to 'Guest.'</li>" +
             "</ul></li>",
        imageBelow: "../css/pics/basic_routes.png" // Add image below
    },
    {
        title: "", 
        content: "" +
         "<li><b>Created additional routes that:</b></li>" +
         "<ul>" +
         "<li>Return a view for an 'About Us' page, linking the `/about` URL to the `about` method in the `LoginController`, allowing for an optional username.</li>" +
         "<li>Redirect requests from `/home` to the root URL `/`, effectively guiding users back to the homepage.</li>" +
         "<li>Without redirection, return a 404 page since `/home` is not defined; with redirection, automatically guide users to http://localhost:8000/ (homepage).</li>" +
         "<li>Display a 'Contact Us' form to facilitate user inquiries.</li>" +
         "<br></ul></li>",
        imageRight: "../css/pics/part1.png" // Path for the right image
    },
    {
        title: "Part 2: Using Route Parameters", 
        content: "In the lab, I completed a series of tasks, which included the following steps:<br><ul>" +
         "<li><b>Route Parameters</b></li>" +
         "<ul>" +
         "<li>Defined a route with a required parameter: The `{username}` parameter is required, meaning the route `/user/johndoe` (for example, if the entered username is 'johndoe') will pass 'johndoe' to the `userProfile` method in the `LoginController`.</li>" +
         "<li>Defined a route with an optional parameter: The `{username?}` makes the username optional. If no username is provided, the `userProfile` method defaults to using 'guest' as the username, displaying 'Welcome, Guest!'.</li>" +
         "<li>In the `LoginController`, we have a method that sets a default username if not provided, stores it in the session, and redirects the user to the homepage with the username in the URL.</li>" +
         "</ul>" ,

        imageBelow: "../css/pics/part2.png" // Path for the right image
    },
    {
        title: "", 
        content: "<br>" +
        "<li><b>Apply regular expression constraints to the route parameters:</b></li>" +
         "<ul>" +
         "<li>The `where()` method applies a regular expression constraint on the parameter: `[A-Za-z]+` ensures that only alphabetic characters are allowed, both uppercase (A-Z) and lowercase (a-z). The `+` indicates that one or more characters are required if the username is provided.</li>" +
         "<li>In the `login.blade.php` form, we provide logic that allows for an empty string, meaning the username is optional. An error message is displayed in case the user inputs invalid characters.</li>" +
         "</ul>" +
         "<li><b>Validation in the Controller:</b></li>" +
         "<ul>" +
         "<li>'nullable|alpha': This server-side validation rule ensures that the username can either be null (optional) or, if provided, it must only consist of alphabetic characters.</li>" +
         "</ul>" +
         "</ul><br>",
        imageRight: "../css/pics/part2_1.png" // Path for the right image
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

<?php echo $__env->make('layout.master_lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/lab2.blade.php ENDPATH**/ ?>