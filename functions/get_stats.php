<?php
function readAllStats()
{
	$subject_Names = [
		1 => "Tarkvaraarenduse projekt",
		2 => "Objektorienteeritud programmeerimine",
		3 => "Interaktsioonidisain",
		4 => "Üldotstarbelised arendusplatvormid",
		5 => "Hulgateoooria ja loogika elemendid",
		6 => "Tarkvara testimise alused",
		7 => "Sissejuhatus infosüsteemidesse",
		9 => "Akadeemiline õppetöö",
		10 => "Rühmatöö",
		11 => "Harjutamine",
		12 => "Kodutööde lahendamine",
		13 => "Õppematerjali lugemine",
		14 => "Õppevideote vaatamine",
		15 => "Teiste õpetamine",
		16 => "Täpsustamata õpimeetod",
	
	];

	$statsHTML = null;
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("SELECT Activity_Activity_ID, Student_Entry_ID, Student_Institute_Student_Institute_ID, Time_Spent, TimeStamp, Subject_Subject_ID FROM Student_Entry ORDER BY Time_Spent ASC");
	echo $conn->error;
	//$stmt->bind_param("i", $Activity_Activity_ID);  
	$stmt->execute();
	$stmt->store_result();
	$num_of_rows = $stmt->num_rows;
	//echo $num_of_rows;
	$stmt->bind_result($Activity_Activity_ID_FromDb, $Student_Entry_ID, $Student_Institute_Student_Institute_ID, $Time_Spent, $TimeStamp, $Subject_Subject_ID);
	$statsHTML = "";
	while ($stmt->fetch()) {
		$statsHTML .= "<li>" . "; " . $subject_Names[$Activity_Activity_ID_FromDb] . "; " . $Student_Entry_ID . "; " . $Student_Institute_Student_Institute_ID . "; " . $Time_Spent . "; " . $TimeStamp . "; " . $subject_Names[$Subject_Subject_ID] . "; " . "</li>";
	}
	if ($statsHTML == null) {
		$statsHTML = "<p>Andmebaas on tühi!</p>";
	}
	$stmt->close();
	$conn->close();
	return $statsHTML;
}
