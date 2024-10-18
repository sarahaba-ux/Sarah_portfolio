<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory 1: Routes</title>
    <link rel="stylesheet" href="../css/style_projects.css">
</head>

<body>
    <header class="header" style="position: relative;">
        <div class="background-image">
            <img src="../css/pics/bg.jpg" alt="Background image">
        </div>
        <div class="profile-image">
            <img src="../css/pics/profile.jpg" alt="Profile image">
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
            <li><a href="<?php echo e(url('/projects')); ?>">Projects</a></li>
            <li><a href="<?php echo e(url('/diary')); ?>">Diary</a></li>
            <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
        </ul>
    </nav>

    <div class="text-section" id="text-section">
        <p>Welcome to Mingkai's diary. Here are some of the latest entries:</p>
    </div>

    
<div class="journal-container">
    <h1 style="color: rgb(122, 103, 78);"> ˚ʚ♡ɞ˚ </h1>
    
    <div id="journal-cover" style="color: rgb(122, 103, 78);">
        <h2 style="color: rgb(122, 103, 78);">Laboratory 1</h2>
        <p>Laboratory 1: Setup<br>Click the button to open the journal.</p>
        <button onclick="openJournal()">Open Journal</button>
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
        function searchFunction() {
            // Get the search query
            var query = document.getElementById("search-bar").value.trim().toLowerCase();

            // Check if there's any text to search
            if (!query) {
                alert("Please enter text to search.");
                return;
            }

            // Clear previous highlights
            clearHighlights();

            // Get all the text content from the relevant sections
            var content = document.querySelectorAll('.text-section, .project-list');

            // Loop through each content section and apply highlights
            content.forEach(function (section) {
                highlightText(section, query);
            });
        }

        // Function to highlight text in specific elements
        function highlightText(element, query) {
            const childNodes = element.childNodes; // Get child nodes of the element

            childNodes.forEach(node => {
                if (node.nodeType === Node.TEXT_NODE) { // Check if it is a text node
                    const regex = new RegExp(`(${query})`, "gi");
                    const newHTML = node.textContent.replace(regex, `<span class="highlight">$1</span>`);
                    if (newHTML !== node.textContent) {
                        const newNode = document.createElement('span');
                        newNode.innerHTML = newHTML;
                        element.replaceChild(newNode, node); // Replace text node with highlighted span
                    }
                } else if (node.nodeType === Node.ELEMENT_NODE) {
                    highlightText(node, query); // Recursively highlight in child elements
                }
            });
        }

        function clearHighlights() {
            // Remove previous highlights
            var highlightedElements = document.querySelectorAll('.highlight');
            highlightedElements.forEach(function (element) {
                element.outerHTML = element.innerHTML;  // Remove span but keep the text
            });
        }

        function previousPage() {
            // Add logic for navigating to the previous page
            alert("Previous page functionality not implemented.");
        }

        function nextPage() {
            // Add logic for navigating to the next page
            alert("Next page functionality not implemented.");
        }

        const entries = [
        { title: "K-Drama or Movie Time!", content: "I and Sarah loves K-dramas. We get snacks while we watch, usually our favorite ones. It’s kind of fun!" },
        { title: "Preggy and Kittens Surprise!", content: "Tiny kittens arrived. They’re noisy but cute. My human’s very attentive." },
        { title: "Kittens Exploring", content: "The kittens are starting to explore. They’re wobbly but curious, and it’s entertaining to watch." },
        { title: "Meeting New Pets", content: "Met some new pets today. It’s a bit chaotic, but everyone seems to be getting along." },
        { title: "Spaying Day", content: "Had a vet visit and feel different now. Lots of extra cuddles while I recover." },
        { title: "New Fave Video", content: "Found a video on YouTube that Sarah shared. It’s all about rats and cockroaches! I can't stop watching!" },
        { title: "Midnight Zoomies", content: "I decided to have midnight zoomies, and Sarah and I both got scolded because I was too noisy. Hehe!" },
        { title: "Gift Sarah", content: "Today I decided to gift Sarah some lizards, thinking maybe she was hungry. She screamed, so I think she’s happy. :))" },
        
    ];

    let currentLeftEntry = 0;
    let currentRightEntry = 1;

    function updateEntry() {
        document.getElementById('entry-left').innerHTML = `
            <h2>${entries[currentLeftEntry].title}</h2>
            <p>${entries[currentLeftEntry].content}</p>
        `;
        document.getElementById('entry-right').innerHTML = `
            <h2>${entries[currentRightEntry].title}</h2>
            <p>${entries[currentRightEntry].content}</p>
        `;
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
        updateEntry();  // Ensure the first entry is displayed when the journal is opened
    }

    let originalCover;

    function closeJournal() {
        document.getElementById('journal').style.display = 'none';

        // Check if the original cover is already present
        let existingCover = document.getElementById('journal-cover');
        if (existingCover) {
            existingCover.style.display = 'block';
        } else {
            // Recreate the original cover element
            const newCover = originalCover.cloneNode(true);
            document.querySelector('.journal-container').insertBefore(newCover, document.getElementById('journal'));
        }

        // Reassign event listeners to the new cover
        document.getElementById('journal-cover').querySelector('button').onclick = openJournal;

        // Reset entries to the first two pages
        currentLeftEntry = 0;
        currentRightEntry = 1;
    }

    function applyFont() {
        document.querySelectorAll('#scenario, #choices button, #entry-left, #entry-right').forEach(function(element) {
            element.style.fontFamily = "'Baloo 2', sans-serif";
        });
    }

    window.onload = function() {
        originalCover = document.getElementById('journal-cover').cloneNode(true);
        applyFont();
    };
    </script>
</body>
</html>
<?php /**PATH C:\Users\winOSx\portfolio\Sarah_Portfolio\resources\views/projects.blade.php ENDPATH**/ ?>