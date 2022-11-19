// @@@ EcoLife by Sean Trudel @@@
// Quick Calculator Questionnaire Form
// Question 1

// alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {

    //==== VARIABLES / OBJECTS ====

    // Variables for DOM elements:
    var scoreMsgBox = document.getElementById("scoreMsgBox");
    
    // Delete localStorage stored info button:
    // var btnDel = document.getElementById("btnDel");

    //==== LOCAL STORAGE ====
    // LocalStorage: Retrieve stored stored values:
    var LS_quickResult = localStorage.getItem("quickResult"); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.

    //VALIDATION: LOCAL STORAGE
    if (LS_quickResult === null) {
        console.log("Local storage 'LS_quickResult' is undefined/null.");
        console.log("Local storage 'LS_quickResult' = " + LS_quickResult);
    } else {
        console.log("Local storage 'LS_quickResult' = " + LS_quickResult);
    }

    // Function: Delete local storage values:
    // function localStorageDel() {
    //     // Local storage: delete specified items:
    //     localStorage.removeItem("quickResult"); // localStorage.clear not used in case other local storage items needs to be kept.
    // }

    //OUTPUT
    if (LS_quickResult !== null) {
        scoreMsgBox.innerHTML = "Congrats! Your score is " + LS_quickResult + "!";
            console.log("User score (LS_quickResult): " + LS_quickResult);
    }

    // LocalStorage: Delete storage data:
    // btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.

} // End onload function.


