<?php
//käivitame sessiooni
session_start();

$Timestamp = date('Y-m-d H:i:s');

function saveResult($Activity_Activity_ID, $Time_Spent, $Timestamp){
    $notice = null;
    $conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    $stmt = $conn->prepare("INSERT INTO Student_Entry (Activity_Activity_ID, Time_Spent, Timestamp) VALUES (?,?,?)");
    echo $conn->error;
    $stmt->bind_param("iss", $Activity_Activity_ID, $Time_Spent, $Timestamp);
    if ($stmt->execute()) {
		$notice = "Aja salvestamine õnnestus!";
	} else {
		$notice = "Aja salvestamisel tekkis tehniline viga: " . $stmt->error;
	}

	$stmt->close();
	$conn->close();
	return $notice;
}

