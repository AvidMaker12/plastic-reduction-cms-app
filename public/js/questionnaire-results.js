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
    var scoreSummaryMsgBox = document.getElementById("scoreSummaryMsgBox");
    
    // Delete localStorage stored info button:
    // var btnDel = document.getElementById("btnDel");

    //==== LOCAL STORAGE ====
    // LocalStorage: Retrieve stored stored values:
    var LS_score = JSON.parse(localStorage.getItem("questionnaireScore")); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.

    //--- LocalStorage: validation ---
    if (!LS_score){
        console.error("LocalStorage: LS_score is undefined/null.");
        console.error("LocalStorage: LS_score = " + JSON.stringify(LS_score));
    } else {
        console.log("LocalStorage: LS_score = " + JSON.stringify(LS_score));
        console.log("Score / Total Points = " + LS_score.score + "/" + LS_score.total_points);
        // console.log("Score Total Points = " + LS_score.total_points);
        console.log("Score Percent = " + LS_score.score_percent);
        console.log("Score Category = " + LS_score.score_category);
    }


    // Function: Delete local storage values:
    // function localStorageDel() {
    //     // Local storage: delete specified items:
    //     localStorage.removeItem("quickResult"); // localStorage.clear not used in case other local storage items needs to be kept.
    // }

    //OUTPUT
    if (LS_score.score_percent == 100) { // Custom message when score is 100%.
        scoreMsgBox.innerHTML = "<i class='bi bi-brightness-high'></i>&nbsp;&nbsp; Amazing!!! Your score is " + LS_score.score_percent + "% ! &nbsp;&nbsp;<i class='bi bi-brightness-high'></i>";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_score.score + "/" + LS_score.total_points + " products with non-plastic alternatives.";
        console.log("User score (LS_score): " + JSON.stringify(LS_score));
    } else if (LS_score.score_percent >= 50) { // Custom message when score is greater than 50%.
        scoreMsgBox.innerHTML = "Congrats! Your score is " + LS_score.score_percent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_score.score + "/" + LS_score.total_points + " products with non-plastic alternatives.";
        console.log("User score (LS_score): " + JSON.stringify(LS_score));
    } else if (LS_score.score_percent < 50) { // Custom message when score is between 0 and 50%.
        scoreMsgBox.innerHTML = "Your score is " + LS_score.score_percent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_score.score + "/" + LS_score.total_points + " products with non-plastic alternatives.";
    } else if (LS_score.score_percent == 0) { // Custom message when score is equal to 0.
        scoreMsgBox.innerHTML = "Your score is " + LS_score.score_percent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_score.score + "/" + LS_score.total_points + " products with non-plastic alternatives.";
    } else if (!LS_score) {
        //VALIDATION: LOCAL STORAGE
        console.log("Local storage 'LS_score' is undefined/null.");
        console.log("Local storage 'LS_score' = " + JSON.stringify(LS_score));
    }

    // LocalStorage: Delete storage data:
    // btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.


} // End onload function.


