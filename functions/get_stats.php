<?php
require('../config.php');
require('../data.php');


function readStatsOrderByDays() {
	$data = [];

	global $conn;
	global $subject_names;
	//$sql = "SELECT * FROM Student_Entry ORDER BY Timestamp ASC";
	$sql = "SELECT CAST(Timestamp AS DATE) AS Date, AVG(Time_Spent) * 100 / MAX(AVG(Time_Spent)) OVER () AS AvgTime, COUNT(Student_Entry_ID) AS Amount FROM Student_Entry GROUP BY Date ORDER BY Timestamp ASC";
	$result = mysqli_query($conn, $sql);
	echo $conn->error;
	$query_results = mysqli_num_rows($result);
	$statsHTML = null;

	if ($query_results > 0) {
		$statsHTML = "<div class=data-columns>";
		while ($row = mysqli_fetch_assoc($result)) {
			//$data []= ['Date' => $row['Date'], 'Amount' => $row['Amount'], 'Time' => $row['Time']];

			$statsHTML .= '<div style="height:'.strval($row['AvgTime'] == null ? 0 : $row['AvgTime'] * 5).'px;"><p>'.$row['Date'].'</p><p>'.$row['Amount'].'</p></div>';
		}
		$statsHTML .= "</div>";
	}
	else {
		$statsHTML = "<p>Andmed puuduvad.</p>";
	}



	return $statsHTML;
}


function readAllStatsASC()
{
	global $conn;
	global $subject_Names;
	$statsHTML = null;
	$sql = "SELECT * FROM Student_Entry ORDER BY Time_Spent ASC";
	$result = mysqli_query($conn, $sql);
	echo $conn->error;
	$queryResults = mysqli_num_rows($result);
	$statsHTML = "";
	if ($queryResults > 0) {
		while ($row = mysqli_fetch_assoc($result)) {

			$statsHTML .= "<h3>" . $row['Student_Entry_ID'] . " | " . $subject_Names[$row['Subject_Subject_ID']] . " | " . $subject_Names[$row['Activity_Activity_ID']] . " | " . $row['Time_Spent'] . " | " . $row['Timestamp'] . "</h3>";
		}
	}
	
	if ($statsHTML == null) {
		$statsHTML = "<p>Andmebaas on tühi!</p>";
	}
	
	return $statsHTML;
}

function readAllStatsDESC()
{
	global $subject_Names;
	$statsHTML = null;
	global $conn;
	$sql = "SELECT * FROM Student_Entry ORDER BY Time_Spent DESC";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);
	$statsHTML = "";
	if ($queryResults > 0) {
		while ($row = mysqli_fetch_assoc($result)) {

			$statsHTML .= "<h3>" . $row['Student_Entry_ID'] . " | " . $subject_Names[$row['Subject_Subject_ID']] . " | " . $subject_Names[$row['Activity_Activity_ID']] . " | " . $row['Time_Spent'] . " | " . $row['Timestamp'] . "</h3>";
		}
	}

	if ($statsHTML == null) {
		$statsHTML = "<p>Andmebaas on tühi!</p>";
	}
	
	return $statsHTML;
}





/*
class queryThis{

public function test(){
	$this -> fix();
}

private function fix()
{
	$query = $this->get('id');
	foreach ($query->result() as $row) {
		$data['Student_Entry_ID'] = $row->Student_Entry_ID;
		$data['Activity_Activity_ID'] = $row->Activity_Activity_ID;
		$data['Time_Spent'] = $row->Time_Spent;
		$data['Timestamp'] = $row->Timestamp;
		$data['Subject_Subject_ID'] = $row->Timestamp;
		$sounds_like = $this-> _make_sounds_like($data);
		echo $sounds_like.'<br>';
	}
}

private function _make_sounds_like($data)
{
	$sounds_like = '';

	if (isset($data['Student_Entry_ID'])) {
		$sounds_like .= metaphone($data['Student_Entry_ID']) . ' ';
	}

	if(isset($data['Activity_Activity_ID'])){
		$sounds_like .= metaphone($data['Activity_Activity_ID']). ' ';
	}

	if(isset($data['Time_Spent'])){
		$sounds_like .= metaphone($data['Time_Spent']). ' ';
	}

	if(isset($data['Timestamp'])){
		$sounds_like .= metaphone($data['Timestamp']). ' ';
	}

	if(isset($data['Subject_Subject_ID'])){
		$sounds_like .= metaphone($data['Subject_Subject_ID']). ' ';
	}

	return $sounds_like;
	
}

function _create_custom_search($Student_Entry_ID, $location){
	$location = metaphone($location);
	$mysql_query = "select * from Student_Entry where sounds_like like '%$location'";
	$mysql_query .= " order by Student_Entry_ID desc"; 

	$query = $this -> $mysql_query;
	$num_of_rows = $query->num_of_rows();
	echo $mysql_query;
}
}

$QueryObject = new queryThis();
$QueryObject ->test();
*/