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
    var LS_quickResult = localStorage.getItem("quickResult"); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.
    var LS_totalPoints = localStorage.getItem("totalPoints");
    var finalScorePercent = Math.round(LS_quickResult / LS_totalPoints * 100);

    // Function: Delete local storage values:
    // function localStorageDel() {
    //     // Local storage: delete specified items:
    //     localStorage.removeItem("quickResult"); // localStorage.clear not used in case other local storage items needs to be kept.
    // }

    //OUTPUT
    if (finalScorePercent == 100) { // Custom message when score is 100%.
        scoreMsgBox.innerHTML = "<i class='bi bi-brightness-high'></i>&nbsp;&nbsp; Amazing!!! Your score is " + finalScorePercent + "% ! &nbsp;&nbsp;<i class='bi bi-brightness-high'></i>";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_quickResult + "/" + LS_totalPoints + " products with non-plastic alternatives.";
        console.log("User score (LS_quickResult): " + LS_quickResult);
    } else if (finalScorePercent >= 50) { // Custom message when score is greater than 50%.
        scoreMsgBox.innerHTML = "Congrats! Your score is " + finalScorePercent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_quickResult + "/" + LS_totalPoints + " products with non-plastic alternatives.";
        console.log("User score (LS_quickResult): " + LS_quickResult);
    } else if (finalScorePercent < 50) { // Custom message when score is between 0 and 50%.
        scoreMsgBox.innerHTML = "Your score is " + finalScorePercent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_quickResult + "/" + LS_totalPoints + " products with non-plastic alternatives.";
    } else if (finalScorePercent == 0) { // Custom message when score is equal to 0.
        scoreMsgBox.innerHTML = "Your score is " + finalScorePercent + "%";
        scoreSummaryMsgBox.innerHTML = "You have replaced " + LS_quickResult + "/" + LS_totalPoints + " products with non-plastic alternatives.";
    } else if (!LS_quickResult) {
        //VALIDATION: LOCAL STORAGE
        console.log("Local storage 'LS_quickResult' is undefined/null.");
        console.log("Local storage 'LS_quickResult' = " + LS_quickResult);
    }

    // LocalStorage: Delete storage data:
    // btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.


} // End onload function.


