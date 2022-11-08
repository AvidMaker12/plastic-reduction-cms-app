// @@@ EcoLife by Sean Trudel @@@
// CRUD: Image upload preview

// alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {

    // --- VARIABLES / DOM OBJECTS ---
    // DOM: <div>, to control show/hide:
    var preview1 = document.getElementById('preview1');
    var preview2 = document.getElementById('preview2');

    // DOM: <img>, to input preview image src:
    var previewImage1 = document.getElementById('preview_image1');
    var previewImage2 = document.getElementById('preview_image2');

    // DOM: <input>, onchange event trigger:
    var imageInput1 = document.getElementById('icon');
    var imageInput2 = document.getElementById('image');
    

    // --- LOGIC ---
    // Function to show/hide image upload preview:
    function loadFile1(event) {
        // alert("functionProcess TEST"); // Debug test to check function is working: comment-out upon successful debug.
        previewImage1.src = URL.createObjectURL(event.target.files[0]);
        preview1.style.display = "block";
    };

    function loadFile2(event) {
        // alert("functionProcess TEST"); // Debug test to check function is working: comment-out upon successful debug.
        previewImage2.src = URL.createObjectURL(event.target.files[0]);
        preview2.style.display = "block";
    };

    // --- EVENT LISTENERS ---
    // Event listener for button:
    imageInput1.onchange = loadFile1;
    imageInput2.onchange = loadFile2;
    //alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

} // End onload function.


