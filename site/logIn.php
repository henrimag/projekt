<?php require('../functions/page_loading.php'); ?>
<?php display_head("Sisse logimise leht", "See on saidi sisselogimise leht"); ?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../style/style.css">



<body>
    <div class="logInForm">
        <h1>TimeSort
            <hr>
        </h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="inputData">
                <label>E-mail:</label><br>
                    <input type="email" name="email" placeholder="Sisesta E-mail"><br><br>

                <label>Salasõna:</label><br>
                    <input name="password" type="password" placeholder="Sisesta salasõna"><br><br>
            </div>
            <input name="login" type="button" value="Logi sisse õpilasena" onclick="window.location.href = 'student.php';">
            <input name="login" type="button" value="Logi sisse õppejõuna" onclick="window.location.href = 'teacher.php';">
            <hr>
        </form>
        <hr>
        <p>Loo endale <a href="https://ois2.tlu.ee/tluois/uus_ois2.tud_leht">kasutajakonto</a></p>
    </div>
</body>

</html>