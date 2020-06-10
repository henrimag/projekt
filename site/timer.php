<?php require('../functions/page_loading.php'); ?>
<?php display_student_menu(true); ?>
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

        <label class="subjectLabel" for='allSubjects[]'>Vali milline aine: </label><br>
        <select multiple="multiple" name="allSubjects[]">
            <option value="TP">Tarkvaraarenduse projekt</option>
            <option value="OOP">Objektorienteeritud programmeerimine</option>
            <option value="ITD">Interaktsioonidisain</option>
            <option value="YA">Üldotstarbelised arendusplatvormid</option>
            <option value="HLE">Hulgateoooria ja loogika elemendid</option>
            <option value="TTA">Tarkvara testimise alused</option>
            <option value="SI">Sissejuhatus infosüsteemidesse</option>
        </select>
        <br>
        <br>
        <label for='homework[]'>Vali milline kodutöö: </label><br>
        <select multiple="multiple" name="homework[]">
            <option value="1">kodutöö 1</option>
            <option value="2">Kodutöö 2</option>
            <option value="3">Kodutöö 3</option>
            <option value="4">Kodutöö 4</option>
            <option value="5">Kodutöö 5</option>
            <option value="6">Kodutöö 6</option>
            <option value="7">Kodutöö 7</option>
        </select>
        <br>
    </div>
    <div class="timerDiv">
        <div class="timerButtons">
            <button class="timerButtons" onclick="start()"><i class="fa fa-play" aria-hidden="true"></i> Start</button>
            <button class="timerButtons" onclick="pause()"><i class="fa fa-pause-circle-o" aria-hidden="true"></i> Pause</button>

            <button class="timerButtons" onclick="stop()"><i class="fa fa-trash-o" aria-hidden="true"></i> Restart</button>
        </div>

        <div class="stopwatch">00:00:00</div>
    </div>


</body>

</html>