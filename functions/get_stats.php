<?php
function readAllStats(){  
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn -> prepare("SELECT Activity_Activity_ID, created FROM Student_Entry ORDER BY Time_Spent ASC");
	echo $conn -> error;
	$stmt -> bind_result($Activity_Activity_ID_FromDb);
	$stmt -> execute();
	while($stmt -> fetch()){
		$notice = $Activity_Activity_ID_FromDb;
	}
	if(!empty($notice)){
		$notice = "<ul> \n" .$notice ."</ul> \n";
	} else {
		$notice = "<p>Kahjuks ei ole tulemusi, mida näidata!</p> \n";  
	}
	
	$stmt->close();
	$conn->close();
	return $notice;
}
