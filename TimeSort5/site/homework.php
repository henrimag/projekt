<?php require('../functions/page_loading.php'); ?>

<?php display_head("Kodutöö leht", "Saab kodutööd sisestada"); ?>

 <?php	

  require("functions_homework.php");
  $database = "if19_henri_ma_1";
  
  //  if(!isset($_SESSION["userId"])){
  //  header("Location: page.php");
  //  exit();
  //} 

  /*if(isset($_GET["logout"])){
		session_destroy();
		header("Location: page.php");
		exit();
  } */
  
  //$userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  $notice = null;
  $error = "";
  $homeworkTitle = "";
  $homework = "";
  $expiredate = date("Y-m-d");

	if(isset($_POST["homeworkBtn"])){

		if(strlen($_POST["homeworkTitle"]) == 0){
			$error .= "Kodutöö pealkiri on puudu!";
		}
		if(strlen($_POST["homeworkEditor"]) == 0){
			$error .= "Kodutöö sisu on puudu! ";
		}
		if($_POST["expiredate"] >= $expiredate){

			$expiredate = $_POST["expiredate"];
		}
		
		$homeworkTitle = test_input($_POST["homeworkTitle"]);
		$homework = test_input($_POST["homeworkEditor"]);
		if($error == ""){

			$result = savehomework($homeworkTitle, $homework, $expiredate);
			if($result == 1){
				$notice = "Kodutöö salvestatud!";
				$error = "";
				$homeworkTitle = "";
				$homework = "";
				$expiredate = date("Y-m-d");
			}
		}
	}
 
	$toScript = "\t" .'<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>' ."\n";
	$toScript .= "\t" .'<script>tinymce.init({selector:"textarea#homeworkEditor", plugins: "link", menubar: "edit",});</script>' ."\n";

  ?>	
	<?php display_teacher_menu(true); ?>
  <hr>

<h2>Lisa kodutöö</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Kodutöö pealkiri:</label><br><input type="text" name="homeworkTitle" id="homeworkTitle" placeholder="Sisesta kodutöö pealkiri" style="width: 23%;" value="<?php echo $homeworkTitle; ?>"><br>
		<label>Kodutöö sisu:</label><br>
		<textarea name="homeworkEditor" id="homeworkEditor" style="width: 23%; height: 200px;" placeholder="Sisesta kodutöö"><?php echo $homework; ?></textarea>
		<br>
		<label>Kodutöö nähtav kuni (kaasaarvatud)</label>
		<input type="date" name="expiredate" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $expiredate; ?>">
		
		<input name="homeworkBtn" id="homeworkBtn" type="submit" value="Salvesta kodutöö"> <span>&nbsp;</span><span><?php echo $error; ?></span>
	</form>
</html>