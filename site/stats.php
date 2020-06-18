<?php require('../functions/page_loading.php');
require('../config.php');
require('../data.php');
require('../functions/get_stats.php');
display_student_menu(true);

global $conn;
global $subject_Names;
$searchable = "";

switch($_POST['chooseSearchValue']){
   
    case 'Student_Entry_ID':
        $searchable = 'Student_Entry_ID';
        
    break;

    case 'Subject_Subject_ID':
        $searchable = 'Subject_Subject_ID';
    
    break;

    case 'Activity_Activity_ID':
        $searchable = 'Activity_Activity_ID';
   
    break;

    case 'Time_Spent':
        $searchable = 'Time_Spent';
      
    break;
    
    case 'Timestamp':
        $searchable = 'Timestamp';

    break;
    
    default:
        echo "Midagi pole valitud";
        
    }


  
?>


<head>

    <link rel="stylesheet" href="../style/stats.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="../javascript/stats.js"></script>
</head>
<h1>Esileht</h1>
<form action="search.php" method="POST">
    <input name="search" type="text" id="searchInput" placeholder="Otsi tulemust..." title="Sisesta otsitav ülesanne" onclick="">
    <button type="submit" name="submit-search">Otsi!</button>
</form>
<h2>Kõik artiklid:</h2>
<form method="POST">
    <select name="chooseSearchValue">
        <option value="Student_Entry_ID">Järjekorra numbri järgi</option>
        <option value="Subject_Subject_ID">Aine nimetuse järgi</option>
        <option value="Activity_Activity_ID">Tegevuse järgi</option>
        <option value="Time_Spent">Ajakulu järgi</option>
        <option value="Timestamp">Kuupäeva ja kellaaja järgi</option>
    </select>
    <input name="ASC" class="ASC" id="ASC" type="submit" value="Tõusev">
    <input name="DESC" class="DESC" id="DESC" type="submit" value="Kahanev">
</form>

<div class="article-container">

    <?php
    echo "Valitud on: " . $searchable;
    if (isset($_POST["DESC"])) {

        echo $statsHTML = readAllStatsDESC();
    } else {
    }


    if (isset($_POST["ASC"])) {
        echo $statsHTML = readAllStatsASC();
    } else {
    }
    ?>
</div>

<body>
    
    <div id="statsHTML">
        <ul class="statsList">
            <?php


            ?>
        </ul>
    </div>

    <!--<button value="fix" onclick="test()"></button>-->

</body>

</html>