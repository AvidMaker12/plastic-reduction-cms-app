// @@@ EcoLife by Sean Trudel @@@
// Quick Calculator Questionnaire Form
// Question 1

//alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {

    //==== VARIABLES / OBJECTS ====

    // Variables for all DOM form elements:
    var formListener = document.forms.quickCalculatorForm;
    
    // Delete localStorage stored info button:
    // var btnDel = document.getElementById("btnDel");


    var inputElements = document.getElementsByTagName("input"); // Array of input elements inside form.
    // alert("inputElements = " + inputElements.item(3).id);

    //==== LOGIC ====

    // Function for form submission/processing:
    function formProcess() {
        //alert("functionProcess TEST"); // Debug test to check function formProcess is working: comment-out upon successful debug.
        
        //---FORM VARIABLES---
        // var inputElements = formListener.getElementsByTagName("input"); // Array of input elements inside form.
        var score = 0; // User's total score, to be counted.
        var totalPoints = inputElements.length; // Total availabe points to score.

        //---FORM FILTER---
        for (let i = 0; i < inputElements.length; i++ ) {
    		// var check = document.getElementById(inputElements[i].id);
    		// console.log(check);

            //---SCORE SYSTEM---
            if (inputElements[i].checked) { // Count how many checkboxes have been checked, which becomes the score.
                score += 1;
            }

            //---TOTAL POINTS VALIDATION---
            if (inputElements[i].id == "") { // Checks and removes <input> elements where id="" (ex. CSRF form validation hidden input has empty string for id).
                totalPoints -= 1;
            }
	    } // End of for loop.


        //==== FORM SUBMISSION TASKS ====

        //---LOCAL STORAGE---
        // LocalStorage: Create/store values:
        localStorage.setItem("quickResult", score); // Stores user's score from Quick Calculator results.
        localStorage.setItem("totalPoints", totalPoints); // Stores total available points from page2 to calculate final score.
        
        // LocalStorage: create variables using stored values:
        var LS_quickResult = localStorage.getItem("quickResult"); // Local variable.
        var LS_totalPoints = localStorage.getItem("totalPoints"); // Local variable.
        
        // LocalStorage: validation:
        if (!LS_quickResult){
            console.error("LocalStorage: quickResult is undefined/null.");
            console.error("LocalStorage: quickResult = " + LS_quickResult);
        } else {
            console.log("LocalStorage: quickResult = " + LS_quickResult);
            console.log("Score = " + score);
        }

        if (!LS_totalPoints){
            console.error("LocalStorage: totalPoints is undefined/null.");
            console.error("LocalStorage: totalPoints = " + LS_totalPoints);
        } else {
            console.log("LocalStorage: totalPoints = " + LS_totalPoints);
            console.log("Score = " + score);
        }

        
    } // End of function formProcess.

    // LocalStorage: Retrieve stored stored values:
    var LS_quickResult = localStorage.getItem("quickResult"); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.
    var LS_totalPoints = localStorage.getItem("totalPoints")

    // Function: Delete local storage values:
    // function localStorageDel() {
    //     // Local storage: delete specified items:
    //     localStorage.removeItem("quickResult"); // localStorage.clear not used in case other local storage items needs to be kept.
    // }


    // Event listener for button:
    formListener.onsubmit = formProcess;
    // alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

    // LocalStorage: Delete storage data:
    // btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.

} // End onload function.


