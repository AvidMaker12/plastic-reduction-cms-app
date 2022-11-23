<?php

    //--- Make JAVASCRIPT data available to use in PHP---
    // Refer to JS file 'questionnaire.js'
    // $questionnaireScore = json_decode($_POST['questionnaireScore']);
    // print_r($questionnaireScore);


    //--- Insert JAVASCRIPT data into database directly ---
    if(isset($_POST)) { // Data validation.
        $questionnaireScore = json_decode($_POST); // Deserialize object.
        $score = $questionnaireScore->score;
        $score_percent = $questionnaireScore->score_percent;
        $score_category = \Request::segment(3);
        $user_id = Auth::user()->id;

        $connection = mysqli_connect("localhost","root","","plastic-reduction-cms-app"); // Host, Username, Password, Database
        $sql = "INSERT INTO `scores`(`score`, `score_percent`, `score_category`, `user_id`) VALUES ('$score','$score_percent','$score_category','$user_id')";
        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "Successfully saved questionnaire score.";
        } else {
            echo "Error: score is undefined/null.";
        }
    }


?>