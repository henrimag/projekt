<?php require('../functions/page_loading.php'); ?>
<?php display_student_menu(true); ?>
<link rel="stylesheet" href="../style/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="../javascript/hidePassword.js"></script>

<body>

	<h1>Siin saad muuta enda profiili</h1>
	<hr>
	<div class="profileImage">
		<img src="../images/profilepic.png" alt="">
		<p>Jaanus Lillemägi, tudeng</p>
	</div>
	<br>
	<hr>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Minu kirjeldus</label><br>
		<textarea rows="10" cols="80" name="description" placeholder="Lisa siia oma tutvustus ..."></textarea>
		<br>
		<br>

	</form>

	<hr>
	<div class="passwordChange">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Sisesta vana parool:</label><br>
		<input type='password' id='password' name='oldPassword'>
		<input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; <span id='toggleText'>Show</span>
		
		<br>
		<label>Uus salasõna:</label><br>
		<input type='password' id='password' name='newPassWord'>&nbsp;

		<br>

		<label>Uus salasõna uuesti:</label><br>
		<input name="confirmPassword" type="password" id="password">
		<br>

		<input name="updatePassFrom" type="submit" value="Uuenda parool">
	</form>
	<hr>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
		<label>Lisa endale profiili pilt:</label>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<br>
		<input name="submitPic" id="submitPic" type="submit" value="Lae pilt üles">
		<br>
		<br>
		<input name="submitProfile" type="submit" value="Salvesta profiil">
	</form>
	<hr>
	</div>

</body>

</html>