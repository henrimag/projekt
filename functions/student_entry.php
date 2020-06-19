<?php
//käivitame sessiooni
//session_start();

$Timestamp = date('Y-m-d H:i:s');

function saveResult($Activity_Activity_ID, $Time_Spent, $Timestamp, $Subject_Subject_ID)
{
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO Student_Entry (Activity_Activity_ID, Time_Spent, Timestamp, Subject_Subject_ID) VALUES (?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("issi", $Activity_Activity_ID, $Time_Spent, $Timestamp, $Subject_Subject_ID);
	if ($stmt->execute()) {
		$notice = "Aeg salvestatud!";
	} else {
		$notice = "Aja salvestamisel tekkis tehniline viga: " . $stmt->error;
	}

	$stmt->close();
	$conn->close();
	return $notice;
}


function changeResult($newTime, $activeID)
{
	
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$sql = "UPDATE Student_Entry SET Time_Spent = '" . $newTime . "' WHERE Student_Entry_ID = " . $activeID;

	if ($conn->query($sql)) {
		$notice = "Aeg salvestatud!";
	}
	else {
		$notice = "Aega ei saanud mõjutada..";
	}

	return $notice;
}
