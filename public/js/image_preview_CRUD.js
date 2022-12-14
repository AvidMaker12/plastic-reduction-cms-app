// @@@ EcoLife by Sean Trudel @@@
// CRUD: Image upload preview

// alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {
    // --- VARIABLES / DOM OBJECTS ---
    // DOM: <div>, to control show/hide:
    var preview = document.getElementById('preview');

    // DOM: <img>, to input preview image src:
    var previewImage = document.getElementById('preview_image');

    // DOM: <input>, onchange event trigger:
    var imageInput = document.getElementById('image');
    

    // --- LOGIC ---
    // Function to show/hide image upload preview:
    function loadFile(event) {
        // alert("loadFile TEST"); // Debug test to check function is working: comment-out upon successful debug.
        previewImage.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = "block";
    };

    // --- EVENT LISTENERS ---
    // Event listener for button:
    imageInput.onchange = loadFile;
    //alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

} // End onload function.


