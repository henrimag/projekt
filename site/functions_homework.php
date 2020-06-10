<?php 
	function saveHomework($homeworkTitle, $homework, $expiredate){
		$response = 0;
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $conn->prepare("INSERT INTO vpuudis (userid, title, content, expire) VALUES (?, ?, ?, ?)");
		
		$list = array($_SESSION["userId"], $homeworkTitle, $homework, $expiredate);
		$file = fopen("homework.csv","w");
		fputcsv ($file, $list);
		fclose($file);
		
		echo $conn->error;
		$stmt->bind_param("isss", $_SESSION["userId"], $homeworkTitle, $homework, $expiredate);
		if($stmt->execute()){
			$response = 1;
		} else {
			$response = 0;
		}
		$stmt->close();
		$conn->close();
		return $response;
	}

function latestHomework($limit){
	$homeworkHTML = null;
	$today = date("Y-m-d");
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("SELECT title, content, added FROM vpuudis WHERE expire >=? AND deleted IS NULL ORDER BY id DESC LIMIT ?");
	echo $conn->error;
	$stmt->bind_param("si", $today, $limit);
	$stmt->bind_result($titleFromDb, $contentFromDb, $addedFromDb);
	$stmt->execute();
	while ($stmt->fetch()){
		$homeworkHTML .= "<div> \n";
		$homeworkHTML .= "\t <h3>" .$titleFromDb ."</h3> \n";
		$addedTime = new DateTime($addedFromDb);
		$homeworkHTML .= "\t <p>(Lisatud: " .$addedTime->format("d.m.Y H:i:s") .")</p> \n";
		$homeworkHTML .= "\t <div>" .htmlspecialchars_decode($contentFromDb) ."</div> \n";
		$homeworkHTML .= "</div> \n";
	}
	if($homeworkHTML == null){
		$homeworkHTML = "<p>Kodutöid ei ole!</p>";
	}
	$stmt->close();
	$conn->close();
	return $homeworkHTML;
}


/* function storehomework($homeworktitle, $homework, $expiredate){	
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO vpuudis (userid, title, content, expire) VALUES (?, ?, ?, ?)");
	echo $conn->error;

	$stmt->bind_param("isss", $_SESSION["userID"],$homework, $homeworkTitle, $expiredate);
	if($stmt->execute()) {
		$notice = "Uudis on salvestatud";
	} else {
		$notice = "Uudist ei õnnestunud tehniliselt põhjusel salvestada! " . $stmt->error;
	}

	$stmt->close();
	$conn->close();
	return $notice;
} */

/* function readAllhomework(){
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	//$stmt = $conn->prepare("SELECT message, created FROM vpmsg3");
	$stmt = $conn->prepare("SELECT title, content, expire FROM vpuudis WHERE deleted IS NULL");
	echo $conn->error;
	$stmt->bind_result($titleFromDb, $contentFromDb, $expireFromDb);
	$stmt->execute();
	while ($stmt->fetch()) {
		$notice .= "<p>" .$titleFromDb . " " . $contentFromDb . " (Aegub: " .$expireFromDb .")</p>\n";
	}
	if (empty($notice)) {
		$notice = "<p>Otsitud uudiseid pole!</p> \n";
	}

	$stmt->close();
	$conn->close();
	return $notice;	
}
 ?> */