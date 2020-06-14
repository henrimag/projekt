<?php
function readAllStats()
{	
	$statsHTML = null;
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("SELECT Activity_Activity_ID FROM Student_Entry/* ORDER BY Time_Spent ASC*/");
	echo $conn->error;
	//$stmt->bind_param("i", $Activity_Activity_ID);  
	$stmt->execute(); 
	$stmt->store_result();
	$num_of_rows = $stmt->num_rows;
	$stmt->bind_result($Activity_Activity_ID_FromDb);
	while ($stmt->fetch()) {
		$statsHTML = $Activity_Activity_ID_FromDb; 

		if ($statsHTML == null) {
			$statsHTML = "<p>Andmebaas on tühi!</p>";
		} else {
			$statsHTML = "<ul> \n" . $statsHTML . "\n </ul> \n";
		}
	}
	$stmt->close();
	$conn->close();
	return $statsHTML;
}
