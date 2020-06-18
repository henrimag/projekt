<?php require('../functions/page_loading.php');
require('../config.php');
require('../functions/get_stats.php');
require('../style/stats.css');
display_student_menu(true);

$statsHTML = readAllStatsASC();

?>


<head>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="../javascript/stats.js"></script>
</head>
<h1>Statistika leht</h1>
<body>
<form action="search.php" method="POST">
    <div class="search">
    <input class="search searchInput" name="search" type="text" id="searchInput" placeholder="Otsi ülesannet..." title="Sisesta otsitav ülesanne" onclick="">
    <button class="search submit-search" type="submit" name="submit-search">Otsi!</button>
    </div>
</form>
</body>
<h2>Kõik salvestused:</h2>


<div class="article-container">

    <?php

    echo readStatsOrderByDays();
    /*
    echo $statsHTML;

    if (isset($_POST["DESC"]) && ($statsHTML = readAllStatsASC())) {

        echo $statsHTML = readAllStatsDESC();
    } else {
    }


    if (isset($_POST["ASC"]) && !($statsHTML = readAllStatsASC())) {
        echo $statsHTML = readAllStatsASC();
    } else {
    }

    */

    ?>
</div>

<body>

    <div id="statsHTML">
        <ul class="statsList">
            <?php


            ?>
        </ul>
    </div>
    <form method="post">
        <input name="ASC" class="ASC" id="ASC" type="submit" value="ASC">
        <input name="DESC" class="DESC" id="DESC" type="submit" value="DESC">
    </form>
    <!--<button value="fix" onclick="test()"></button>-->

</body>

</html>