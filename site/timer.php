<?php require('../functions/page_loading.php');
require('../functions/student_entry.php');
require('../config.php');
display_student_menu(true);


$notice = null;
$Activity_Activity_ID = null;
$Time_Spent = null;
$Activity_Activity_ID_Error = null;
$Time_Spent_Error = null;

//kui on salvestamise nuppu vajutatud
//echo '<pre>';
//var_dump($_POST);
var_dump($_POST["timeValue"]);
$timeStart = $_POST["timeValue"];
var_dump(round($timeStart * 1000));
var_dump('Kulus' . (round(microtime(true) * 1000) - round($timeStart * 1000)) / 1000 . ' sekundit');
if (isset($_POST["submitTime"])) {

    if (isset($_POST["homework"]) and !empty($_POST["homework"])) {
        $Activity_Activity_ID = intval($_POST["homework"]);
    } else {
        $Activity_Activity_ID_Error = "Palun vali õpitegevus!";
    }

    //ajakulu
    if (isset($_POST["timeValue"]) and !empty($_POST["timeValue"])) {
        $Time_Spent = $_POST["timeValue"];
    } else {
        echo $Time_Spent_Error = "Ei saa salvestada null ajaga!";
    }

    saveResult($Activity_Activity_ID, $Time_Spent, $Timestamp);
}


if (isset($_POST['allsubjects[]']) === 'TP') {
    echo "Tarkvaraarenduse projekt";
} elseif (isset($_POST['allsubjects[]']) === 'OOP') {
    echo "OOP";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/timer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script defer src="../javascript/timer.js"></script>
    <title>Aja salvestamine</title>
</head>

<body>
    <form id="random" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="chooseSubject">

            <label class="subjectLabel" for='allSubjects[]'>Vali Õppeaine: </label><br>
            <select name="allSubjects[]">
                <option value="TP">Tarkvaraarenduse projekt</option>
                <option value="OOP">Objektorienteeritud programmeerimine</option>
                <option value="ITD">Interaktsioonidisain</option>
                <option value="YA">Üldotstarbelised arendusplatvormid</option>
                <option value="HLE">Hulgateoooria ja loogika elemendid</option>
                <option value="TTA">Tarkvara testimise alused</option>
                <option value="SI">Sissejuhatus infosüsteemidesse</option>
            </select>
            <br>
            <span><?php echo $Time_Spent_Error . " " . $Activity_Activity_ID_Error; ?></span>
            <br>
            <label for='homework'>Vali Õpitegevus: </label><br>
            <select name="homework">
                <option value="9">Akadeemiline õppetöö</option>
                <option value="10">Rühmatöö</option>
                <option value="11">Harjutamine</option>
                <option value="12">Kodutööde lahendamine</option>
                <option value="13">Õppematerjali lugemine</option>
                <option value="14">Õppevideote vaatamine</option>
                <option value="15">Teiste õpetamine</option>
                <option value="16">Täpsustamata õpimeetod</option>
            </select>
            <br>
        </div>
        <div class="timerDiv">
            <div class="timerButtons">
                <button class="timerButtons" onclick="start()" type="button"><i class="fa fa-play" aria-hidden="true"></i> Start</button>
                <button class="timerButtons" onclick="pause()" type="button"><i class="fa fa-pause-circle-o" aria-hidden="true"></i> Pause</button>

                <button class="timerButtons" onclick="stop()"><i class="fa fa-trash-o" aria-hidden="true"></i> Restart</button>
            </div>

            <div name="stopwatch" id="stopwatch" class="stopwatch">00:00:00</div>

            <input name="submitTime" id="submitTime" type="button" value="Salvesta tulemus" onclick="submit()"><span id="notice"><?php echo $notice; ?></span>

            <input type="hidden" value="<?php echo microtime(true); ?>" name="timeValue" class="timeValue">

        </div>

    </form>
</body> 

</html>