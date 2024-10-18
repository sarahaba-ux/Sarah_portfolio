

<?php $__env->startSection('title', 'Laboratory 4: Middleware'); ?>

<?php $__env->startSection('content'); ?>
<div class="text-section" id="text-section">
    <p><b>Laboratory 4: Middleware<br></b> October 2, 2024. Installation of Larave</p>
</div>

<div class="journal-container">
    <h1 style="color: rgb(122, 103, 78);"> ˚ʚ♡ɞ˚ </h1>
    
    <div id="journal-cover" style="color: rgb(122, 103, 78);">
        <h2 style="color: rgb(122, 103, 78);">Laboratory 4</h2>
        <p>Laboratory 4: Middleware<br>Click the button to open the journal.</p>
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
    title: "Part 1: Create and Register New Middleware",
    content: "<ul>" +
        "<li><b>Steps:</b>" +
        "<ul>" +
        "<li>Open command prompt or git bash and create CheckAge and LogRequests middleware.</li>" +
        "<li>This creates a new middleware file at `app/Http/Middleware/<br>CheckAge.php`.</li>" +
        "<li>This creates a new middleware file at `app/Http/Middleware/<br>LogRequests.php`.</li>" +
        "</ul></li><br>" +
        "<li><b>CheckAge Middleware:</b> " +
        "<ul>" +
        "<li>The CheckAge middleware checks if a user's age is greater than or equal to 18.</li>" +
        "<li>If the user's age is greater than or equal to 18:</li>" +
        "<ul>" +
        "<li>If the age is 20 or below, it shows the home view.</li>" +
        "<li>If the age is above 20, it shows the adults view.</li>" +
        "</ul>" +
        "<li>If the user's age is less than 18, it redirects them to a denied view (Access Denied page).</li>" +
        "<li>This ensures that users see different pages based on their age.</li>" +
        "</ul></li><br>" +
        "<li><b>LogRequests Middleware:</b> " +
        "<ul>" +
        "<li>It captures the URL, HTTP method (e.g., GET, POST), and the current timestamp.</li>" +
        "<li>The log message is then saved to a file called `log.txt`, adding new entries to the file.</li>" +
        "<li>After logging, the middleware passes the request to the next process using `$next($request)`.</li>" +
        "</ul></li>" +
        "</ul>",
    imageBelow: "../css/pics/lab4.png" // Add image below
},
{
    title: "",
    content: "<ul>" +
        "<li><b>Steps:</b>" +
        "<ul>" +
        "<li>Open command prompt or git bash and create CheckAge and LogRequests middleware.</li>" +
        "<li>This creates a new middleware file at `app/Http/Middleware/<br>CheckAge.php`.</li>" +
        "<li>This creates a new middleware file at `app/Http/Middleware/<br>LogRequests.php`.</li>" +
        "</ul></li><br>" +
        "<li><b>log.txt:</b> " +
        "<ul>" +
        "<li>The `log.txt` consists of URL, Method, and Timestamp.</li>" +
        "</ul></li><br>" +
        "<li><b>Registration of CheckAge and LogRequests Middleware:</b> " +
        "<ul>" +
        "<li><b>Global Middleware:</b> These middleware will run on every request to the application. By adding CheckAge and LogRequests here, it ensures that every request will have its age checked and the request logged. Global middleware applies to all requests.</li>" +
        "<li><b>Route-Specific Middleware:</b> These middleware are applied only to specific routes where we explicitly include them. This allows us to control which routes should have age checking and logging functionality.</li>" +
        "</ul></li>" +
        "</ul>",
    imageRight: "../css/pics/log.png" // Add image below
},
{
    title: "Part 1: Create and Register New Middleware",
    content: "<ul>" +
        "<li><b>Explanation/Summary:</b>" +
        "<ul>" +
        "<li>1. Middlewares are used to filter HTTP requests and responses. CheckAge can validate the age of a user, and LogRequests can log incoming requests.</li>" +
        "<ul>" +
        "<li><b>a. CheckAge:</b> This middleware helps control access to specific content based on the user's age, ensuring that the application responds appropriately to different age groups.</li>" +
        "<li><b>b. LogRequests:</b> This middleware is essential for tracking and auditing user activity, helping developers understand how the application is being used and troubleshooting any issues that may arise.</li>" +
        "</ul>" +
        "<br><li>2. By registering middleware as both global and route-specific, we can decide whether to apply the middleware universally or only to certain parts of the application, offering flexibility and control over how requests are processed.</li>" +
        "</ul></li>" +
        "</ul>",
},
{
    title: "Part 2: Assign Middleware to Routes",
    content: "<ul>" +
        "<li><b>Code: web.php</b></li>" +
        "<li>1. Welcome Page Route:</li>" +
        "<ul>" +
        "<li><b>a. Route:</b> /</li>" +
        "<li><b>b. Purpose:</b> Displays the age verification form (view called Age).</li>" +
        "</ul>" +
        "<li>2. Route Group (with LogRequests Middleware):</li>" +
        "<ul>" +
        "<li><b>a.</b> Inside this group, all routes will log the request details (like URL and timestamp) via the LogRequests middleware.</li>" +
        "<li><b>b. Age Verification Route:</b></li>" +
        "<ul>" +
        "<li><b>i. Route:</b> /</li>" +
        "<li><b>ii. Purpose:</b> After submitting the age form, the CheckAge middleware is applied to ensure the user meets the age requirement. If the user is old enough, they are shown the adults view.</li>" +
        "</ul>" +
        "<li><b>c. Other Routes ( /homepage, /about, /content, etc.):</b></li>" +
        "<ul>" +
        "<li><b>i.</b> These pages display content specific to the route, but also benefit from logging due to the group middleware.</li>" +
        "</ul>" +
        "</ul>" +
        "<li>3. Access Denied Page:</li>" +
        "<ul>" +
        "<li><b>a. Route:</b> /denied</li>" +
        "<li><b>b. Purpose:</b> This page is shown if the user fails the age check.</li>" +
        "</ul>" +
        "<li>4. Restricted Content Route (Adults Only):</li>" +
        "<ul>" +
        "<li><b>a. Route:</b> /adults</li>" +
        "<li><b>b. Purpose:</b> Only users 21 years or older can access this route. The CheckAge middleware checks the age and restricts access if the condition isn't met.</li>" +
        "</ul>" +
        "</ul>",
},
{
    title: "Part 2: Assign Middleware to Routes",
    content: "<ul>" +
        "<li>As I tested the middleware, I simulated different age values in the request:</li>" +
        "<ul>" +
        "<li><b>Age: 15 (and below 18 years old):</b> When I set the age below 18, the system redirected me to the access denied page, preventing access to restricted content.</li>" +
        "<li><b>Age: 18:</b> For users aged 18 to 20 years, I found that they could access the page. If a username was entered, I could see it reflected in the URL. If no username was provided, it defaulted to 'Guest.'</li>" +
        "<li><b>Age: 21 (For Adults):</b> Users aged 21 and older were granted access to the adult-only content, which was exactly the intended behavior for this route.</li>" +
        "</ul>" +
        "</ul>",
},
{
    title: "Part 3: Create Middleware with Parameters",
    content: "<ul>" +
        "<li><b>1. Modified CheckAge Middleware:</b> I updated it to accept a <code>$minAge</code> parameter for age validation. Users aged 18-20 see the 'home' view, and those over 20 see the 'adults' view. Users under 18 are redirected to an 'Access Denied' page.</li>" +
        "<li><b>2. New Route with Parameterized Middleware:</b> The <code>/adults</code> route uses CheckAge with a minimum age of 21 (<code>middleware(CheckAge::class . ':21')</code>), restricting access accordingly.</li>" +
        "</ul>",
    imageBelow: "../css/pics/layout.png" // Add image below
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

<?php echo $__env->make('layout.master_lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/lab4.blade.php ENDPATH**/ ?>