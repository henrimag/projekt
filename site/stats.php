<?php require('../functions/page_loading.php');
require('../config.php');
require('../functions/get_stats.php');
display_student_menu(true);

$statsHTML = readAllStats();
?>
 

<head>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<?php
    echo $statsHTML;
    ?>
</body>

</html>