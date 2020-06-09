<?php require('../functions/page_loading.php'); ?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="../style/style.css">

<?php display_head("Sisse logimise leht", "See on saidi sisselogimise leht"); ?>

<body>

    <div class="logInForm">
        <h1>TimeSort
            <hr>
        </h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>E-mail (kasutajatunnus):</label><br><br>
            <input type="email" name="email" placeholder="type your email here.."><br>

            <label>Salasõna:</label><br><br>
            <input name="password" type="password" placeholder="password"><br>


            <input name="login" type="button" value="Logi sisse" onclick="window.location.href = 'index.php';">
            <hr>
        </form>
        <hr>
        <p>Loo endale <a href="https://ois2.tlu.ee/tluois/uus_ois2.tud_leht">kasutajakonto</a></p>
    </div>

</body>

</html>