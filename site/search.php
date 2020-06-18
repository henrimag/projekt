<?php require('../functions/page_loading.php');
require('../config.php');
require('../data.php');
require('../functions/get_stats.php');
display_student_menu(true);

?>


<head>

    <link rel="stylesheet" href="../style/stats.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="../javascript/stats.js"></script>
</head>
<h1>Otsingutulemused</h1>

<div class="article-container">
    <?php

    if (isset($_POST['submit-search'])) {
        global $subject_Names;
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT Timestamp FROM Student_Entry WHERE Timestamp LIKE '%$search%'";
    
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "Leitud " . $queryResult . " tulemust!";


        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>
            <h3>" . $row['Student_Entry_ID'] . " | " . $subject_Names[$row['Subject_Subject_ID']] . " | "  . $subject_Names[$row['Activity_Activity_ID']] . " | " . $row['Time_Spent'] . " | " . $row['Timestamp'] . "</h3>
        </div>";
            }
        } else {
            echo " Otsingutulemusi ei leitud..";
        }
    }

    ?>
</div>