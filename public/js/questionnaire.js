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
            if (inputElements[i].id == "" || !inputElements[i].id || inputElements[i].type == "hidden") { // Filters out <input> elements to only count visible form inputs with id attributes (ex. ignore CSRF form validation as it is a hidden input with id="").
                totalPoints -= 1;
            }
	    } // End of for loop.



        //==== FORM SUBMISSION TASKS ====

        //--- Calculate score percentage ---
        var scorePercent = Math.round(score / totalPoints * 100);

        //--- Retrieve questionnaire category from DOM ---
        var scoreCategory = document.getElementById("scoreCategory").dataset.category;

        //--- Create object to store questionnaire score info into localStorage ---
        var questionnaireScore = {
            score: score,
            score_percent: scorePercent,
            score_category: scoreCategory,
            total_points: totalPoints
        };

        //--- Make the object legible in preparation for storing in localStorage ---
        let questionnaireScore_serialized = JSON.stringify(questionnaireScore);

        //--- LocalStorage: Create/store values ---
        localStorage.setItem("questionnaireScore", questionnaireScore_serialized);
        
        //--- LocalStorage: create variables using stored values ---
        var LS_score = JSON.parse(localStorage.getItem("questionnaireScore")); // Local variable. Deserialized object for use in JS.



        //--- Insert data into hidden inputs to submit with rest of form data ---
        let scoreSet = document.getElementById("scoreSet");
        let scorePercentSet = document.getElementById("scorePercentSet");
        let scoreCategorySet = document.getElementById("scoreCategorySet");

        //--- Set hidden scoreSet form input value to object value ---
        scoreSet.value = questionnaireScore.score; // Upon form submission, hidden input will send JS data to controller via request, to then save to database.
        scorePercentSet.value = questionnaireScore.score_percent; // Upon form submission, hidden input will send JS data to controller via request, to then save to database.
        scoreCategorySet.value = questionnaireScore.score_category; // Upon form submission, hidden input will send JS data to controller via request, to then save to database.
        // scoreSet.innerText = questionnaireScore.score;

    } // End of function formProcess.


    // LocalStorage: Retrieve stored values for page onload function:
    var LS_score = localStorage.getItem("questionnaireScore"); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.

    // --- Delete local storage values ---
    // function localStorageDel() {
    //     // Local storage: delete specified items:
    //     localStorage.removeItem("score"); // localStorage.clear not used in case other local storage items needs to be kept.
    // }


    //==== EVENT LISTENERS ====
    
    // Event listener for button:
    formListener.onsubmit = formProcess;
    // alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

    // LocalStorage: Delete storage data:
    // btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.


} // End onload function.


