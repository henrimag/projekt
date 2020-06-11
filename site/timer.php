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

  if(isset($_POST["submitTime"])){
  
    if(isset($_POST["Activity_Activity_ID"]) and !empty($_POST["Activity_Activity_ID"])){
		$Activity_Activity_ID = intval($_POST["Activity_Activity_ID"]);
	} else {
		$Activity_Activity_ID_Error = "Palun vali õpitegevus!";
	}

	//ajakulu
	if (isset($_POST["timeValue"]) and !empty($_POST["timeValue"])){
		$Time_Spent = $_POST["timeValue"]; 
	} else {
		echo $Time_Spent_Error = "Ei saa salvestada null ajaga!";
    }

  
   /* switch($_POST['homework[]']){
        case '1':
            $Activity_Activity_ID = 1;
        break;
        case '2':
            $Activity_Activity_ID = 2;
        break;
        case '3':
            $Activity_Activity_ID = 3;
        break;
        default:
           echo "ei ole valitud tegevust";
        }*/

       
}


if (isset($_POST['allsubjects[]']) === 'TP') {
    echo "Tarkvaraarenduse projekt";
     }
     elseif (isset( $_POST['allsubjects[]']) === 'OOP' ) {
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
    <script defer src="../javascript/timer.js"></script>
    <title>Aja salvestamine</title>
</head>

<body>
    <div class="chooseSubject">

        <label class="subjectLabel" for='allSubjects[]'>Õppeaine: </label><br>
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
        <span><?php echo $Time_Spent_Error ." " .$Activity_Activity_ID_Error; ?></span>
        <br>
        <label for='homework[]'>Õpitegevus: </label><br>
        <select name="homework[]">
            <option value="1">Akadeemiline õppetöö</option>
            <option value="2">Rühmatöö</option>
            <option value="3">Harjutamine</option>
            <option value="4">Kodutööde lahendamine</option>
            <option value="5">Õppematerjali lugemine</option>
            <option value="6">Õppevideote vaatamine</option>
            <option value="7">Teiste õpetamine</option>
            <option value="8">Täpsustamata õpimeetod</option>
        </select>
        <br>
    </div>
    <div class="timerDiv">
        <div class="timerButtons">
            <button class="timerButtons" onclick="start()"><i class="fa fa-play" aria-hidden="true"></i> Start</button>
            <button class="timerButtons" onclick="pause()"><i class="fa fa-pause-circle-o" aria-hidden="true"></i> Pause</button>

            <button class="timerButtons" onclick="stop()"><i class="fa fa-trash-o" aria-hidden="true"></i> Restart</button>
        </div>

        <div name="stopwatch" id="stopwatch" class="stopwatch">00:00:00</div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input name="submitTime" id="submitTime" type="submit" value="Salvesta tulemus"><span id="notice"><?php echo $notice; ?></span>
           
            <input type="hidden" value= "0" name="timeValue" class="timeValue">
        </form>
    </div>


</body>

</html>
